<?php

namespace AndrewGos\TelegramBot\Request;

class DeleteStickerSetRequest implements RequestInterface
{
    /**
     * @param string $name Sticker set name
     */
    public function __construct(
        private string $name,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): DeleteStickerSetRequest
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
