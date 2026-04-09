<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes a keyboard button to be used by a user of a Mini App.
 *
 * @link https://core.telegram.org/bots/api#preparedkeyboardbutton
 */
final class PreparedKeyboardButton implements EntityInterface
{
    /**
     * @param string $id Unique identifier of the keyboard button
     */
    public function __construct(
        protected string $id,
    ) {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return PreparedKeyboardButton
     */
    public function setId(string $id): PreparedKeyboardButton
    {
        $this->id = $id;
        return $this;
    }
}
