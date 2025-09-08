<?php

namespace AndrewGos\TelegramBot\Kernel\Request;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Exception\UpdateHandler\New\Middleware\AttributeNotFoundException;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

final readonly class Request implements ContainerInterface
{
    public function __construct(
        private Update $update,
        private ApiInterface $api,
        private LoggerInterface $logger,
        private array $attributes = [],
    ) {
    }

    public function getUpdate(): Update
    {
        return $this->update;
    }

    public function getApi(): ApiInterface
    {
        return $this->api;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
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
            $this->update,
            $this->api,
            $this->logger,
            [...$this->attributes, $id => $value],
        );
    }

    public function get(string $id): mixed
    {
        return $this->attributes[$id]
            ?? throw new AttributeNotFoundException(
                sprintf(
                    'Attribute "%s" not found in request',
                    $id,
                ),
            );
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->attributes);
    }
}
