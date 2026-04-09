<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\PreparedKeyboardButton;

class SavePreparedKeyboardButtonResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?PreparedKeyboardButton $preparedKeyboardButton = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getPreparedKeyboardButton(): ?PreparedKeyboardButton
    {
        return $this->preparedKeyboardButton;
    }
}
