<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setCustomEmojiStickerSetThumbnail method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Custom, Emoji, Sticker, Set, Thumbnail
// STRUCTURE: ▶ ┌name + custom_emoji_id┐ → ◇ construct → ⊕ → ∑ ⟦SetCustomEmojiStickerSetThumbnailRequest⟧

// region CLASS_SetCustomEmojiStickerSetThumbnailRequest
/**
 * @see https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
 */
class SetCustomEmojiStickerSetThumbnailRequest implements RequestInterface
{
    /**
     * @param string      $name            Sticker set name
     * @param string|null $custom_emoji_id custom emoji identifier of a sticker from the sticker set; pass an empty string to drop
     *                                     the thumbnail and use the first sticker as the thumbnail
     */
    public function __construct(
        private string $name,
        private ?string $custom_emoji_id = null,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SetCustomEmojiStickerSetThumbnailRequest
    {
        $this->name = $name;

        return $this;
    }

    public function getCustomEmojiId(): ?string
    {
        return $this->custom_emoji_id;
    }

    public function setCustomEmojiId(?string $custom_emoji_id): SetCustomEmojiStickerSetThumbnailRequest
    {
        $this->custom_emoji_id = $custom_emoji_id;

        return $this;
    }
}
// endregion CLASS_SetCustomEmojiStickerSetThumbnailRequest
