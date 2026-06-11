<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getUserPersonalChatMessages method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get user personal chat messages, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ Message[]

// region CLASS_GetUserPersonalChatMessagesResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetUserPersonalChatMessagesResponse extends AbstractResponse
{
    /**
     * @param RawResponse    $rawResponse
     * @param Message[]|null $messages
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $messages = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessages(): ?array
    {
        return $this->messages;
    }
}

// endregion CLASS_GetUserPersonalChatMessagesResponse
