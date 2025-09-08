<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\PreparedInlineMessage;

class SavePreparedInlineMessageResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?PreparedInlineMessage $preparedInlineMessage = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getPreparedInlineMessage(): ?PreparedInlineMessage
    {
        return $this->preparedInlineMessage;
    }
}
