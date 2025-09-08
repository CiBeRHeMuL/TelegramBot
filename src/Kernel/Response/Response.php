<?php

namespace AndrewGos\TelegramBot\Kernel\Response;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Exception\Container\AttributeNotFoundException;
use Psr\Container\ContainerInterface;

final readonly class Response implements ContainerInterface
{
    public function __construct(
        private HttpStatusCodeEnum $statusCode,
        private array $attributes = [],
    ) {}

    public function getStatusCode(): HttpStatusCodeEnum
    {
        return $this->statusCode;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Returns a new instance of this class with a specified attribute
     *
     * @param string $id
     * @param mixed $value
     *
     * @return $this
     */
    public function withAttribute(string $id, mixed $value): self
    {
        return new self(
            $this->statusCode,
            [...$this->attributes, $id => $value],
        );
    }

    public function get(string $id): mixed
    {
        return $this->attributes[$id]
            ?? throw new AttributeNotFoundException(
                sprintf(
                    'Attribute "%s" not found in response',
                    $id,
                ),
            );
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->attributes);
    }
}
