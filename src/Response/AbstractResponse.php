<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ResponseParameters;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;

abstract class AbstractResponse implements ResponseInterface
{
    public function __construct(
        readonly protected RawResponse $response,
    ) {
    }

    public function isOk(): bool
    {
        return $this->response->isOk();
    }

    public function getDescription(): string|null
    {
        return $this->response->getDescription();
    }

    public function getRawResult(): array|null
    {
        return $this->response->getResult();
    }

    public function getErrorCode(): HttpStatusCodeEnum|null
    {
        return $this->response->getErrorCode();
    }

    public function getParameters(): ResponseParameters|null
    {
        return $this->response->getParameters();
    }
}
