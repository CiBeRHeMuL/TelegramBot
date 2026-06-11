<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a successful revenue withdrawal state.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RevenueWithdrawalStateSucceeded, Telegram, Bot API, DTO, revenuewithdrawalstatesucceeded
// STRUCTURE: ▶ ┌type,date,url┐ → ∑ RevenueWithdrawalStateSucceeded
// region CLASS_RevenueWithdrawalStateSucceeded

/**
 * The withdrawal succeeded.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Succeeded->value))]
final class RevenueWithdrawalStateSucceeded extends AbstractRevenueWithdrawalState
{
    /**
     * @param int $date Date the withdrawal was completed in Unix time
     * @param Url $url  An HTTPS URL that can be used to see transaction details
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
}

// endregion CLASS_RevenueWithdrawalStateSucceeded
