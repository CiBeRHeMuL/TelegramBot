<?php

namespace AndrewGos\TelegramBot\Kernel\Middleware;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;

/**
 * Simple middleware that allows you to stop request propagation
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
