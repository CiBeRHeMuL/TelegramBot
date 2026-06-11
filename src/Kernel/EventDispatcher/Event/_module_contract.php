<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define kernel lifecycle events dispatched during update processing.
 * @scope Events before/after handle, update received, before/after request, plugin registration, handler group addition.
 * @input Event-specific payload (Update, Request, Response, Plugin, HandlerGroup)
 * @output Dispatched events consumed by PSR-14 EventDispatcherInterface
 * @links USES_API(7): PSR-14 EventDispatcher; USES(7): Kernel\UpdateHandler
 * @invariants
 * - All events extend AbstractEvent
 * - Events are dispatched at specific lifecycle points in UpdateHandler
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [5][Base abstract event] => AbstractEvent
 * CLASS [5][Dispatched before handle() starts] => BeforeHandleEvent
 * CLASS [5][Dispatched after handle() completes] => AfterHandleEvent
 * CLASS [5][Dispatched when a new update arrives] => UpdateReceivedEvent
 * CLASS [5][Dispatched before request handler executes] => BeforeRequestEvent
 * CLASS [5][Dispatched after request handler completes] => AfterRequestEvent
 * CLASS [4][Dispatched when a plugin is registered] => PluginRegisteredEvent
 * CLASS [4][Dispatched when a handler group is added] => HandlerGroupAddedEvent
 */
