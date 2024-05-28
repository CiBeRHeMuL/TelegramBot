<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotName;

class GetMyNameResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly BotName|null $name,
    ) {
        parent::__construct($rawResponse);
    }

    public function getName(): BotName|null
    {
        return $this->name;
    }
}
