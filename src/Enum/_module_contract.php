<?php

/*
 * @moduleContract
 * @purpose Define all Telegram Bot API enumerations as PHP backed enums for type-safe API interaction.
 * @scope 55 enums covering update types, chat types, message entity types, HTTP methods, etc.
 * @input String/int values from Telegram API responses
 * @output Typed PHP enum instances
 * @links USES_API(8): Telegram Bot API type enumerations
 * @invariants
 * - All enums are backed (string or int) for serialization compatibility
 * - Enum names follow the Telegram API naming convention
 * @rationale
 * Q: Why backed enums instead of constants?
 * A: Backed enums provide type safety in method signatures and automatic JSON serialization.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * ENUM [7][Update type discriminator] => UpdateTypeEnum
 * ENUM [7][Chat type discriminator] => ChatTypeEnum
 * ENUM [6][Chat member status] => ChatMemberStatusEnum
 * ENUM [6][Message entity types] => MessageEntityTypeEnum
 * ENUM [5][Content type detection] => ContentTypeEnum
 * ENUM [5][HTTP methods for requests] => HttpMethodEnum
 * ENUM [5][Telegram parse modes] => TelegramParseModeEnum
 * ... plus 48 more enums
 */
