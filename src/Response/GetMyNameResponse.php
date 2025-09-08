<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotName;

class GetMyNameResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BotName $name = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getName(): ?BotName
    {
        return $this->name;
    }
}
