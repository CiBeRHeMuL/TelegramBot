<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a video chat started.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#videochatstarted
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: VideoChatStarted, Telegram, Bot API, DTO, videochatstarted
// STRUCTURE: ▶ ∅ → ∑ VideoChatStarted
// region CLASS_VideoChatStarted

/**
 * This object represents a service message about a video chat started in the chat. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#videochatstarted
 */
final class VideoChatStarted implements EntityInterface {}

// endregion CLASS_VideoChatStarted
