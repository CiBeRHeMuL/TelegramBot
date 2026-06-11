<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\OwnedGifts;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getBusinessAccountGifts method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get business account gifts, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ OwnedGifts

// region CLASS_GetBusinessAccountGiftsResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetBusinessAccountGiftsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?OwnedGifts $gifts = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getGifts(): ?OwnedGifts
    {
        return $this->gifts;
    }
}

// endregion CLASS_GetBusinessAccountGiftsResponse
