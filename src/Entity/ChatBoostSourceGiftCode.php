<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatBoostSourceEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_boost_source_gift_code
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatBoostSourceGiftCode, Telegram, Bot API, DTO, chat_boost_source_gift_code
// STRUCTURE: ▶ ┌user┐ → ∑ ChatBoostSourceGiftCode
// region CLASS_ChatBoostSourceGiftCode

/**
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the chat 4 times
 * for the duration of the corresponding Telegram Premium subscription.
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiftcode
 */
#[BuildIf(new FieldIsChecker('source', ChatBoostSourceEnum::GiftCode->value))]
final class ChatBoostSourceGiftCode extends AbstractChatBoostSource
{
    /**
     * @param User $user User for which the gift code was created
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
    ) {
        parent::__construct(ChatBoostSourceEnum::GiftCode);
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
     * @return ChatBoostSourceGiftCode
     */
    public function setUser(User $user): ChatBoostSourceGiftCode
    {
        $this->user = $user;

        return $this;
    }
}
// endregion CLASS_ChatBoostSourceGiftCode
