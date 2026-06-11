<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define the contract and HTTP implementation for all Telegram Bot API methods.
 * @scope 150+ API methods, request serialization, response deserialization, HTTP transport.
 * @input Request DTOs from AndrewGos\TelegramBot\Request, BotToken
 * @output Response DTOs from AndrewGos\TelegramBot\Response
 * @links USES_API(10): Telegram Bot API; USES(8): Http\Client, Http\Factory, Serializer
 * @invariants
 * - Every public method corresponds to a Telegram Bot API endpoint
 * - ApiInterface methods return typed Response DTOs
 * @rationale
 * Q: Why a separate interface for the API?
 * A: Allows testing with mock implementations and supports future transport variations.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [10][Contract for all Telegram Bot API methods] => ApiInterface
 * CLASS [10][HTTP implementation of ApiInterface] => Api
 */
