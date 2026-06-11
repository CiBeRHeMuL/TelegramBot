<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents a boost added to a chat or changed.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_boost_updated
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatBoostUpdated, Telegram, Bot API, DTO, chat_boost_updated
// STRUCTURE: ▶ ┌chat,boost┐ → ∑ ChatBoostUpdated
// region CLASS_ChatBoostUpdated

/**
 * This object represents a boost added to a chat or changed.
 *
 * @see https://core.telegram.org/bots/api#chatboostupdated
 */
final class ChatBoostUpdated implements EntityInterface
{
    /**
     * @param Chat      $chat  Chat which was boosted
     * @param ChatBoost $boost Information about the chat boost
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#chatboost ChatBoost
     */
    public function __construct(
        protected Chat $chat,
        protected ChatBoost $boost,
    ) {}

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     *
     * @return ChatBoostUpdated
     */
    public function setChat(Chat $chat): ChatBoostUpdated
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return ChatBoost
     */
    public function getBoost(): ChatBoost
    {
        return $this->boost;
    }

    /**
     * @param ChatBoost $boost
     *
     * @return ChatBoostUpdated
     */
    public function setBoost(ChatBoost $boost): ChatBoostUpdated
    {
        $this->boost = $boost;

        return $this;
    }
}
// endregion CLASS_ChatBoostUpdated
