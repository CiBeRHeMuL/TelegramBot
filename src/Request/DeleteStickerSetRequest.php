<?php

namespace AndrewGos\TelegramBot\Request;

// region CLASS_DeleteStickerSetRequest
/**
 * @see https://core.telegram.org/bots/api#deletestickerset
 */
class DeleteStickerSetRequest implements RequestInterface
{
    /**
     * @param string $name Sticker set name
     */
    public function __construct(
        private string $name,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): DeleteStickerSetRequest
    {
        $this->name = $name;

        return $this;
    }
}
// endregion CLASS_DeleteStickerSetRequest
