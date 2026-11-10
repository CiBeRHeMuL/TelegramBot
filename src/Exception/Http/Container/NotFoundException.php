<?php

namespace AndrewGos\TelegramBot\Exception\Http\Container;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

// region CLASS_NotFoundException
class NotFoundException extends Exception implements NotFoundExceptionInterface {}
// endregion CLASS_NotFoundException
