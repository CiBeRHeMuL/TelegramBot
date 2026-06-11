<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region INTERFACE_RequestInterface [DOMAIN(10): Telegram; CONCEPT(10): Request; TECH(8): PHP]
/**
 * @moduleContract
 * @purpose Marker interface for all Telegram Bot API request DTOs.
 * @scope 170+ request classes across the Request namespace.
 * @input Method-specific parameters matching Telegram API fields.
 * @output Typed DTO ready for serialization to API call.
 * @invariants
 * - Every request class implements this interface.
 * - Constructor parameter names match Telegram API snake_case field names.
 *
 * @rationale
 * Q: Why a dedicated interface for all requests?
 * A: Provides a type-safe contract ensuring every API method receives strongly-typed inputs,
 *    enabling IDE autocompletion and static analysis.
 *
 * @changes
 * LAST_CHANGE: Added semantic documentation markup.
 *
 * @modulemap
 * INTERFACE [10][Marker interface for all request DTOs] => RequestInterface
 */
// endregion INTERFACE_RequestInterface
// GREP_SUMMARY: RequestInterface, Telegram Bot API, request DTO, marker interface
// STRUCTURE: ▶ ┌RequestInterface┐ → 170+ implements → ⟦Typed DTOs⟧ → ∑ serialize() → ⚡ HTTP request

interface RequestInterface {}
