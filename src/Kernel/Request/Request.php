<?php

namespace AndrewGos\TelegramBot\Kernel\Request;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Exception\Container\AttributeNotFoundException;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Kernel request DTO — Update + Api + Logger + attributes.
 *
 * @sees USES_API(9): Update, ApiInterface, LoggerInterface, ContainerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Request, kernel request DTO, update container
// STRUCTURE: ▶ ┌Update + Api + Logger + attributes┐ → ⊕ getters → ⊕ withAttribute() → ∑ has()/get()

// region CLASS_Request [DOMAIN(8): Telegram; CONCEPT(7): Request; TECH(9): PHP]
final readonly class Request implements ContainerInterface
{
    public function __construct(
        private Update $update,
        private ApiInterface $api,
        private LoggerInterface $logger,
        private array $attributes = [],
        private bool $propagationStopped = false,
    ) {}

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
     * Returns a new instance of this class with a specified attribute.
     *
     * @param string $id
     * @param mixed  $value
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

    public function stopPropagation(): self
    {
        return new self(
            $this->update,
            $this->api,
            $this->logger,
            $this->attributes,
            true,
        );
    }

    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }
}
// endregion CLASS_Request
