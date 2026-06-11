<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Provide the root facade (Telegram) and static factory (TelegramFactory) for the entire Telegram bot library.
 * @scope Library entry points, version info, bot token validation, Api + UpdateHandler wiring.
 * @input BotToken, optional LoggerInterface, optional EventDispatcherInterface
 * @output Configured Telegram instances ready for API calls and update processing
 * @links USES_API(10): Telegram Bot API; READS_DATA_FROM(Y): BotToken
 * @invariants
 * - Telegram always contains a valid ApiInterface and UpdateHandlerInterface
 * - Token consistency between Telegram and Api is enforced in setApi()
 * @rationale
 * Q: Why separate TelegramFactory from Telegram?
 * A: Telegram is the runtime facade; TelegramFactory encapsulates the complex DI wiring needed to create a fully functional instance.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [10][Library facade - aggregates Api + UpdateHandler] => Telegram
 * CLASS [8][Static factory for webhook/polling Telegram instances] => TelegramFactory
 */
