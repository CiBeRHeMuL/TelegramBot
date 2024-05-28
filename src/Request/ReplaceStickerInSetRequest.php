<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InputSticker;

class ReplaceStickerInSetRequest implements RequestInterface
{
    /**
     * @param string $name Sticker set name
     * @param string $old_sticker File identifier of the replaced sticker
     * @param InputSticker $sticker A JSON-serialized object with information about the added sticker. If exactly the same sticker
     * had already been added to the set, then the set remains unchanged.
     * @param int $user_id User identifier of the sticker set owner
     */
    public function __construct(
        private string $name,
        private string $old_sticker,
        private InputSticker $sticker,
        private int $user_id,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ReplaceStickerInSetRequest
    {
        $this->name = $name;
        return $this;
    }

    public function getOldSticker(): string
    {
        return $this->old_sticker;
    }

    public function setOldSticker(string $old_sticker): ReplaceStickerInSetRequest
    {
        $this->old_sticker = $old_sticker;
        return $this;
    }

    public function getSticker(): InputSticker
    {
        return $this->sticker;
    }

    public function setSticker(InputSticker $sticker): ReplaceStickerInSetRequest
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): ReplaceStickerInSetRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'old_sticker' => $this->old_sticker,
            'sticker' => $this->sticker->toArray(),
            'user_id' => $this->user_id,
        ];
    }
}
