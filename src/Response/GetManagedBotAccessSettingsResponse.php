<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotAccessSettings;

class GetManagedBotAccessSettingsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BotAccessSettings $botAccessSettings = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getBotAccessSettings(): ?BotAccessSettings
    {
        return $this->botAccessSettings;
    }
}
