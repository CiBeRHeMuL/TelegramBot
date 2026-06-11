<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API createInvoiceLink method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: create invoice link, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ Url

// region CLASS_CreateInvoiceLinkResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class CreateInvoiceLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Url $url = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getUrl(): ?Url
    {
        return $this->url;
    }
}

// endregion CLASS_CreateInvoiceLinkResponse
