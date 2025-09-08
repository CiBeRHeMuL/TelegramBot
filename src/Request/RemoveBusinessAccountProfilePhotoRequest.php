<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#removebusinessaccountprofilephoto
 */
class RemoveBusinessAccountProfilePhotoRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param bool|null $is_public Pass True to remove the public photo, which is visible even if the main photo is hidden by the
     * business account's privacy settings. After the main photo is removed, the previous profile photo (if present) becomes the
     * main photo.
     */
    public function __construct(
        private string $business_connection_id,
        private ?bool $is_public = null,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): RemoveBusinessAccountProfilePhotoRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getIsPublic(): ?bool
    {
        return $this->is_public;
    }

    public function setIsPublic(?bool $is_public): RemoveBusinessAccountProfilePhotoRequest
    {
        $this->is_public = $is_public;
        return $this;
    }
}
