<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

readonly class ChatId
{
    /**
     * @param string|int $id
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string|int $id,
    ) {
        if (is_string($this->id) && !preg_match('/^@[A-z\d]{5,32}$/ui', $this->id)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid chat id representation');
        }
    }

    public function getId(): int|string
    {
        return $this->id;
    }
}
