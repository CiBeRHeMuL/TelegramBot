<?php

namespace AndrewGos\TelegramBot\Request;

class RemoveUserVerificationRequest implements RequestInterface
{
    /**
     * @param int $user_id Unique identifier of the target user
     */
    public function __construct(
        private int $user_id,
    ) {
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): RemoveUserVerificationRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
        ];
    }
}
