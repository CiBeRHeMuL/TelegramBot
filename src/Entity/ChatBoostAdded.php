<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents a service message about a user boosting a chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_boost_added
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatBoostAdded, Telegram, Bot API, DTO, chat_boost_added
// STRUCTURE: ▶ ┌boost_count┐ → ∑ ChatBoostAdded
// region CLASS_ChatBoostAdded

/**
 * This object represents a service message about a user boosting a chat.
 *
 * @see https://core.telegram.org/bots/api#chatboostadded
 */
final class ChatBoostAdded implements EntityInterface
{
    /**
     * @param int $boost_count Number of boosts added by the user
     */
    public function __construct(
        protected int $boost_count,
    ) {}

    /**
     * @return int
     */
    public function getBoostCount(): int
    {
        return $this->boost_count;
    }

    /**
     * @param int $boost_count
     *
     * @return ChatBoostAdded
     */
    public function setBoostCount(int $boost_count): ChatBoostAdded
    {
        $this->boost_count = $boost_count;

        return $this;
    }
}
// endregion CLASS_ChatBoostAdded
