<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Http\Message;

use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\Enum\HttpVersionEnum;
use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainerInterface;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): HTTP; TECH(8): PSR-7]
/**
 * @moduleContract
 * @purpose Implement PSR-7 RequestInterface for outgoing HTTP requests to the Telegram API.
 *
 * @sees USES_API(8): Psr\Http\Message\RequestInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HttpRequest, PSR-7, HTTP request, message
// STRUCTURE: ┌method + uri + headers + body + protocolVersion┐ → ○ immutable with* methods → ⊕ cloned instance with mutated property

// region CLASS_HttpRequest
class HttpRequest implements RequestInterface
{
    public function __construct(
        private HttpMethodEnum $method,
        private UriInterface $uri,
        private HttpHeadersContainerInterface $headers,
        private ?StreamInterface $body = null,
        private HttpVersionEnum $protocolVersion = HttpVersionEnum::Http11,
    ) {}

    public function getRequestTarget(): string
    {
        $target = $this->uri->getPath();
        if ($this->uri->getQuery() !== '') {
            $target .= '?' . $this->uri->getQuery();
        }

        return $target;
    }

    public function withRequestTarget(string $requestTarget): RequestInterface
    {
        if (str_contains($requestTarget, ' ')) {
            throw new InvalidArgumentException('Invalid request target provided; cannot contain spaces');
        }

        $new = clone $this;

        $new->uri = $this->uri->withPath($requestTarget);

        return $new;
    }

    public function getMethod(): string
    {
        return $this->method->value;
    }

    public function withMethod(string $method): RequestInterface
    {
        $new = clone $this;

        $new->method = HttpMethodEnum::from($method);

        return $new;
    }

    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    public function withUri(UriInterface $uri, bool $preserveHost = false): RequestInterface
    {
        $new = clone $this;

        $new->uri = $uri;

        if (!$preserveHost || !$new->hasHeader('Host')) {
            $new->updateHostHeaderFromUri();
        }

        return $new;
    }

    public function getProtocolVersion(): string
    {
        return $this->protocolVersion->value;
    }

    public function withProtocolVersion(string $version): RequestInterface
    {
        $new = clone $this;

        $new->protocolVersion = HttpVersionEnum::from($version);

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

    public function withHeader(string $name, $value): RequestInterface
    {
        $new = clone $this;

        $normalizedValue = is_array($value) ? $value : [$value];

        $new->headers->set($name, $normalizedValue);

        return $new;
    }

    public function withAddedHeader(string $name, $value): RequestInterface
    {
        $new = clone $this;

        $new->headers->add($name, $value);

        return $new;
    }

    public function withoutHeader(string $name): RequestInterface
    {
        $new = clone $this;

        $new->headers->unset($name);

        return $new;
    }

    public function getBody(): StreamInterface
    {
        if ($this->body === null) {
            $this->body = new Stream(fopen('php://temp', 'r+'));
        }

        return $this->body;
    }

    public function withBody(StreamInterface $body): RequestInterface
    {
        $new = clone $this;

        $new->body = $body;

        return $new;
    }

    private function updateHostHeaderFromUri(): void
    {
        $host = $this->uri->getHost();

        if ($host === '') {
            return;
        }

        if (($port = $this->uri->getPort()) !== null) {
            $host .= ':' . $port;
        }

        $this->headers->set('Host', [$host]);
    }
}
// endregion CLASS_HttpRequest
