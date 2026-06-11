<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel;

use AndrewGos\TelegramBot\Kernel\Checker\CheckerInterface;
use AndrewGos\TelegramBot\Kernel\Middleware\MiddlewareInterface;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;

// region MODULE_CONTRACT [DOMAIN(9): Telegram Bot; CONCEPT(8): Pipeline; TECH(6): DTO]
/**
 * @moduleContract
 * @purpose Bind a Checker, Middleware stack, and RequestHandler into a single prioritized processing pipeline for updates.
 * @scope Pipeline composition: checker decides if group handles the update, middlewares transform the request, handler produces the response.
 * @input CheckerInterface, RequestHandlerInterface, MiddlewareInterface[], priority
 * @output Composed pipeline ready for UpdateHandler registration
 *
 * @sees USES(8): Checker\CheckerInterface, Middleware\MiddlewareInterface, RequestHandler\RequestHandlerInterface
 *
 * @invariants
 * - Priority determines execution order (higher = processed first)
 * - HandlerGroup is immutable after construction (final readonly)
 *
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HandlerGroup, pipeline, checker, middleware, request handler, priority, handler group
// STRUCTURE: ▶ ┌Checker + Middleware[] + RequestHandler + priority┐ → ◇ UpdateHandler sorts by priority (desc) → ○ foreach: ◇ checker.check() → MiddlewareChain → handler.handle()

// region CLASS_HandlerGroup [DOMAIN(9): Telegram Bot; CONCEPT(8): Pipeline]
final readonly class HandlerGroup
{
    /**
     * @param CheckerInterface        $checker
     * @param RequestHandlerInterface $requestHandler
     * @param MiddlewareInterface[]   $middlewares
     * @param int                     $priority
     */
    public function __construct(
        private CheckerInterface $checker,
        private RequestHandlerInterface $requestHandler,
        private array $middlewares = [],
        private int $priority = 0,
    ) {}

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
// endregion CLASS_HandlerGroup
