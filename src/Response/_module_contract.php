<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Model every Telegram Bot API response as a typed PHP DTO, one class per API method response.
 * @scope 86 response DTOs covering all Telegram Bot API method responses.
 * @input JSON responses from Telegram Bot API deserialized via ClassBuilder
 * @output Typed Response DTOs implementing ResponseInterface
 * @links USES_API(10): Telegram Bot API Methods; USES(8): Entity types for result fields
 * @invariants
 * - Every response class extends AbstractResponse or implements ResponseInterface
 * - Response types include: typed result, array of entities, scalar, bool
 * - RawResponse provides untyped access to raw API response
 * @rationale
 * Q: Why 86 separate response classes?
 * A: Type-safe access to typed result fields with proper deserialization.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [10][Marker interface for all response DTOs] => ResponseInterface
 * CLASS [9][Abstract base for typed responses] => AbstractResponse
 * CLASS [5][Raw untyped response] => RawResponse
 * CLASS [7][GetUpdates response] => GetUpdatesResponse
 * CLASS [7][SendMessage response] => SendMessageResponse
 * CLASS [6][GetMe response] => GetMeResponse
 * ... plus 81 more response classes
 */
