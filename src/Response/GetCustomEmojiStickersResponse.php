<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Sticker;

// region CLASS_GetCustomEmojiStickersResponse
class GetCustomEmojiStickersResponse extends AbstractResponse
{
    /**
     * @param RawResponse    $rawResponse
     * @param Sticker[]|null $emojiStickers
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $emojiStickers = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getEmojiStickers(): ?array
    {
        return $this->emojiStickers;
    }
}

// endregion CLASS_GetCustomEmojiStickersResponse
