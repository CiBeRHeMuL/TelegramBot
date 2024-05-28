<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use InvalidArgumentException;

abstract class AbstractUpdateProcessor implements UpdateProcessorInterface
{
    public function __construct(
        protected Update $update,
        protected ApiInterface $api,
    ) {
    }

    public static function createForUpdate(Update $update): static
    {
        return new static($update);
    }

    public function getApi(): ApiInterface
    {
        return $this->api;
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
