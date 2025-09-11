<?php

namespace AndrewGos\TelegramBot\Tests\Integration\TestClass\Kernel\Middleware;

use AndrewGos\TelegramBot\Kernel\Middleware\MiddlewareInterface;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;

class SimpleMiddleware implements MiddlewareInterface
{
    /**
     * @inheritDoc
     */
    public function process(Request $request, RequestHandlerInterface $handler): Response
    {
        $response = $handler->handle($request);
        if ($response->has('count')) {
            return $response->withAttribute('count', $response->get('count') + 1);
        }
        return $response->withAttribute('count', 1);
    }
}
