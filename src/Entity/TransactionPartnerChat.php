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

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): TransactionPartnerChat
    {
        $this->chat = $chat;
        return $this;
    }

    public function getGift(): Gift|null
    {
        return $this->gift;
    }

    public function setGift(Gift|null $gift): TransactionPartnerChat
    {
        $this->gift = $gift;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'chat' => $this->chat->toArray(),
            'gift' => $this->gift?->toArray(),
        ];
    }
}
