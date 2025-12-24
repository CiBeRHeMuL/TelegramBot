<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

#[CanBeBuiltFromScalar]
readonly class ChatId
{
    private string|int $id;

    /**
     * @param string|int $id
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        string|int $id,
    ) {
        if (is_string($id) && is_numeric($id)) {
            $id = intval($id);
        }
        if (is_string($id) && !preg_match('/^@[A-z\d]{5,32}$/ui', $id)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid chat id representation');
        }
        $this->id = $id;
    }

    public function getId(): int|string
    {
        return $this->id;
    }
}
