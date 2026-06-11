<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Define library-specific exception types for error handling and diagnostics.
 * @scope API error responses, value object validation errors, and sub-namespace exceptions.
 * @input Error conditions from API responses or invalid configurations
 * @output Typed exceptions for targeted catch blocks
 * @links USES(6): PSR-3 logging for error context
 * @invariants
 * - All exception classes extend \Exception or library base exceptions
 * - Sub-namespaces: Container, Filesystem, Http\Container
 * @rationale
 * Q: Why specific exception classes per domain?
 * A: Enables precise error handling in client code.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [8][Exception for non-2xx API responses] => ErrorResponseException
 * CLASS [7][Exception for invalid value object config] => InvalidValueObjectConfigException
 * // Sub-namespace: Container
 * CLASS [5][Attribute not found in container] => Container\AttributeNotFoundException
 * // Sub-namespace: Filesystem
 * CLASS [5][Filesystem permission error] => Filesystem\PermissionException
 * // Sub-namespace: Http\Container
 * CLASS [5][HTTP container not found] => Http\Container\NotFoundException
 */
