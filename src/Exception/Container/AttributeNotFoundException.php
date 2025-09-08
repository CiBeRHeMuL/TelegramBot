<?php

namespace AndrewGos\TelegramBot\Exception\Container;

use LogicException;
use Psr\Container\NotFoundExceptionInterface;

class AttributeNotFoundException extends LogicException implements NotFoundExceptionInterface {}
