<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotDescription;

// region CLASS_GetMyDescriptionResponse
class GetMyDescriptionResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BotDescription $myDescription = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMyDescription(): ?BotDescription
    {
        return $this->myDescription;
    }
}

// endregion CLASS_GetMyDescriptionResponse
