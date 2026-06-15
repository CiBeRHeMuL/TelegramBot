<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Http\Client;

use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainer;
use AndrewGos\TelegramBot\Http\Message\HttpResponse;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Throwable;

// region MODULE_CONTRACT [DOMAIN(9): Testing; CONCEPT(10): Mock; TECH(9): PSR-18]
/**
 * @moduleContract
 * @purpose Implement PSR-18 ClientInterface for testing. Returns pre-configured JSON responses, records request history, and emulates network errors.
 * @scope Unit tests for Api class
 * @input Pre-configured fixture map of method → response body
 * @output PSR-7 ResponseInterface with JSON body matching Telegram API format
 *
 * @links USES_API(9): Psr\Http\Client\ClientInterface
 *
 * @invariants
 * - sendRequest never makes real network calls
 * - Every request is recorded in requests[] array
 * - File download URIs (/file/bot<token>/<path>) served from fileResponseMap
 *
 * @rationale
 * Q: Why not mock ApiInterface directly?
 * A: Mocking ClientInterface covers the full Api send() pipeline: serialization → HTTP → deserialization.
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TestHttpClient, PSR-18, mock, HTTP client, testing, Telegram Bot API
// STRUCTURE: ┌fixtureMap + fileResponseMap┐ → ○ sendRequest(): extract method from URI → ◇ willThrow? ✗ throw → ◇ file download? ⤵ fileResponseMap → ◇ fixture match? ⊕ HttpResponse(json) → ⤵ {"ok":true,"result":true} → ∑ record request

class TestHttpClient implements ClientInterface
{
    private string $token = '123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE';

    /** @var array<string, array> */
    private array $fixtureMap = [];

    /** @var array<string, string> */
    private array $fileResponseMap = [];

    private ?Throwable $throwable = null;

    /** @var array<int, RequestInterface> */
    private array $requests = [];

    public function addResponse(string $method, array $body): self
    {
        $this->fixtureMap[$method] = $body;

        return $this;
    }

    public function addResponseFromFile(string $method, string $filename): self
    {
        $content = file_get_contents($filename);
        if ($content === false) {
            throw new RuntimeException("Fixture file not found: $filename");
        }
        $this->fixtureMap[$method] = json_decode($content, true, flags: JSON_THROW_ON_ERROR);

        return $this;
    }

    public function addFileResponse(string $path, string $content): self
    {
        $this->fileResponseMap[$path] = $content;

        return $this;
    }

    public function willThrow(Throwable $e): self
    {
        $this->throwable = $e;

        return $this;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->requests[] = $request;

        if ($this->throwable !== null) {
            $e = $this->throwable;
            $this->throwable = null;

            throw $e;
        }

        $uri = (string) $request->getUri();

        if (str_contains($uri, '/file/bot')) {
            return $this->handleFileDownload($uri);
        }

        $method = $this->extractMethod($uri);

        if (isset($this->fixtureMap[$method])) {
            return $this->buildResponse($this->fixtureMap[$method]);
        }

        return $this->buildResponse(['ok' => true, 'result' => true]);
    }

    public function getRequests(): array
    {
        return $this->requests;
    }

    public function getRequestForMethod(string $method): ?RequestInterface
    {
        foreach ($this->requests as $request) {
            $uri = (string) $request->getUri();
            if (str_contains($uri, "/$method")) {
                return $request;
            }
        }

        return null;
    }

    public function resetRequests(): void
    {
        $this->requests = [];
    }

    private function buildResponse(array $body): ResponseInterface
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, json_encode($body, JSON_THROW_ON_ERROR));
        rewind($stream);

        return new HttpResponse(
            200,
            new HttpHeadersContainer(),
            new Stream($stream),
        );
    }

    private function extractMethod(string $uri): string
    {
        $pattern = '/\/bot' . preg_quote($this->token, '/') . '\/(\w+)/';
        if (preg_match($pattern, $uri, $matches)) {
            return $matches[1];
        }

        return '';
    }

    private function handleFileDownload(string $uri): ResponseInterface
    {
        foreach ($this->fileResponseMap as $path => $content) {
            if (str_contains($uri, $path)) {
                $stream = fopen('php://temp', 'r+');
                fwrite($stream, $content);
                rewind($stream);

                return new HttpResponse(
                    200,
                    new HttpHeadersContainer(),
                    new Stream($stream),
                );
            }
        }

        return $this->buildResponse(['ok' => false, 'description' => 'File not found', 'error_code' => 404]);
    }
}
