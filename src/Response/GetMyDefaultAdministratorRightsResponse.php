<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatAdministratorRights;

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
