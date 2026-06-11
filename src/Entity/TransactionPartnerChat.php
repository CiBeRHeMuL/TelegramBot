<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a transaction partner that is a chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#transactionpartnerchat
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TransactionPartnerChat, Telegram, Bot API, DTO, transactionpartnerchat
// STRUCTURE: ▶ ┌type,chat,gift...┐ → ∑ partner
// region CLASS_TransactionPartnerChat

/**
 * Describes a transaction with a chat.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerchat
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::Chat->value))]
final class TransactionPartnerChat extends AbstractTransactionPartner
{
    /**
     * @param Chat      $chat Information about the chat
     * @param Gift|null $gift Optional. The gift sent to the chat by the bot
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#gift Gift
     */
    public function __construct(
        protected Chat $chat,
        protected ?Gift $gift = null,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::Chat);
    }

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
     * @return TransactionPartnerChat
     */
    public function setChat(Chat $chat): TransactionPartnerChat
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return Gift|null
     */
    public function getGift(): ?Gift
    {
        return $this->gift;
    }

    /**
     * @param Gift|null $gift
     *
     * @return TransactionPartnerChat
     */
    public function setGift(?Gift $gift): TransactionPartnerChat
    {
        $this->gift = $gift;

        return $this;
    }
}

// endregion CLASS_TransactionPartnerChat
