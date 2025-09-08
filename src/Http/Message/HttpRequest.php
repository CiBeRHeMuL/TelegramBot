<?php

namespace AndrewGos\TelegramBot\Http\Message;

use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\Enum\HttpVersionEnum;
use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainerInterface;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use InvalidArgumentException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class HttpRequest implements RequestInterface
{
    private HttpMethodEnum $method;
    private UriInterface $uri;
    private HttpHeadersContainerInterface $headers;
    private ?StreamInterface $body;
    private HttpVersionEnum $protocolVersion;

    public function __construct(
        HttpMethodEnum $method,
        UriInterface $uri,
        HttpHeadersContainerInterface $headers,
        ?StreamInterface $body = null,
        HttpVersionEnum $protocolVersion = HttpVersionEnum::Http11,
    ) {
        $this->method = $method;
        $this->uri = $uri;
        $this->headers = $headers;
        $this->body = $body;
        $this->protocolVersion = $protocolVersion;
    }

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

        $this->uri = $this->uri->withPath($requestTarget);
        return $this;
    }

    public function getMethod(): string
    {
        return $this->method->value;
    }

    public function withMethod(string $method): RequestInterface
    {
        $this->method = HttpMethodEnum::from($method);
        return $this;
    }

    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    public function withUri(UriInterface $uri, bool $preserveHost = false): RequestInterface
    {
        $this->uri = $uri;

        if (!$preserveHost || !$this->hasHeader('Host')) {
            $this->updateHostHeaderFromUri();
        }

        return $this;
    }

    public function getProtocolVersion(): string
    {
        return $this->protocolVersion->value;
    }

    public function withProtocolVersion(string $version): RequestInterface
    {
        $this->protocolVersion = HttpVersionEnum::from($version);
        return $this;
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
     * @return array|string[]
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getHeader(string $name): array
    {
        return $this->headers->get($name);
    }

    /**
     * @param string $name
     *
     * @return string
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getHeaderLine(string $name): string
    {
        return implode(', ', $this->getHeader($name));
    }

    public function withHeader(string $name, $value): RequestInterface
    {
        $normalizedValue = is_array($value) ? $value : [$value];
        $this->headers->set($name, $normalizedValue);
        return $this;
    }

    public function withAddedHeader(string $name, $value): RequestInterface
    {
        $this->headers->add($name, $value);
        return $this;
    }

    public function withoutHeader(string $name): RequestInterface
    {
        $this->headers->unset($name);
        return $this;
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
        $this->body = $body;
        return $this;
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

        $this->headers['Host'] = [$host];
    }
}
