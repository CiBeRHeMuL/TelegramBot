<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setStickerEmojiList method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setstickeremojilist
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Sticker, Emoji, List
// STRUCTURE: ▶ ┌emoji_list + sticker┐ → ◇ construct → ⊕ → ∑ ⟦SetStickerEmojiListRequest⟧

// region CLASS_SetStickerEmojiListRequest
/**
 * @see https://core.telegram.org/bots/api#setstickeremojilist
 */
class SetStickerEmojiListRequest implements RequestInterface
{
    /**
     * @param string[] $emoji_list A JSON-serialized list of 1-20 emoji associated with the sticker
     * @param string   $sticker    File identifier of the sticker
     */
    public function __construct(
        private array $emoji_list,
        private string $sticker,
    ) {}

    public function getEmojiList(): array
    {
        return $this->emoji_list;
    }

    public function setEmojiList(array $emoji_list): SetStickerEmojiListRequest
    {
        $this->emoji_list = $emoji_list;

        return $this;
    }

    public function getSticker(): string
    {
        return $this->sticker;
    }

    public function setSticker(string $sticker): SetStickerEmojiListRequest
    {
        $this->sticker = $sticker;

        return $this;
    }
}
// endregion CLASS_SetStickerEmojiListRequest
