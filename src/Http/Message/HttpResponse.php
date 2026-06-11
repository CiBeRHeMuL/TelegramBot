<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Http\Message;

use AndrewGos\TelegramBot\Enum\HttpVersionEnum;
use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainer;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): HTTP; TECH(8): PSR-7]
/**
 * @moduleContract
 * @purpose Implement PSR-7 ResponseInterface for HTTP responses received from the Telegram API.
 *
 * @sees USES_API(8): Psr\Http\Message\ResponseInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HttpResponse, PSR-7, HTTP response, message
// STRUCTURE: ┌statusCode + headers + body + reasonPhrase + protocolVersion┐ → ○ immutable with* methods → ⊕ cloned instance

// region CLASS_HttpResponse
class HttpResponse implements ResponseInterface
{
    private StreamInterface $body;

    public function __construct(
        private int $statusCode,
        private HttpHeadersContainer $headers,
        ?StreamInterface $body = null,
        private string $reasonPhrase = '',
        private string $protocolVersion = HttpVersionEnum::Http11->value,
    ) {
        $this->body = $body ?? new Stream(fopen('php://temp', 'r+'));
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function withStatus(int $code, string $reasonPhrase = ''): ResponseInterface
    {
        $new = clone $this;
        $new->statusCode = $code;
        $new->reasonPhrase = $reasonPhrase;

        return $new;
    }

    public function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

    public function getProtocolVersion(): string
    {
        return $this->protocolVersion;
    }

    public function withProtocolVersion(string $version): ResponseInterface
    {
        $new = clone $this;
        $new->protocolVersion = $version;

        return $new;
    }

    public function getHeaders(): array
    {
        return $this->headers->getAll();
    }

    public function hasHeader(string $name): bool
    {
        return $this->headers->has($name);
    }

    /**
     * @param string $name
     *
     * @return string[]
     */
    public function getHeader(string $name): array
    {
        if (!$this->hasHeader($name)) {
            return [];
        }

        return $this->headers->get($name);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function getHeaderLine(string $name): string
    {
        return implode(', ', $this->getHeader($name));
    }

    public function withHeader(string $name, $value): ResponseInterface
    {
        $new = clone $this;
        $new->headers->set($name, (array) $value);

        return $new;
    }

    public function withAddedHeader(string $name, $value): ResponseInterface
    {
        $new = clone $this;
        $new->headers->add($name, $value);

        return $new;
    }

    public function withoutHeader(string $name): ResponseInterface
    {
        $new = clone $this;
        $new->headers->unset($name);

        return $new;
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body): ResponseInterface
    {
        $new = clone $this;
        $new->body = $body;

        return $new;
    }
}
// endregion CLASS_HttpResponse
