<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Model all Telegram Bot API entity types as PHP DTOs with full type safety and deserialization support.
 * @scope 303 entity classes covering every Telegram API object type.
 * @input JSON responses from Telegram Bot API deserialized via ClassBuilder
 * @output Typed PHP DTOs with getters for all properties
 * @links USES_API(10): Telegram Bot API Objects; USES(10): andrew-gos/class-builder (BuildIf, ArrayType attributes)
 * @invariants
 * - All entities implement EntityInterface
 * - Abstract base classes exist for polymorphic fields (e.g., AbstractChatMember, AbstractInlineQueryResult)
 * - Entity classes are final and readonly where possible
 * @rationale
 * Q: Why 303 separate classes instead of generic maps?
 * A: Type safety, IDE autocompletion, and static analysis require explicit DTOs per Telegram API type.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [10][Marker interface for all entities] => EntityInterface
 * CLASS [10][Core message entity — 110+ fields] => Message
 * CLASS [9][Incoming update container] => Update
 * CLASS [9][Chat entity] => Chat
 * CLASS [8][User entity] => User
 * ... plus 299 more entity classes
 */
