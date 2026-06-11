<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Implement PSR-7 MessageInterface (Request and Response) for HTTP transport.
 * @scope HttpRequest and HttpResponse classes following PSR-7 standards.
 * @input Request target, method, headers, body; Response status code, headers, body
 * @output PSR-7 compliant RequestInterface and ResponseInterface objects
 * @links USES_API(9): PSR-7 MessageInterface, RequestInterface, ResponseInterface
 * @invariants
 * - Messages are immutable (PSR-7 standard)
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [7][PSR-7 Request implementation] => HttpRequest
 * CLASS [7][PSR-7 Response implementation] => HttpResponse
 */
