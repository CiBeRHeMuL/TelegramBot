<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

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
