<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#setbusinessaccountbio
 */
class SetBusinessAccountBioRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string|null $bio The new value of the bio for the business account; 0-140 characters
     */
    public function __construct(
        private string $business_connection_id,
        private ?string $bio = null,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): SetBusinessAccountBioRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): SetBusinessAccountBioRequest
    {
        $this->bio = $bio;
        return $this;
    }
}
