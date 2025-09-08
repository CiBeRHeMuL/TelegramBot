<?php

namespace AndrewGos\TelegramBot\Kernel\Middleware;

use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;

interface MiddlewareInterface
{
    /**
     * Handles the update through the middleware.
     *
     * @param Request $request
     * @param RequestHandlerInterface $handler The next handler in the chain to be called after middleware processing
     *
     * @return Response
     */
    public function process(Request $request, RequestHandlerInterface $handler): Response;
}
