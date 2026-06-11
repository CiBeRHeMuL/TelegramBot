<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a prepared keyboard button.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#preparedkeyboardbutton
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PreparedKeyboardButton, Telegram, Bot API, DTO, preparedkeyboardbutton
// STRUCTURE: ▶ ┌request_id,text,type┐ → ∑ PreparedKeyboardButton
// region CLASS_PreparedKeyboardButton

/**
 * Describes a keyboard button to be used by a user of a Mini App.
 *
 * @see https://core.telegram.org/bots/api#preparedkeyboardbutton
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

// endregion CLASS_PreparedKeyboardButton
