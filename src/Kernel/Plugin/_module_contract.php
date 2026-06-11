<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define plugin interface and implementations for extending kernel behavior with pre-configured handler groups.
 * @scope Plugin registration, automatic handler group provision.
 * @input No direct input — plugins provide HandlerGroup[] on construction
 * @output HandlerGroup[] for automatic registration into UpdateHandler
 * @links USES(8): Kernel\UpdateHandler, Kernel\HandlerGroup
 * @invariants
 * - PluginInterface::getHandlerGroups() returns all handler groups the plugin provides
 * - Plugins are registered via UpdateHandler::registerPlugin()
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [7][Plugin contract] => PluginInterface
 * CLASS [6][Plugin that logs all updates] => LogPlugin
 */
