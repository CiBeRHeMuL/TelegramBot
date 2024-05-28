<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\ValueObject\ResponseParameters;

interface ResponseInterface
{
    public function isOk(): bool;

    public function getDescription(): string|null;

    public function getRawResult(): array|null;

    public function getErrorCode(): HttpStatusCodeEnum|null;

    public function getParameters(): ResponseParameters|null;
}
