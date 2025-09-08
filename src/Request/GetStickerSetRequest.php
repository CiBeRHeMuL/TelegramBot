<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#getstickerset
 */
class GetStickerSetRequest implements RequestInterface
{
    /**
     * @param string $name Name of the sticker set
     */
    public function __construct(
        private string $name,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): GetStickerSetRequest
    {
        $this->name = $name;
        return $this;
    }
}
