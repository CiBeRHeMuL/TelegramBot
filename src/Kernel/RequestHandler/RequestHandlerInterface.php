<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\RequestHandler;

use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\Response\Response;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Request handler contract.
 *
 * @sees USES_API(9): Request, Response
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RequestHandlerInterface, handler contract, request processing
// STRUCTURE: ▶ handle(Request) → Response

// region INTERFACE_RequestHandlerInterface [DOMAIN(8): Telegram; CONCEPT(7): RequestHandler; TECH(9): PHP]
interface RequestHandlerInterface
{
    /**
     * Handle request. Returns the response object.
     * Note, that http handler (if you use webhook mode) MUST return to telegram HTTP status code specified in this Response object.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response;
}
// endregion INTERFACE_RequestHandlerInterface
