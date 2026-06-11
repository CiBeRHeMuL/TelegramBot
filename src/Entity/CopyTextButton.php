<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents an inline keyboard button that copies specified text to the clipboard.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#copytextbutton
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: CopyTextButton, inline keyboard button, clipboard, Telegram Bot API
// STRUCTURE: ┌text┐ → ∑ CopyTextButton
// region CLASS_CopyTextButton
/**
 * This object represents an inline keyboard button that copies specified text to the clipboard.
 *
 * @see https://core.telegram.org/bots/api#copytextbutton
 */
final class CopyTextButton implements EntityInterface
{
    /**
     * @param string $text The text to be copied to the clipboard; 1-256 characters
     */
    public function __construct(
        protected string $text,
    ) {}

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
// endregion CLASS_CopyTextButton
