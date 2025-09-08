<?php

namespace AndrewGos\TelegramBot\Exception\UpdateHandler\New\Middleware;

use LogicException;
use Psr\Container\NotFoundExceptionInterface;

class AttributeNotFoundException extends LogicException implements NotFoundExceptionInterface
{
}
