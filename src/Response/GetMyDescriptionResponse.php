<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotDescription;

class GetMyDescriptionResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly BotDescription|null $myDescription,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMyDescription(): BotDescription|null
    {
        return $this->myDescription;
    }
}
