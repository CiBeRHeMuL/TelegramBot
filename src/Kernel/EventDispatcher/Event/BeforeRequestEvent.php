<?php

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\Request\Request;

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
