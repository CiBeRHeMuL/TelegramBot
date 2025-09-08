<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\User;

class GetMeResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ?User $user = null,
    ) {
        parent::__construct($response);
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}
