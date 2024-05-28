<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use JsonException;

/**
 * Закодированный json
 */
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
        } catch (JsonException $e) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid json representation');
        }
    }

    public function getJson(): string
    {
        return $this->json;
    }
}
