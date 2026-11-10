<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\WidgetQueryTypeTypeEnum;

// region CLASS_WidgetQueryTypeSentTransaction
/**
 * The query notifies the bot about a transaction sent from a TON wallet of the user who sent the query.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#widgetquerytypesenttransaction
 */
#[BuildIf(new FieldIsChecker('type', WidgetQueryTypeTypeEnum::SentTransaction->value))]
final class WidgetQueryTypeSentTransaction extends AbstractWidgetQueryType
{
    /**
     * @param WidgetQueryWallet $wallet   The wallet from which the transaction was sent
     * @param string            $msg_hash Value of msg_hash of the transaction
     *
     * @see https://core.telegram.org/bots/api#widgetquerywallet WidgetQueryWallet
     */
    public function __construct(
        protected WidgetQueryWallet $wallet,
        protected string $msg_hash,
    ) {
        parent::__construct(
            WidgetQueryTypeTypeEnum::SentTransaction,
        );
    }

    /**
     * @return WidgetQueryWallet
     */
    public function getWallet(): WidgetQueryWallet
    {
        return $this->wallet;
    }

    /**
     * @param WidgetQueryWallet $wallet
     *
     * @return WidgetQueryTypeSentTransaction
     */
    public function setWallet(WidgetQueryWallet $wallet): WidgetQueryTypeSentTransaction
    {
        $this->wallet = $wallet;

        return $this;
    }

    /**
     * @return string
     */
    public function getMsgHash(): string
    {
        return $this->msg_hash;
    }

    /**
     * @param string $msg_hash
     *
     * @return WidgetQueryTypeSentTransaction
     */
    public function setMsgHash(string $msg_hash): WidgetQueryTypeSentTransaction
    {
        $this->msg_hash = $msg_hash;

        return $this;
    }
}
// endregion CLASS_WidgetQueryTypeSentTransaction
