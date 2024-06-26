<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Builder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * The withdrawal succeeded.
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Succeeded->value))]
class RevenueWithdrawalStateSucceeded extends AbstractRevenueWithdrawalState
{
    /**
     * @param int $date Date the withdrawal was completed in Unix time
     * @param Url $url An HTTPS URL that can be used to see transaction details
     */
    public function __construct(
        protected int $date,
        protected Url $url,
    ) {
        parent::__construct(RevenueWithdrawalStateTypeEnum::Succeeded);
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): RevenueWithdrawalStateSucceeded
    {
        $this->date = $date;
        return $this;
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

    public function setUrl(Url $url): RevenueWithdrawalStateSucceeded
    {
        $this->url = $url;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'date' => $this->date,
            'url' => $this->url->getUrl(),
        ];
    }
}
