<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the content of a rich message to be sent as the result of an inline query.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichmessagecontent
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichMessageContent, Telegram, Bot API, DTO, Input Rich Message Content
// STRUCTURE: ▶ ┌rich_message┐ → ∑ InputRichMessageContent
// region CLASS_InputRichMessageContent
/**
 * Represents the content of a rich message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagecontent
 */
final class InputRichMessageContent extends AbstractInputMessageContent
{
    /**
     * @param InputRichMessage $rich_message The message to be sent
     *
     * @see https://core.telegram.org/bots/api#inputrichmessage InputRichMessage
     */
    public function __construct(
        protected InputRichMessage $rich_message,
    ) {}

    /**
     * @return InputRichMessage
     */
    public function getRichMessage(): InputRichMessage
    {
        return $this->rich_message;
    }

    /**
     * @param InputRichMessage $rich_message
     *
     * @return InputRichMessageContent
     */
    public function setRichMessage(InputRichMessage $rich_message): InputRichMessageContent
    {
        $this->rich_message = $rich_message;

        return $this;
    }
}

// endregion CLASS_InputRichMessageContent
