<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\UserProfileAudios;

// region CLASS_GetUserProfileAudiosResponse
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

// endregion CLASS_GetUserProfileAudiosResponse
