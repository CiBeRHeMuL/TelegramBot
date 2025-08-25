<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Sticker;

class GetForumTopicIconStickers extends AbstractResponse
{
    /**
     * @param RawResponse $response
     * @param Sticker[]|null $stickers
     */
    public function __construct(
        RawResponse $response,
        private readonly array|null $stickers = null,
    ) {
        parent::__construct($response);
    }

    public function getStickers(): array|null
    {
        return $this->stickers;
    }
}
