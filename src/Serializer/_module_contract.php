<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Configure and provide serializer instances for Telegram Bot API data (requests, responses, entities).
 * @scope Serializer factory and custom normalizer for Telegram-specific types.
 * @input Raw PHP types (arrays, objects) to serialize
 * @output Serialized representations (JSON strings, typed arrays)
 * @links USES(9): andrew-gos/serializer; USES(6): Normalizer for Telegram entities
 * @invariants
 * - SerializerFactory produces configured serializer instances
 * - TelegramNormalizer handles Telegram-specific serialization
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [8][Serializer factory] => SerializerFactory
 * // Sub-namespace: Normalizer
 * CLASS [6][Telegram-specific normalizer] => Normalizer\TelegramNormalizer
 */
