<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputProfilePhoto;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setBusinessAccountProfilePhoto method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setbusinessaccountprofilephoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Business, Account, Profile, Photo
// STRUCTURE: ▶ ┌business_connection_id + photo + is_public┐ → ◇ construct → ⊕ → ∑ ⟦SetBusinessAccountProfilePhotoRequest⟧

// region CLASS_SetBusinessAccountProfilePhotoRequest
/**
 * @see https://core.telegram.org/bots/api#setbusinessaccountprofilephoto
 */
class SetBusinessAccountProfilePhotoRequest implements RequestInterface
{
    /**
     * @param string                    $business_connection_id Unique identifier of the business connection
     * @param AbstractInputProfilePhoto $photo                  The new profile photo to set
     * @param bool|null                 $is_public              Pass True to set the public photo, which will be visible even if the main photo is hidden by the
     *                                                          business account's privacy settings. An account can have only one public photo.
     *
     * @see https://core.telegram.org/bots/api#inputprofilephoto InputProfilePhoto
     */
    public function __construct(
        private string $business_connection_id,
        private AbstractInputProfilePhoto $photo,
        private ?bool $is_public = null,
    ) {}

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

    public function getIsPublic(): ?bool
    {
        return $this->is_public;
    }

    public function setIsPublic(?bool $is_public): SetBusinessAccountProfilePhotoRequest
    {
        $this->is_public = $is_public;

        return $this;
    }
}
// endregion CLASS_SetBusinessAccountProfilePhotoRequest
