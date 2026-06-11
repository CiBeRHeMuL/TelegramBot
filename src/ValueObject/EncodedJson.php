<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use JsonException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует JSON-строку через json_decode с JSON_THROW_ON_ERROR.
 *
 * @sees USES_API(X): PHP json_decode
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: EncodedJson, Telegram, JSON, encoded, validation
// STRUCTURE: ▶ ┌json┐ → ○ json_decode(flags: JSON_THROW_ON_ERROR) → ◇ valid ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getJson()
// region CLASS_EncodedJson
/**
 * Закодированный json.
 */
#[CanBeBuiltFromScalar]
readonly class EncodedJson
{
    private string $json;

    /**
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        string $json,
    ) {
        try {
            json_decode($json, flags: JSON_THROW_ON_ERROR);
            $this->json = $json;
        } catch (JsonException) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid json representation');
        }
    }

    public function getJson(): string
    {
        return $this->json;
    }
}
// endregion CLASS_EncodedJson
