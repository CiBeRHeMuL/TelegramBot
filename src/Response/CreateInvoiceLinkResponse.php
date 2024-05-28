<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\ValueObject\Url;

class CreateInvoiceLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Url|null $url,
    ) {
        parent::__construct($rawResponse);
    }

    public function getUrl(): Url|null
    {
        return $this->url;
    }
}
