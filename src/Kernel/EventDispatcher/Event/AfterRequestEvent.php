<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\Response\Response;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Dispatched after a request is processed.
 *
 * @sees USES_API(9): AbstractEvent, Request, Response
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AfterRequestEvent, post-request event
// STRUCTURE: ▶ ┌Request + Response┐ → ⊕ getRequest() → ⊕ getResponse()

// region CLASS_AfterRequestEvent [DOMAIN(8): Telegram; CONCEPT(7): Event; TECH(9): PHP]
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
