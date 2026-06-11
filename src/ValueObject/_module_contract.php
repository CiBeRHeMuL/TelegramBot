<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define type-safe domain value objects for Telegram Bot primitive types.
 * @scope 11 value objects: BotToken, ChatId, Url, Email, IpV4, IpV6, Language, Phone, CallbackData, Filename, EncodedJson.
 * @input Primitive PHP values (string, int)
 * @output Typed value objects with validation in constructors
 * @links USES(7): InvalidValueObjectConfigException for validation errors
 * @invariants
 * - All value objects are readonly
 * - Validation is performed in the constructor (fail-fast)
 * - Objects are immutable after construction
 * @rationale
 * Q: Why value objects instead of plain strings?
 * A: Prevents invalid data from entering the system and provides type safety in method signatures.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [8][Bot API token with regex validation] => BotToken
 * CLASS [8][Chat identifier (int ID or @username)] => ChatId
 * CLASS [6][URL with validation] => Url
 * CLASS [5][Email with validation] => Email
 * CLASS [5][IPv4 address] => IpV4
 * CLASS [5][IPv6 address] => IpV6
 * CLASS [5][Language code] => Language
 * CLASS [5][Phone number] => Phone
 * CLASS [5][Callback data string] => CallbackData
 * CLASS [5][Filename with validation] => Filename
 * CLASS [5][JSON-encoded data wrapper] => EncodedJson
 */
