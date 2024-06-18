<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Builder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

/**
 * Describes a transaction with a user.
 * @link https://core.telegram.org/bots/api#transactionpartneruser
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::User->value))]
class TransactionPartnerUser extends AbstractTransactionPartner
{
    /**
     * @param User $user Information about the user
     */
    public function __construct(
        protected User $user,
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


    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'user' => $this->user->toArray(),
        ];
    }
}
