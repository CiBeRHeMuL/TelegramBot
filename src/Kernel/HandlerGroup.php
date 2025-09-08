<?php

namespace AndrewGos\TelegramBot\Kernel;

use AndrewGos\TelegramBot\Kernel\Checker\CheckerInterface;
use AndrewGos\TelegramBot\Kernel\Middleware\MiddlewareInterface;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;

final readonly class HandlerGroup
{
    /**
     * @param CheckerInterface $checker
     * @param RequestHandlerInterface $requestHandler
     * @param MiddlewareInterface[] $middlewares
     * @param int $priority
     */
    public function __construct(
        private CheckerInterface $checker,
        private RequestHandlerInterface $requestHandler,
        private array $middlewares = [],
        private int $priority = 0,
    ) {
    }

    public function getChecker(): CheckerInterface
    {
        return $this->checker;
    }

    public function getRequestHandler(): RequestHandlerInterface
    {
        return $this->requestHandler;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }
}
