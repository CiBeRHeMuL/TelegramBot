<?php

namespace AndrewGos\TelegramBot\Kernel\Middleware;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Stops request propagation when requested.
 *
 * @sees USES_API(9): MiddlewareInterface, Request, Response, HttpStatusCodeEnum
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StopRequestPropagationMiddleware, propagation stop, middleware
// STRUCTURE: ▶ process() → ◇ propagationStopped ? → ⊕ Response(NoContent, stop) | ⊕ handle() → ⊕ stopPropagation()

// region CLASS_StopRequestPropagationMiddleware [DOMAIN(8): Telegram; CONCEPT(7): Middleware; TECH(9): PHP]
/**
 * Simple middleware that allows you to stop request propagation.
 */
class StopRequestPropagationMiddleware implements MiddlewareInterface
{
    public function process(Request $request, RequestHandlerInterface $handler): Response
    {
        if ($request->isPropagationStopped()) {
            return new Response(
                HttpStatusCodeEnum::NoContent,
                stopRequestPropagation: true,
            );
        }

        $response = $handler->handle($request);

        return $response->stopRequestPropagation();
    }
}
// endregion CLASS_StopRequestPropagationMiddleware
