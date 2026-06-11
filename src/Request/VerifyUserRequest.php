<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API verifyUser method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#verifyuser
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Verify, User
// STRUCTURE: ▶ ┌user_id + custom_description┐ → ◇ construct → ⊕ → ∑ ⟦VerifyUserRequest⟧

// region CLASS_VerifyUserRequest
/**
 * @see https://core.telegram.org/bots/api#verifyuser
 */
class VerifyUserRequest implements RequestInterface
{
    /**
     * @param int         $user_id            Unique identifier of the target user
     * @param string|null $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization
     *                                        isn't allowed to provide a custom verification description.
     */
    public function __construct(
        private int $user_id,
        private ?string $custom_description = null,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): VerifyUserRequest
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCustomDescription(): ?string
    {
        return $this->custom_description;
    }

    public function setCustomDescription(?string $custom_description): VerifyUserRequest
    {
        $this->custom_description = $custom_description;

        return $this;
    }
}
// endregion CLASS_VerifyUserRequest
