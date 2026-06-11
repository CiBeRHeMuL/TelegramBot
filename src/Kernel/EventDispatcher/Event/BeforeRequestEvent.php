<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\Request\Request;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Dispatched before a request is processed.
 *
 * @sees USES_API(9): AbstractEvent, Request
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BeforeRequestEvent, pre-request event
// STRUCTURE: ▶ ┌Request entity┐ → ⊕ getRequest()

// region CLASS_BeforeRequestEvent [DOMAIN(8): Telegram; CONCEPT(7): Event; TECH(9): PHP]
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
