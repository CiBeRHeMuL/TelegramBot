<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define checker interface and implementations that determine whether a HandlerGroup should process an update.
 * @scope Checking update type, message commands, logical combinations of checks.
 * @input Update entity
 * @output bool — whether the handler group should process this update
 * @links USES(7): Kernel\HandlerGroup; USES(6): Entity\Update, Enum\UpdateTypeEnum
 * @invariants
 * - CheckerInterface::check() is pure (no side effects)
 * - Multiple checkers can be combined via AnyChecker
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [7][Checker contract] => CheckerInterface
 * CLASS [6][Returns true if ANY nested checker passes] => AnyChecker
 * CLASS [7][Checks update type matches expected] => UpdateTypeChecker
 * CLASS [7][Checks message contains a specific command] => MessageCommandChecker
 */
