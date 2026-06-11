<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputProfilePhoto;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setMyProfilePhoto method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setmyprofilephoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, My, Profile, Photo
// STRUCTURE: ▶ ┌photo┐ → ◇ construct → ⊕ → ∑ ⟦SetMyProfilePhotoRequest⟧

// region CLASS_SetMyProfilePhotoRequest
/**
 * @see https://core.telegram.org/bots/api#setmyprofilephoto
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
// endregion CLASS_SetMyProfilePhotoRequest
