<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputProfilePhoto;

/**
 * @link https://core.telegram.org/bots/api#setmyprofilephoto
 */
class SetMyProfilePhotoRequest implements RequestInterface
{
    /**
     * @param AbstractInputProfilePhoto $photo The new profile photo to set
     *
     * @see https://core.telegram.org/bots/api#inputprofilephoto InputProfilePhoto
     */
    public function __construct(
        private AbstractInputProfilePhoto $photo,
    ) {}

    public function getPhoto(): AbstractInputProfilePhoto
    {
        return $this->photo;
    }

    public function setPhoto(AbstractInputProfilePhoto $photo): SetMyProfilePhotoRequest
    {
        $this->photo = $photo;
        return $this;
    }
}
