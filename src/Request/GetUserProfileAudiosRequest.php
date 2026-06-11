<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getUserProfileAudios method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getuserprofileaudios
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, User, Profile, Audios
// STRUCTURE: ▶ ┌user_id + limit + offset┐ → ◇ construct → ⊕ → ∑ ⟦GetUserProfileAudiosRequest⟧

// region CLASS_GetUserProfileAudiosRequest
/**
 * @see https://core.telegram.org/bots/api#getuserprofileaudios
 */
class GetUserProfileAudiosRequest implements RequestInterface
{
    /**
     * @param int      $user_id Unique identifier of the target user
     * @param int|null $limit   Limits the number of audios to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     * @param int|null $offset  Sequential number of the first audio to be returned. By default, all audios are returned.
     */
    public function __construct(
        private int $user_id,
        private ?int $limit = null,
        private ?int $offset = null,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetUserProfileAudiosRequest
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): GetUserProfileAudiosRequest
    {
        $this->limit = $limit;

        return $this;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(?int $offset): GetUserProfileAudiosRequest
    {
        $this->offset = $offset;

        return $this;
    }
}
// endregion CLASS_GetUserProfileAudiosRequest
