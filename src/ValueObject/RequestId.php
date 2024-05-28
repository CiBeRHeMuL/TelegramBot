<?php

namespace AndrewGos\TelegramBot\ValueObject;

readonly class RequestId
{
    public function __construct(
        private int $id,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
