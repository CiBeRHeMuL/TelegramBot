<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents the bot's description.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_description
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotDescription, Telegram, Bot API, DTO, bot_description
// STRUCTURE: ▶ ┌description┐ → ∑ BotDescription
// region CLASS_BotDescription

/**
 * This object represents the bot's description.
 *
 * @see https://core.telegram.org/bots/api#botdescription
 */
final class BotDescription implements EntityInterface
{
    /**
     * @param string $description The bot's description
     */
    public function __construct(
        protected string $description,
    ) {}

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return BotDescription
     */
    public function setDescription(string $description): BotDescription
    {
        $this->description = $description;

        return $this;
    }
}
// endregion CLASS_BotDescription
