<?php

namespace AndrewGos\TelegramBot\Kernel\RequestHandler;

use AndrewGos\TelegramBot\Kernel\Middleware\MiddlewareInterface;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\Response\Response;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Wraps handler with middleware chain.
 *
 * @sees USES_API(9): MiddlewareInterface, RequestHandlerInterface, Request, Response
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MiddlewareChainRequestHandler, middleware chain, handler wrapper
// STRUCTURE: ▶ handle() → ◇ empty(middlewares) ? → ⊕ handler->handle() | ○ shift middleware → ┌new self(next)┐ → ⊕ middleware->process()

// region CLASS_MiddlewareChainRequestHandler [DOMAIN(8): Telegram; CONCEPT(7): RequestHandler; TECH(9): PHP]
final class MiddlewareChainRequestHandler implements RequestHandlerInterface
{
    /**
     * @param MiddlewareInterface[]   $middlewares
     * @param RequestHandlerInterface $handler
     */
    public function __construct(
        private array $middlewares,
        private readonly RequestHandlerInterface $handler,
    ) {}

    /**
     * {@inheritDoc}
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
// endregion CLASS_MiddlewareChainRequestHandler
