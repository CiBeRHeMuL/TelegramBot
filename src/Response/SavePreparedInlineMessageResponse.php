<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\PreparedInlineMessage;

class SavePreparedInlineMessageResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly PreparedInlineMessage|null $preparedInlineMessage = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getPreparedInlineMessage(): PreparedInlineMessage|null
    {
        return $this->preparedInlineMessage;
    }
}
