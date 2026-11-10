<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\WidgetQueryTypeTypeEnum;

// region CLASS_WidgetQueryTypeData
/**
 * The query contains data for the bot.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#widgetquerytypedata
 */
#[BuildIf(new FieldIsChecker('type', WidgetQueryTypeTypeEnum::Data->value))]
final class WidgetQueryTypeData extends AbstractWidgetQueryType
{
    /**
     * @param TonWalletCard|null $wallet_card Optional. TON wallet card of the user who sent the query, if it was sent to the bot
     *                                        along with the query
     *
     * @see https://core.telegram.org/bots/api#tonwalletcard TonWalletCard
     */
    public function __construct(
        protected ?TonWalletCard $wallet_card = null,
    ) {
        parent::__construct(
            WidgetQueryTypeTypeEnum::Data,
        );
    }

    /**
     * @return TonWalletCard|null
     */
    public function getWalletCard(): ?TonWalletCard
    {
        return $this->wallet_card;
    }

    /**
     * @param TonWalletCard|null $wallet_card
     *
     * @return WidgetQueryTypeData
     */
    public function setWalletCard(?TonWalletCard $wallet_card): WidgetQueryTypeData
    {
        $this->wallet_card = $wallet_card;

        return $this;
    }
}
// endregion CLASS_WidgetQueryTypeData
