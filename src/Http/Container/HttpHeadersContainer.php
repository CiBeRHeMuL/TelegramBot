<?php

namespace AndrewGos\TelegramBot\Http\Container;

use AndrewGos\TelegramBot\Exception\Http\Container\NotFoundException;

// region MODULE_CONTRACT [DOMAIN(5): Telegram; CONCEPT(6): HTTP; TECH(7): Headers]
/**
 * @moduleContract
 * @purpose Implement an HTTP headers container that stores and manipulates header key-value pairs.
 *
 * @sees USES_API(6): HttpHeadersContainerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HttpHeadersContainer, HTTP headers, container, PSR-11
// STRUCTURE: ┌headers[]┐ → ○ has(name) ◇ → ○ get(name) → ⊕ array | NotFoundException → ○ set/add/unset → ⊕ mutate state

// region CLASS_HttpHeadersContainer
class HttpHeadersContainer implements HttpHeadersContainerInterface
{
    private array $headers;

    public function __construct(array $headers = [])
    {
        $this->headers = $headers;
        foreach ($this->headers as $key => $header) {
            if (!is_array($header)) {
                $this->headers[$key] = [$header];
            }
        }
    }

    public function get(string $id): array
    {
        if (!$this->has($id)) {
            throw new NotFoundException();
        }

        return $this->headers[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->headers);
    }

    public function getAll(): array
    {
        return $this->headers;
    }

    public function unset(string $name): void
    {
        if ($this->has($name)) {
            unset($this->headers[$name]);
        }
    }

    public function add(string $name, $value): void
    {
        if ($this->has($name)) {
            $this->headers[$name][] = $value;
        } else {
            $this->set($name, [$value]);
        }
    }

    public function set(string $name, array $value): void
    {
        $this->headers[$name] = $value;
    }
}
// endregion CLASS_HttpHeadersContainer
