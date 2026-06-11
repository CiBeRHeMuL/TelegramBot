<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes a message that can be inaccessible to the bot.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#maybeinaccessiblemessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Accessible message] => Message
 * CLASS 5[Inaccessible message] => InaccessibleMessage
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractMaybeInaccessibleMessage, Telegram Bot API, abstract, message, inaccessible, DTO
// STRUCTURE: ▶ ┌date┐ → abstract base with AvailableInheritors

// region CLASS_AbstractMaybeInaccessibleMessage [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes a message that can be inaccessible to the bot.
 *
 * @see https://core.telegram.org/bots/api#maybeinaccessiblemessage
 */
#[AvailableInheritors([
    Message::class,
    InaccessibleMessage::class,
])]
abstract class AbstractMaybeInaccessibleMessage implements EntityInterface
{
    public function __construct(
        protected int $date,
    ) {}

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): AbstractMaybeInaccessibleMessage
    {
        $this->date = $date;

        return $this;
    }
}
// endregion CLASS_AbstractMaybeInaccessibleMessage
