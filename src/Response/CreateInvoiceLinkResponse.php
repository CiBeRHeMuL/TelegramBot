<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\ValueObject\Url;

// region CLASS_CreateInvoiceLinkResponse
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
