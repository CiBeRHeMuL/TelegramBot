<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define middleware interface and implementations for the handler group pipeline.
 * @scope Intercepting requests before they reach the RequestHandler, logging, propagation control.
 * @input Kernel Request object
 * @output Modified Kernel Request object (or stop propagation)
 * @links USES(7): Kernel\RequestHandler, Kernel\Response
 * @invariants
 * - Middleware can modify the request or stop propagation entirely
 * - Middleware chain wraps the RequestHandler
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [6][Middleware contract] => MiddlewareInterface
 * CLASS [6][Logs incoming requests] => LogMiddleware
 * CLASS [5][Stops propagation after this middleware] => StopRequestPropagationMiddleware
 */
