<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotCommand;

// region CLASS_GetMyCommandsResponse
class GetMyCommandsResponse extends AbstractResponse
{
    /**
     * @param RawResponse       $rawResponse
     * @param BotCommand[]|null $commands
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $commands = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getCommands(): ?array
    {
        return $this->commands;
    }
}

// endregion CLASS_GetMyCommandsResponse
