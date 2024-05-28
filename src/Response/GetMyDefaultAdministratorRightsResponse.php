<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatAdministratorRights;

class GetMyDefaultAdministratorRightsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ChatAdministratorRights|null $chatAdministratorRights,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatAdministratorRights(): ChatAdministratorRights|null
    {
        return $this->chatAdministratorRights;
    }
}
