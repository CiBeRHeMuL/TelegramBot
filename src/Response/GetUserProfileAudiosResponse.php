<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\UserProfileAudios;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getUserProfileAudios method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get user profile audios, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ UserProfileAudios

// region CLASS_GetUserProfileAudiosResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
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
