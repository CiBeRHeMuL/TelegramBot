<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API removeUserVerification method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#removeuserverification
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Remove, User, Verification
// STRUCTURE: ▶ ┌user_id┐ → ◇ construct → ⊕ → ∑ ⟦RemoveUserVerificationRequest⟧

// region CLASS_RemoveUserVerificationRequest
/**
 * @see https://core.telegram.org/bots/api#removeuserverification
 */
class RemoveUserVerificationRequest implements RequestInterface
{
    /**
     * @param int $user_id Unique identifier of the target user
     */
    public function __construct(
        private int $user_id,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): RemoveUserVerificationRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_RemoveUserVerificationRequest
