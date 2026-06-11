<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the origin of a message.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#messageorigin
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Channel message origin] => MessageOriginChannel
 * CLASS 5[Chat message origin] => MessageOriginChat
 * CLASS 5[Hidden user message origin] => MessageOriginHiddenUser
 * CLASS 5[User message origin] => MessageOriginUser
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractMessageOrigin, Telegram Bot API, abstract, message, origin, DTO
// STRUCTURE: ▶ ┌type: MessageOriginTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractMessageOrigin [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes the origin of a message.
 *
 * @see https://core.telegram.org/bots/api#messageorigin
 */
#[AvailableInheritors([
    MessageOriginChannel::class,
    MessageOriginChat::class,
    MessageOriginHiddenUser::class,
    MessageOriginUser::class,
])]
abstract class AbstractMessageOrigin implements EntityInterface
{
    public function __construct(
        protected readonly MessageOriginTypeEnum $type,
    ) {}

    public function getType(): MessageOriginTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractMessageOrigin
