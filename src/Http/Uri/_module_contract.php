<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Implement PSR-7 UriInterface for URI parsing and manipulation.
 * @scope Single Uri class covering scheme, host, port, path, query, fragment.
 * @input URI string or components
 * @output PSR-7 compatible UriInterface
 * @links USES_API(7): PSR-7 UriInterface
 * @invariants
 * - URI is immutable (PSR-7 standard)
 * - with* methods return new instances
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [6][PSR-7 Uri implementation] => Uri
 */
