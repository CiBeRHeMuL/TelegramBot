<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents the bot's name.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_name
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotName, Telegram, Bot API, DTO, bot_name
// STRUCTURE: ▶ ┌name┐ → ∑ BotName
// region CLASS_BotName

/**
 * This object represents the bot's name.
 *
 * @see https://core.telegram.org/bots/api#botname
 */
final class BotName implements EntityInterface
{
    /**
     * @param string $name The bot's name
     */
    public function __construct(
        protected string $name,
    ) {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return BotName
     */
    public function setName(string $name): BotName
    {
        $this->name = $name;

        return $this;
    }
}
// endregion CLASS_BotName
