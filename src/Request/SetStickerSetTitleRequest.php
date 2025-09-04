<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#setstickersettitle
 */
class SetStickerSetTitleRequest implements RequestInterface
{
    /**
     * @param string $name Sticker set name
     * @param string $title Sticker set title, 1-64 characters
     */
    public function __construct(
        private string $name,
        private string $title,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SetStickerSetTitleRequest
    {
        $this->name = $name;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): SetStickerSetTitleRequest
    {
        $this->title = $title;
        return $this;
    }
}
