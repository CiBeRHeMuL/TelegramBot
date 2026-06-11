<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define request handler interface and implementations for processing kernel requests.
 * @scope Request handling, middleware chain execution, logging handlers.
 * @input Kernel Request object (Update + Api + Logger)
 * @output Kernel Response object
 * @links USES(7): Kernel\Request, Kernel\Response, Kernel\Middleware
 * @invariants
 * - MiddlewareChainRequestHandler wraps a RequestHandler with middleware execution
 * - Middleware excuted before the final handler in LIFO order
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [7][Request handler contract] => RequestHandlerInterface
 * CLASS [8][Wraps handler with middleware chain execution] => MiddlewareChainRequestHandler
 * CLASS [5][Log-only request handler (no-op)] => LogRequestHandler
 */
