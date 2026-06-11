<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotCommand;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getMyCommands method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get my commands, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ BotCommand[]

// region CLASS_GetMyCommandsResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
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
