<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use stdClass;

/**
 * Describes a transaction with payment for paid broadcasting.
 *
 * @see https://core.telegram.org/bots/api#paid-broadcasts paid broadcasting
 * @link https://core.telegram.org/bots/api#transactionpartnertelegramapi
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::TelegramApi->value))]
final class TransactionPartnerTelegramApi extends AbstractTransactionPartner
{
    /**
     * @param int $request_count The number of successful requests that exceeded regular limits and were therefore billed
     */
    public function __construct(
        protected int $request_count,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::TelegramApi);
    }

    /**
     * @return int
     */
    public function getRequestCount(): int
    {
        return $this->request_count;
    }

    /**
     * @param int $request_count
     *
     * @return TransactionPartnerTelegramApi
     */
    public function setRequestCount(int $request_count): TransactionPartnerTelegramApi
    {
        $this->request_count = $request_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'request_count' => $this->request_count,
            'type' => $this->type->value,
        ];
    }
}
