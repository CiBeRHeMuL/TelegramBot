<?php

/*
 * @moduleContract
 * @purpose Implement a PSR-18 HTTP client for sending Telegram Bot API requests.
 * @scope Single HttpClient class that wraps PHP native stream context for HTTP communication.
 * @input PSR-7 RequestInterface
 * @output PSR-7 ResponseInterface
 * @links USES_API(8): PSR-18 HttpClientInterface
 * @invariants
 * - Uses PHP stream context (not cURL) for HTTP transport
 * @rationale
 * Q: Why stream context instead of cURL?
 * A: Zero additional extension dependencies; always available in PHP.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [9][PSR-18 HTTP client] => HttpClient
 */
