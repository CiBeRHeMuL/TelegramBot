<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ResponseParameters;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;

interface ResponseInterface
{
    public function isOk(): bool;

    public function getDescription(): ?string;

    public function getRawResult(): ?array;

    public function getErrorCode(): ?HttpStatusCodeEnum;

    public function getParameters(): ?ResponseParameters;
}
