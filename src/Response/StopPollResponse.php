<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Poll;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API stopPoll method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: stop poll, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ Poll

// region CLASS_StopPollResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class StopPollResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Poll $poll = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getPoll(): ?Poll
    {
        return $this->poll;
    }
}

// endregion CLASS_StopPollResponse
