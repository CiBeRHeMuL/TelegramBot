<?php

namespace AndrewGos\TelegramBot\Kernel\RequestHandler;

use AndrewGos\TelegramBot\Kernel\Middleware\MiddlewareInterface;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\Response\Response;

final class MiddlewareChainRequestHandler implements RequestHandlerInterface
{
    /**
     * @param MiddlewareInterface[] $middlewares
     * @param RequestHandlerInterface $handler
     */
    public function __construct(
        private array $middlewares,
        private readonly RequestHandlerInterface $handler,
    ) {}

    /**
     * @inheritDoc
     */
    public function handle(Request $request): Response
    {
        if (empty($this->middlewares)) {
            return $this->handler->handle($request);
        }

        $middleware = array_shift($this->middlewares);

        $next = new self(
            $this->middlewares,
            $this->handler,
        );

        return $middleware->process($request, $next);
    }
}
