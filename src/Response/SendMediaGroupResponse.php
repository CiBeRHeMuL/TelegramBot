<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API sendMediaGroup method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: send media group, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ Message[]

// region CLASS_SendMediaGroupResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class SendMediaGroupResponse extends AbstractResponse
{
    /**
     * @param RawResponse    $response
     * @param Message[]|null $messages
     */
    public function __construct(
        RawResponse $response,
        private readonly ?array $messages = null,
    ) {
        parent::__construct($response);
    }

    public function getMessages(): ?array
    {
        return $this->messages;
    }
}

// endregion CLASS_SendMediaGroupResponse
