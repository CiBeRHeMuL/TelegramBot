<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\UserProfilePhotos;

// region CLASS_GetUserProfilePhotosResponse
class GetUserProfilePhotosResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ?UserProfilePhotos $userProfilePhotos = null,
    ) {
        parent::__construct($response);
    }

    public function getUserProfilePhotos(): ?UserProfilePhotos
    {
        return $this->userProfilePhotos;
    }
}

// endregion CLASS_GetUserProfilePhotosResponse
