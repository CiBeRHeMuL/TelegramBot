<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a forum topic reopened in the chat. Currently holds no information.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#forumtopicreopened
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ForumTopicReopened, forum topic, reopened, service message, Telegram Bot API
// STRUCTURE: — (empty, no fields)
// region CLASS_ForumTopicReopened
/**
 * This object represents a service message about a forum topic reopened in the chat. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#forumtopicreopened
 */
final class ForumTopicReopened implements EntityInterface {}
// endregion CLASS_ForumTopicReopened
