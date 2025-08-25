<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use stdClass;

/**
 * Describes a transaction with a chat.
 *
 * @link https://core.telegram.org/bots/api#transactionpartnerchat
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::Chat->value))]
class TransactionPartnerChat extends AbstractTransactionPartner
{
    /**
     * @param Chat $chat Information about the chat
     * @param Gift|null $gift Optional. The gift sent to the chat by the bot
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#gift Gift
     */
    public function __construct(
        protected Chat $chat,
        protected Gift|null $gift = null,
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
    public function getGift(): Gift|null
    {
        return $this->gift;
    }

    /**
     * @param Gift|null $gift
     *
     * @return TransactionPartnerChat
     */
    public function setGift(Gift|null $gift): TransactionPartnerChat
    {
        $this->gift = $gift;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'gift' => $this->gift?->toArray(),
            'type' => $this->type->value,
        ];
    }
}
