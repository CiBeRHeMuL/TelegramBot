<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotCommand;

class GetMyCommandsResponse extends AbstractResponse
{
    /**
     * @param RawResponse $rawResponse
     * @param BotCommand[]|null $commands
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly array|null $commands,
    ) {
        parent::__construct($rawResponse);
    }

    public function getCommands(): array|null
    {
        return $this->commands;
    }
}
