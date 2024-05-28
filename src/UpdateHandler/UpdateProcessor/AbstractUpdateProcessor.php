<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

abstract class AbstractUpdateProcessor implements UpdateProcessorInterface
{
    protected Update $update;
    protected ApiInterface $api;
    protected LoggerInterface $logger;

    public function setUpdate(Update $update): static
    {
        $this->update = $update;
        return $this;
    }

    public function getUpdate(): Update
    {
        return $this->update;
    }

    public function setApi(ApiInterface $api): static
    {
        $this->api = $api;
        return $this;
    }

    public function getApi(): ApiInterface
    {
        return $this->api;
    }

    public function setLogger(LoggerInterface $logger): static
    {
        $this->logger = $logger;
        return $this;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function beforeProcess(): bool
    {
        return true;
    }

    protected function invalidUpdateException(UpdateTypeEnum $type): InvalidArgumentException
    {
        throw new InvalidArgumentException('Invalid update! Update MUST have not null "' . $type->value . '" field!.');
    }
}
