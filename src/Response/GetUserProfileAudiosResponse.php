<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\UserProfileAudios;

class GetUserProfileAudiosResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?UserProfileAudios $userProfileAudios = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getUserProfileAudios(): ?UserProfileAudios
    {
        return $this->userProfileAudios;
    }
}
