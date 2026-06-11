<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Provide general-purpose helper utilities.
 * @scope Array manipulation utilities.
 * @input Arrays for transformation
 * @output Transformed arrays
 * @links USES(4): PHP array functions
 * @invariants
 * - All methods are static and pure (no side effects)
 * @rationale
 * Q: Why a helper class instead of standalone functions?
 * A: Namespace grouping for discoverability and autoloading.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [5][Array utility methods] => HArray
 */
