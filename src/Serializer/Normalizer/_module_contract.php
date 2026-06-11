<?php

/*
 * @moduleContract
 * @purpose Provide Telegram-specific normalization logic for the serializer.
 * @scope Custom normalizer for Telegram entity types that require special serialization handling.
 * @input Telegram entity objects needing custom serialization
 * @output Normalized representations compatible with the serializer
 * @links USES(8): andrew-gos/serializer normalization pipeline
 * @invariants
 * - Normalizer handles Telegram-specific type conversions
 * - Integrates with SerializerFactory's serializer config
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [6][Telegram entity normalizer] => TelegramNormalizer
 */
