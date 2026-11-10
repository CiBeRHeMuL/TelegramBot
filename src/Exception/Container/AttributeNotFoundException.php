<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Exception\Container;

use LogicException;
use Psr\Container\NotFoundExceptionInterface;

// region CLASS_AttributeNotFoundException
class AttributeNotFoundException extends LogicException implements NotFoundExceptionInterface {}
// endregion CLASS_AttributeNotFoundException
