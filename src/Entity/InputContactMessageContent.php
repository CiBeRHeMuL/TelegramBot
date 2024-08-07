<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\ValueObject\Phone;
use stdClass;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 * @link https://core.telegram.org/bots/api#inputcontactmessagecontent
 */
#[BuildIf(new AndChecker([
    new FieldCompareChecker('phone_number', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('first_name', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InputContactMessageContent extends AbstractInputMessageContent
{
    /**
     * @param Phone $phone_number Contact's phone number
     * @param string $first_name Contact's first name
     * @param string|null $last_name Optional. Contact's last name
     * @param string|null $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
     */
    public function __construct(
        protected Phone $phone_number,
        protected string $first_name,
        protected string|null $last_name = null,
        protected string|null $vcard = null,
    ) {
        parent::__construct();
    }

    public function getPhoneNumber(): Phone
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(Phone $phone_number): InputContactMessageContent
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): InputContactMessageContent
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    public function setLastName(string|null $last_name): InputContactMessageContent
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getVcard(): string|null
    {
        return $this->vcard;
    }

    public function setVcard(string|null $vcard): InputContactMessageContent
    {
        $this->vcard = $vcard;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'phone_number' => $this->phone_number->getPhone(),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'vcard' => $this->vcard,
        ];
    }
}
