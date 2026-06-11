<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getCustomEmojiStickers method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getcustomemojistickers
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, Custom, Emoji, Stickers
// STRUCTURE: ▶ ┌custom_emoji_ids┐ → ◇ construct → ⊕ → ∑ ⟦GetCustomEmojiStickersRequest⟧

// region CLASS_GetCustomEmojiStickersRequest
/**
 * @see https://core.telegram.org/bots/api#getcustomemojistickers
 */
class GetCustomEmojiStickersRequest implements RequestInterface
{
    /**
     * @param string[] $custom_emoji_ids A JSON-serialized list of custom emoji identifiers. At most 200 custom emoji identifiers
     *                                   can be specified.
     */
    public function __construct(
        private array $custom_emoji_ids,
    ) {}

    public function getCustomEmojiIds(): array
    {
        return $this->custom_emoji_ids;
    }

    public function setCustomEmojiIds(array $custom_emoji_ids): GetCustomEmojiStickersRequest
    {
        $this->custom_emoji_ids = $custom_emoji_ids;

        return $this;
    }
}
// endregion CLASS_GetCustomEmojiStickersRequest
