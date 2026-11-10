<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatAdministratorRights;

// region CLASS_GetMyDefaultAdministratorRightsResponse
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
