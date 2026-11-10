<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\WidgetQueryTypeTypeEnum;

// region CLASS_WidgetQueryTypeSignData
/**
 * The query contains data signed by a TON wallet of the user who sent the query. The data is signed for the domain bot<bot_id>,
 * where <bot_id> is the identifier of the bot.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#widgetquerytypesigndata
 */
#[BuildIf(new FieldIsChecker('type', WidgetQueryTypeTypeEnum::SignData->value))]
final class WidgetQueryTypeSignData extends AbstractWidgetQueryType
{
    /**
     * @param WidgetQueryWallet $wallet    The wallet that signed the data
     * @param string            $sign_data JSON-serialized signed data
     *
     * @see https://core.telegram.org/bots/api#widgetquerywallet WidgetQueryWallet
     */
    public function __construct(
        protected WidgetQueryWallet $wallet,
        protected string $sign_data,
    ) {
        parent::__construct(
            WidgetQueryTypeTypeEnum::SignData,
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
     * @return WidgetQueryTypeSignData
     */
    public function setWallet(WidgetQueryWallet $wallet): WidgetQueryTypeSignData
    {
        $this->wallet = $wallet;

        return $this;
    }

    /**
     * @return string
     */
    public function getSignData(): string
    {
        return $this->sign_data;
    }

    /**
     * @param string $sign_data
     *
     * @return WidgetQueryTypeSignData
     */
    public function setSignData(string $sign_data): WidgetQueryTypeSignData
    {
        $this->sign_data = $sign_data;

        return $this;
    }
}
// endregion CLASS_WidgetQueryTypeSignData
