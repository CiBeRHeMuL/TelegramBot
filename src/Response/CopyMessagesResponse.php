<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\MessageId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API copyMessages method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: copy messages, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ MessageId[]

// region CLASS_CopyMessagesResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class CopyMessagesResponse extends AbstractResponse
{
    /**
     * @param RawResponse      $rawResponse
     * @param MessageId[]|null $messageIds
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $messageIds = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessageIds(): ?array
    {
        return $this->messageIds;
    }
}

// endregion CLASS_CopyMessagesResponse
