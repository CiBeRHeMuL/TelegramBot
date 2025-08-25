<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#setstickeremojilist
 */
class SetStickerEmojiListRequest implements RequestInterface
{
    /**
     * @param string[] $emoji_list A JSON-serialized list of 1-20 emoji associated with the sticker
     * @param string $sticker File identifier of the sticker
     */
    public function __construct(
        private array $emoji_list,
        private string $sticker,
    ) {
    }

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

    public function toArray(): array
    {
        return [
            'emoji_list' => $this->emoji_list,
            'sticker' => $this->sticker,
        ];
    }
}
