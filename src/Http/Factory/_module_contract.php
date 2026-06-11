<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Construct PSR-7 Request objects for Telegram Bot API calls with proper serialization.
 * @scope Request creation from method name + parameters, body serialization for multipart/JSON.
 * @input Telegram Bot API method name, parameters (mixed)
 * @output PSR-7 RequestInterface ready for HTTP transport
 * @links USES(8): Http\Message, Http\Stream (MultipartStream)
 * @invariants
 * - Factory produces fully-formed requests with correct Content-Type and method
 * @rationale
 * Q: Why a separate factory?
 * A: Centralizes request serialization logic and multipart body generation.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [7][Telegram request factory contract] => TelegramRequestFactoryInterface
 * CLASS [8][Telegram request factory implementation] => TelegramRequestFactory
 */
