<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatAdministratorRights;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getMyDefaultAdministratorRights method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get my default administrator rights, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ ChatAdministratorRights

// region CLASS_GetMyDefaultAdministratorRightsResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetMyDefaultAdministratorRightsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?ChatAdministratorRights $chatAdministratorRights = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->chatAdministratorRights;
    }
}

// endregion CLASS_GetMyDefaultAdministratorRightsResponse
