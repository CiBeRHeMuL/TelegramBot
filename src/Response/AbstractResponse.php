<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ResponseParameters;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;

abstract class AbstractResponse implements ResponseInterface
{
    public function __construct(
        protected readonly RawResponse $response,
    ) {}

    public function isOk(): bool
    {
        return $this->response->isOk();
    }

    public function getDescription(): ?string
    {
        return $this->response->getDescription();
    }

    public function getRawResult(): ?array
    {
        return $this->response->getResult();
    }

    public function getErrorCode(): ?HttpStatusCodeEnum
    {
        return $this->response->getErrorCode();
    }

    public function getParameters(): ?ResponseParameters
    {
        return $this->response->getParameters();
    }
}
