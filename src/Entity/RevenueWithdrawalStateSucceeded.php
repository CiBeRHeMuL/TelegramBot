<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * The withdrawal succeeded.
 *
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

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return RevenueWithdrawalStateSucceeded
     */
    public function setDate(int $date): RevenueWithdrawalStateSucceeded
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return RevenueWithdrawalStateSucceeded
     */
    public function setUrl(Url $url): RevenueWithdrawalStateSucceeded
    {
        $this->url = $url;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'date' => $this->date,
            'url' => $this->url->getUrl(),
            'type' => $this->type->value,
        ];
    }
}
