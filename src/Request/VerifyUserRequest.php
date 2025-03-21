<?php

namespace AndrewGos\TelegramBot\Request;

class VerifyUserRequest implements RequestInterface
{
    /**
     * @param int $user_id Unique identifier of the target user
     * @param string|null $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization
     * isn't allowed to provide a custom verification description.
     */
    public function __construct(
        private int $user_id,
        private string|null $custom_description = null,
    ) {
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): VerifyUserRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getCustomDescription(): string|null
    {
        return $this->custom_description;
    }

    public function setCustomDescription(string|null $custom_description): VerifyUserRequest
    {
        $this->custom_description = $custom_description;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'custom_description' => $this->custom_description,
        ];
    }
}
