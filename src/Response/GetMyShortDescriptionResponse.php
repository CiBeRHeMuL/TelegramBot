<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotShortDescription;

class GetMyShortDescriptionResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BotShortDescription $shortDescription = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getShortDescription(): ?BotShortDescription
    {
        return $this->shortDescription;
    }
}
