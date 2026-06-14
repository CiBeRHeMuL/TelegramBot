<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A custom emoji.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextcustomemoji
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextCustomEmoji, Telegram, Bot API, DTO, Rich Text Custom Emoji
// STRUCTURE: ▶ ┌type,custom_emoji_id,alternative_text┐ → ∑ RichTextCustomEmoji
// region CLASS_RichTextCustomEmoji
/**
 * A custom emoji.
 *
 * @see https://core.telegram.org/bots/api#richtextcustomemoji
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::CustomEmoji->value))]
final class RichTextCustomEmoji extends AbstractRichText
{
    /**
     * @param string $custom_emoji_id  Unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker.
     * @param string $alternative_text Alternative emoji for the custom emoji
     *
     * @see https://core.telegram.org/bots/api#getcustomemojistickers getCustomEmojiStickers
     */
    public function __construct(
        protected string $custom_emoji_id,
        protected string $alternative_text,
    ) {
        parent::__construct(RichTextTypeEnum::CustomEmoji);
    }

    /**
     * @return string
     */
    public function getCustomEmojiId(): string
    {
        return $this->custom_emoji_id;
    }

    /**
     * @param string $custom_emoji_id
     *
     * @return RichTextCustomEmoji
     */
    public function setCustomEmojiId(string $custom_emoji_id): RichTextCustomEmoji
    {
        $this->custom_emoji_id = $custom_emoji_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlternativeText(): string
    {
        return $this->alternative_text;
    }

    /**
     * @param string $alternative_text
     *
     * @return RichTextCustomEmoji
     */
    public function setAlternativeText(string $alternative_text): RichTextCustomEmoji
    {
        $this->alternative_text = $alternative_text;

        return $this;
    }
}

// endregion CLASS_RichTextCustomEmoji
