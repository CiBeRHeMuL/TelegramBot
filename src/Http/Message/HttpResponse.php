<?php

namespace AndrewGos\TelegramBot\Http\Message;

use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainer;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class HttpResponse implements ResponseInterface
{
    private int $statusCode;
    private HttpHeadersContainer $headers;
    private StreamInterface $body;
    private string $reasonPhrase;

    public function __construct(
        int $statusCode,
        HttpHeadersContainer $headers,
        StreamInterface|null $body = null,
        string $reasonPhrase = '',
    ) {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body ?? new Stream(fopen('php://temp', 'r+'));
        $this->reasonPhrase = $reasonPhrase;
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
        return '1.1';
    }

    public function withProtocolVersion(string $version): ResponseInterface
    {
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

    public function withHeader(string $name, $value): ResponseInterface
    {
        $this->headers->set($name, (array)$value);
        return $this;
    }

    public function withAddedHeader(string $name, $value): ResponseInterface
    {
        $this->headers->add($name, $value);
        return $this;
    }

    public function withoutHeader(string $name): ResponseInterface
    {
        $this->headers->unset($name);
        return $this;
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body): ResponseInterface
    {
        $this->body = $body;
        return $this;
    }
}
