<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Orchestrate incoming Telegram update processing through a pipeline of checkers, middlewares, handler groups, and plugins.
 * @scope Update reception, dispatch to prioritized HandlerGroups, middleware chain execution, plugin registration, event dispatching.
 * @input Update objects from UpdateSourceInterface
 * @output Response objects from RequestHandler execution
 * @links USES_API(9): UpdateHandlerInterface; USES(8): Checker, Middleware, Plugin, RequestHandler, UpdateSource, EventDispatcher
 * @invariants
 * - HandlerGroups are sorted by priority (descending) before processing
 * - Each HandlerGroup's Checker determines if the group processes the update
 * - Middleware chain wraps the RequestHandler
 * - StopRequestPropagation flag can break the handler group loop
 * @rationale
 * Q: Why a pipeline architecture instead of direct handler calls?
 * A: Provides extensibility (plugins, middlewares) and separation of concerns (checking vs handling).
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [10][Update handler contract] => UpdateHandlerInterface
 * CLASS [10][Update handler implementation — orchestrator] => UpdateHandler
 * CLASS [8][HandlerGroup — binds Checker + Middlewares + RequestHandler] => HandlerGroup
 * // Sub-namespace: Checker
 * INTERFACE [7][Checker contract] => Checker\CheckerInterface
 * CLASS [6][AnyOf checker] => Checker\AnyChecker
 * CLASS [7][Update type checker] => Checker\UpdateTypeChecker
 * CLASS [7][Message command checker] => Checker\MessageCommandChecker
 * // Sub-namespace: Middleware
 * INTERFACE [6][Middleware contract] => Middleware\MiddlewareInterface
 * CLASS [6][Logging middleware] => Middleware\LogMiddleware
 * CLASS [5][Stop propagation middleware] => Middleware\StopRequestPropagationMiddleware
 * // Sub-namespace: Plugin
 * INTERFACE [7][Plugin contract] => Plugin\PluginInterface
 * CLASS [6][Logging plugin] => Plugin\LogPlugin
 * // Sub-namespace: Request
 * CLASS [6][Kernel request DTO] => Request\Request
 * // Sub-namespace: RequestHandler
 * INTERFACE [7][Request handler contract] => RequestHandler\RequestHandlerInterface
 * CLASS [8][Middleware chain request handler] => RequestHandler\MiddlewareChainRequestHandler
 * CLASS [5][Log request handler] => RequestHandler\LogRequestHandler
 * // Sub-namespace: Response
 * CLASS [6][Kernel response DTO] => Response\Response
 * // Sub-namespace: UpdateSource
 * INTERFACE [8][Update source contract] => UpdateSource\UpdateSourceInterface
 * CLASS [7][PHP input stream source (webhook)] => UpdateSource\PhpInputUpdateSource
 * CLASS [8][Long-polling source (getUpdates)] => UpdateSource\GetUpdatesUpdateSource
 * CLASS [5][Array-based source (testing)] => UpdateSource\ArrayUpdateSource
 * CLASS [5][Custom input source] => UpdateSource\CustomInputUpdateSource
 * // Sub-namespace: EventDispatcher\Event
 * CLASS [5][Base event] => EventDispatcher\Event\AbstractEvent
 * CLASS [5][Before handle event] => EventDispatcher\Event\BeforeHandleEvent
 * CLASS [5][After handle event] => EventDispatcher\Event\AfterHandleEvent
 * CLASS [5][Update received event] => EventDispatcher\Event\UpdateReceivedEvent
 * CLASS [5][Before request event] => EventDispatcher\Event\BeforeRequestEvent
 * CLASS [5][After request event] => EventDispatcher\Event\AfterRequestEvent
 * CLASS [4][Plugin registered event] => EventDispatcher\Event\PluginRegisteredEvent
 * CLASS [4][Handler group added event] => EventDispatcher\Event\HandlerGroupAddedEvent
 */
