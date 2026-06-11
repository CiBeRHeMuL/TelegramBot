<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\Response;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Exception\Container\AttributeNotFoundException;
use Psr\Container\ContainerInterface;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Kernel response DTO with stopPropagation flag.
 *
 * @sees USES_API(9): HttpStatusCodeEnum, ContainerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Response, kernel response DTO, stop propagation
// STRUCTURE: ▶ ┌statusCode + attributes + stopRequestPropagation┐ → ⊕ getters → ⊕ withAttribute() → ⊕ stopRequestPropagation()

// region CLASS_Response [DOMAIN(8): Telegram; CONCEPT(7): Response; TECH(9): PHP]
final readonly class Response implements ContainerInterface
{
    /**
     * @param HttpStatusCodeEnum $statusCode
     * @param array              $attributes
     * @param bool               $stopRequestPropagation must update handler stop request propagation or not
     */
    public function __construct(
        private HttpStatusCodeEnum $statusCode,
        private array $attributes = [],
        private bool $stopRequestPropagation = false,
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

    /**
     * Returns copy of current instance with `$stopRequestPropagation = true`.
     *
     * @return self
     */
    public function stopRequestPropagation(): self
    {
        return new self(
            $this->statusCode,
            $this->attributes,
            true,
        );
    }

    public function isStopRequestPropagation(): bool
    {
        return $this->stopRequestPropagation;
    }
}
// endregion CLASS_Response
