<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\PollTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the type of a poll to be created with a keyboard button.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#keyboardbuttonpolltype
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: KeyboardButtonPollType, Telegram, Bot API, DTO, keyboardbuttonpolltype
// STRUCTURE: ▶ ◇ type → ∑ KeyboardButtonPollType
// region CLASS_KeyboardButtonPollType

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonpolltype
 */
final class KeyboardButtonPollType implements EntityInterface
{
    /**
     * @param PollTypeEnum|null $type Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode.
     *                                If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
     */
    public function __construct(
        protected ?PollTypeEnum $type = null,
    ) {}

    /**
     * @return PollTypeEnum|null
     */
    public function getType(): ?PollTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PollTypeEnum|null $type
     *
     * @return KeyboardButtonPollType
     */
    public function setType(?PollTypeEnum $type): KeyboardButtonPollType
    {
        $this->type = $type;

        return $this;
    }
}

// endregion CLASS_KeyboardButtonPollType
