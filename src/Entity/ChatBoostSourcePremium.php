<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatBoostSourceEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_boost_source_premium
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatBoostSourcePremium, Telegram, Bot API, DTO, chat_boost_source_premium
// STRUCTURE: ▶ ┌user┐ → ∑ ChatBoostSourcePremium
// region CLASS_ChatBoostSourcePremium

/**
 * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcepremium
 */
#[BuildIf(new FieldIsChecker('source', ChatBoostSourceEnum::Premium->value))]
final class ChatBoostSourcePremium extends AbstractChatBoostSource
{
    /**
     * @param User $user User that boosted the chat
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
    ) {
        parent::__construct(ChatBoostSourceEnum::Premium);
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return ChatBoostSourcePremium
     */
    public function setUser(User $user): ChatBoostSourcePremium
    {
        $this->user = $user;

        return $this;
    }
}
// endregion CLASS_ChatBoostSourcePremium
