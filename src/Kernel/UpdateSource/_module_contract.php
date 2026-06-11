<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define update source interface and implementations for receiving Telegram updates from various inputs.
 * @scope Webhook (php://input), long polling (getUpdates), array (testing), custom input.
 * @input Incoming data (PHP input stream, API response, arrays)
 * @output iterable<Update> for kernel processing
 * @links USES(8): Kernel\UpdateHandler; USES(7): Entity\Update, Api\ApiInterface
 * @invariants
 * - UpdateSourceInterface::getUpdates() returns an iterable of Update objects
 * - Different sources handle different deployment scenarios
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [8][Update source contract] => UpdateSourceInterface
 * CLASS [7][Reads from php://input (webhook mode)] => PhpInputUpdateSource
 * CLASS [8][Long-polling via getUpdates API method] => GetUpdatesUpdateSource
 * CLASS [5][Array-based source for testing] => ArrayUpdateSource
 * CLASS [5][Custom input callable source] => CustomInputUpdateSource
 */
