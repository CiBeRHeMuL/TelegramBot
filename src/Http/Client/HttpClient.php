<?php

namespace AndrewGos\TelegramBot\Http\Client;

use AndrewGos\TelegramBot\Enum\HttpVersionEnum;
use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainer;
use AndrewGos\TelegramBot\Http\Message\HttpResponse;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use CurlHandle;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): HTTP; TECH(8): cURL]
/**
 * @moduleContract
 * @purpose Provide a PSR-18 HTTP client implementation using cURL to send requests to the Telegram API.
 *
 * @sees USES_API(8): curl_init, curl_exec, curl_getinfo
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HttpClient, PSR-18, HTTP client, cURL, Telegram API
// STRUCTURE: ┌RequestInterface┐ → ○ curl_init → ○ curl_setopt (URL, method, headers, body) → ○ curl_exec → ◇ success? ⊕ HttpResponse → ⎋ RuntimeException

// region CLASS_HttpClient
class HttpClient implements ClientInterface
{
    private int $timeout;

    public function __construct(int $timeout = 10)
    {
        $this->timeout = $timeout;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $ch = curl_init();

        if ($ch === false) {
            throw new RuntimeException('Failed to initialize cURL');
        }

        curl_setopt($ch, CURLOPT_URL, (string) $request->getUri());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        curl_setopt($ch, CURLOPT_HTTP_VERSION, $request->getProtocolVersion());
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);

        $headers = [];
        foreach ($request->getHeaders() as $name => $values) {
            $headers[] = $name . ': ' . implode(', ', $values);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $body = $request->getBody();
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body->getContents());

        $responseBody = curl_exec($ch);

        if ($responseBody === false) {
            throw new RuntimeException('cURL error: ' . curl_error($ch));
        }

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return $this->createResponse($statusCode, $responseBody, $ch);
    }

    private function createResponse(int $statusCode, string $body, CurlHandle $ch): ResponseInterface
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, $body);
        rewind($stream);

        return new HttpResponse(
            $statusCode,
            new HttpHeadersContainer(),
            new Stream($stream),
            protocolVersion: (string) (curl_getinfo($ch, CURLINFO_HTTP_VERSION) ?: HttpVersionEnum::Http11->value),
        );
    }
}
// endregion CLASS_HttpClient
