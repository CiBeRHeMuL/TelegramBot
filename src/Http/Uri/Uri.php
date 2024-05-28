<?php

namespace AndrewGos\TelegramBot\Http\Uri;

use InvalidArgumentException;
use Psr\Http\Message\UriInterface;

class Uri implements UriInterface
{
    private string $scheme = '';
    private string $userInfo = '';
    private string $host = '';
    private int|null $port = null;
    private string $path = '';
    private string $query = '';
    private string $fragment = '';

    public function __construct(string $uri)
    {
        $this->parseUri($uri);
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getAuthority(): string
    {
        $authority = $this->host;

        if ($this->userInfo !== '') {
            $authority = $this->userInfo . '@' . $authority;
        }

        if ($this->port !== null) {
            $authority .= ':' . $this->port;
        }

        return $authority;
    }

    public function getUserInfo(): string
    {
        return $this->userInfo;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int|null
    {
        return $this->port;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getFragment(): string
    {
        return $this->fragment;
    }

    public function withScheme(string $scheme): UriInterface
    {
        $this->scheme = $scheme;
        return $this;
    }

    public function withUserInfo(string $user, string|null $password = null): UriInterface
    {
        $this->userInfo = $password === null ? $user : "$user:$password";
        return $this;
    }

    public function withHost(string $host): UriInterface
    {
        $this->host = $host;
        return $this;
    }

    public function withPort(int|null $port): UriInterface
    {
        $this->port = $port;
        return $this;
    }

    public function withPath(string $path): UriInterface
    {
        $this->path = $path;
        return $this;
    }

    public function withQuery(string $query): UriInterface
    {
        $this->query = $query;
        return $this;
    }

    public function withFragment(string $fragment): UriInterface
    {
        $this->fragment = $fragment;
        return $this;
    }

    public function __toString(): string
    {
        $uri = '';

        if ($this->scheme !== '') {
            $uri .= $this->scheme . ':';
        }

        $authority = $this->getAuthority();

        if ($authority !== '') {
            $uri .= '//' . $authority;
        }

        $uri .= $this->path;

        if ($this->query !== '') {
            $uri .= '?' . $this->query;
        }

        if ($this->fragment !== '') {
            $uri .= '#' . $this->fragment;
        }

        return $uri;
    }

    private function parseUri(string $uri): void
    {
        $parsed = parse_url($uri);

        if ($parsed === false) {
            throw new InvalidArgumentException("Invalid URI: $uri");
        }
        $userInfo = $parsed['user'] ?? '';
        if ($userInfo && ($parsed['pass'] ?? '')) {
            $userInfo .= ':' . $parsed['pass'];
        }

        $this->scheme = $parsed['scheme'] ?? '';
        $this->userInfo = $userInfo;
        $this->host = $parsed['host'] ?? '';
        $this->port = $parsed['port'] ?? null;
        $this->path = $parsed['path'] ?? '';
        $this->query = $parsed['query'] ?? '';
        $this->fragment = $parsed['fragment'] ?? '';
    }
}
