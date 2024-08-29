<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
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
     * @param AbstractPaidMedia[]|null $paid_media Optional. Information about the paid media bought by the user
     */
    public function __construct(
        protected User $user,
        protected string|null $invoice_payload = null,
        #[ArrayType(AbstractPaidMedia::class)] protected array|null $paid_media = null,
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

    public function getPaidMedia(): array|null
    {
        return $this->paid_media;
    }

    public function setPaidMedia(array|null $paid_media): TransactionPartnerUser
    {
        $this->paid_media = $paid_media;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'user' => $this->user->toArray(),
            'invoice_payload' => $this->invoice_payload,
            'paid_media' => $this->paid_media !== null
                ? array_map(fn(AbstractPaidMedia $e) => $e->toArray(), $this->paid_media)
                : null,
        ];
    }
}
