<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\Response\Response;

// region CLASS_AfterRequestEvent
final class AfterRequestEvent extends AbstractEvent
{
    public function __construct(
        private readonly Request $request,
        private readonly Response $response,
    ) {}

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
}
// endregion CLASS_AfterRequestEvent
