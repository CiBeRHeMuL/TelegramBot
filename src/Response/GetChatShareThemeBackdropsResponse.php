<?php

namespace AndrewGos\TelegramBot\Response;


use AndrewGos\TelegramBot\Entity\ChatShareThemeBackdrops;

class GetChatShareThemeBackdropsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?ChatShareThemeBackdrops $chatShareThemeBackdrops = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatShareThemeBackdrops(): ?ChatShareThemeBackdrops
    {
        return $this->chatShareThemeBackdrops;
    }
}
