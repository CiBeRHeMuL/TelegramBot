<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents the bot's short description.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_short_description
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotShortDescription, Telegram, Bot API, DTO, bot_short_description
// STRUCTURE: ▶ ┌short_description┐ → ∑ BotShortDescription
// region CLASS_BotShortDescription

/**
 * This object represents the bot's short description.
 *
 * @see https://core.telegram.org/bots/api#botshortdescription
 */
final class BotShortDescription implements EntityInterface
{
    /**
     * @param string $short_description The bot's short description
     */
    public function __construct(
        protected string $short_description,
    ) {}

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->short_description;
    }

    /**
     * @param string $short_description
     *
     * @return BotShortDescription
     */
    public function setShortDescription(string $short_description): BotShortDescription
    {
        $this->short_description = $short_description;

        return $this;
    }
}
// endregion CLASS_BotShortDescription
