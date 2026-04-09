<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\ValueObject\BotToken;

class GetManagedBotTokenResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BotToken $botToken = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getBotToken(): ?BotToken
    {
        return $this->botToken;
    }
}
