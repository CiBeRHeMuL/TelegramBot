<?php

namespace AndrewGos\TelegramBot\Kernel\Middleware;

use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Middleware contract — intercepts requests.
 *
 * @sees USES_API(9): Request, RequestHandlerInterface, Response
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MiddlewareInterface, middleware contract, request interception
// STRUCTURE: ▶ process(Request, handler) → Response

// region INTERFACE_MiddlewareInterface [DOMAIN(8): Telegram; CONCEPT(7): Middleware; TECH(9): PHP]
interface MiddlewareInterface
{
    /**
     * Handles the update through the middleware.
     *
     * @param Request                 $request
     * @param RequestHandlerInterface $handler The next handler in the chain to be called after middleware processing
     *
     * @return Response
     */
    public function process(Request $request, RequestHandlerInterface $handler): Response;
}
// endregion INTERFACE_MiddlewareInterface
