<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use stdClass;

/**
 * Describes a transaction with a user.
 * @link https://core.telegram.org/bots/api#transactionpartneruser
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::User->value))]
class TransactionPartnerUser extends AbstractTransactionPartner
{
    /**
     * @param User $user Information about the user
     * @param string|null $invoice_payload Optional. Bot-specified invoice payload
     */
    public function __construct(
        protected User $user,
        protected string|null $invoice_payload = null,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::User);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): TransactionPartnerUser
    {
        $this->user = $user;
        return $this;
    }

    public function getInvoicePayload(): string|null
    {
        return $this->invoice_payload;
    }

    public function setInvoicePayload(string|null $invoice_payload): TransactionPartnerUser
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'user' => $this->user->toArray(),
            'invoice_payload' => $this->invoice_payload,
        ];
    }
}
