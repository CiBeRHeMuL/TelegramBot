<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\UserProfilePhotos;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getUserProfilePhotos method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get user profile photos, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ UserProfilePhotos

// region CLASS_GetUserProfilePhotosResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
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
