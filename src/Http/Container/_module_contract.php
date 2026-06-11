<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Provide HTTP headers container with PSR-7-compatible header management.
 * @scope Header storage, retrieval, and manipulation for HTTP messages.
 * @input Header key-value pairs
 * @output Normalized header container
 * @links USES_API(6): PSR-7 header conventions
 * @invariants
 * - Header names are case-insensitive
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [5][Headers container contract] => HttpHeadersContainerInterface
 * CLASS [6][Headers container implementation] => HttpHeadersContainer
 */
