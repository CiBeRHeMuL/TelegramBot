<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputProfilePhoto;

/**
 * @link https://core.telegram.org/bots/api#setbusinessaccountprofilephoto
 */
class SetBusinessAccountProfilePhotoRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param AbstractInputProfilePhoto $photo The new profile photo to set
     * @param bool|null $is_public Pass True to set the public photo, which will be visible even if the main photo is hidden by the
     * business account's privacy settings. An account can have only one public photo.
     *
     * @see https://core.telegram.org/bots/api#inputprofilephoto InputProfilePhoto
     */
    public function __construct(
        private string $business_connection_id,
        private AbstractInputProfilePhoto $photo,
        private bool|null $is_public = null,
    ) {
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): SetBusinessAccountProfilePhotoRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getPhoto(): AbstractInputProfilePhoto
    {
        return $this->photo;
    }

    public function setPhoto(AbstractInputProfilePhoto $photo): SetBusinessAccountProfilePhotoRequest
    {
        $this->photo = $photo;
        return $this;
    }

    public function getIsPublic(): bool|null
    {
        return $this->is_public;
    }

    public function setIsPublic(bool|null $is_public): SetBusinessAccountProfilePhotoRequest
    {
        $this->is_public = $is_public;
        return $this;
    }
}
