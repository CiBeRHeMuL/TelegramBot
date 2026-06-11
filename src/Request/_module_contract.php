<?php

/*
 * @moduleContract
 * @purpose Model every Telegram Bot API request as a typed PHP DTO, one class per API method.
 * @scope 170 request DTOs covering all Telegram Bot API methods.
 * @input Method-specific parameters deserialized from API documentation
 * @output Typed Request DTOs implementing RequestInterface
 * @links USES_API(10): Telegram Bot API Methods; USES(8): Entity types, Enum types, ValueObject types
 * @invariants
 * - Every request class implements RequestInterface
 * - Constructor parameter names match Telegram API field names (snake_case)
 * - All optional parameters default to null
 * @rationale
 * Q: Why 170 separate request classes?
 * A: Type safety, IDE autocompletion, and static analysis for every API method.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [10][Marker interface for all request DTOs] => RequestInterface
 * CLASS [8][SendMessage request] => SendMessageRequest
 * CLASS [7][SendPhoto request] => SendPhotoRequest
 * CLASS [7][SendDocument request] => SendDocumentRequest
 * CLASS [7][SetWebhook request] => SetWebhookRequest
 * CLASS [7][GetUpdates request] => GetUpdatesRequest
 * ... plus 165 more request classes
 */
