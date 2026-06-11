<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\AbstractChatMember;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getChatAdministrators method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get chat administrators, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ AbstractChatMember[]

// region CLASS_GetChatAdministratorsResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetChatAdministratorsResponse extends AbstractResponse
{
    /**
     * @param RawResponse               $rawResponse
     * @param AbstractChatMember[]|null $chatMembers
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $chatMembers = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatMembers(): ?array
    {
        return $this->chatMembers;
    }
}

// endregion CLASS_GetChatAdministratorsResponse
