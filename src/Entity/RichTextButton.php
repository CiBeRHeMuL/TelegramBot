<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A button.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextbutton
 *
 * @changes LAST_CHANGE: Added in Bot API 10.3
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextButton, Telegram, Bot API, DTO, Rich Text Button
// STRUCTURE: ▶ ┌type,button┐ → ∑ RichTextButton
// region CLASS_RichTextButton
/**
 * A button.
 *
 * @see https://core.telegram.org/bots/api#richtextbutton
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Button->value))]
final class RichTextButton extends AbstractRichText
{
    /**
     * @param RichMessageButton $button The button
     *
     * @see https://core.telegram.org/bots/api#richmessagebutton RichMessageButton
     */
    public function __construct(
        protected RichMessageButton $button,
    ) {
        parent::__construct(RichTextTypeEnum::Button);
    }

    /**
     * @return RichMessageButton
     */
    public function getButton(): RichMessageButton
    {
        return $this->button;
    }

    /**
     * @param RichMessageButton $button
     *
     * @return RichTextButton
     */
    public function setButton(RichMessageButton $button): RichTextButton
    {
        $this->button = $button;

        return $this;
    }
}

// endregion CLASS_RichTextButton
