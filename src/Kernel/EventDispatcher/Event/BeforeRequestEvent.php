<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\Request\Request;

// region CLASS_BeforeRequestEvent
final class BeforeRequestEvent extends AbstractEvent
{
    public function __construct(
        private readonly Request $request,
    ) {}

    public function getRequest(): Request
    {
        return $this->request;
    }
}
// endregion CLASS_BeforeRequestEvent
