<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorDataFieldTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's
 * value changes.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrordatafield
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::Data->value))]
final class PassportElementErrorDataField extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorDataFieldTypeEnum $type The section of the user's Telegram Passport which has the error, one of
     * “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
     * @param string $field_name Name of the data field which has the error
     * @param string $data_hash Base64-encoded data hash
     * @param string $message Error message
     */
    public function __construct(
        protected PassportElementErrorDataFieldTypeEnum $type,
        protected string $field_name,
        protected string $data_hash,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::Data);
    }

    /**
     * @return PassportElementErrorDataFieldTypeEnum
     */
    public function getType(): PassportElementErrorDataFieldTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PassportElementErrorDataFieldTypeEnum $type
     *
     * @return PassportElementErrorDataField
     */
    public function setType(PassportElementErrorDataFieldTypeEnum $type): PassportElementErrorDataField
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->field_name;
    }

    /**
     * @param string $field_name
     *
     * @return PassportElementErrorDataField
     */
    public function setFieldName(string $field_name): PassportElementErrorDataField
    {
        $this->field_name = $field_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataHash(): string
    {
        return $this->data_hash;
    }

    /**
     * @param string $data_hash
     *
     * @return PassportElementErrorDataField
     */
    public function setDataHash(string $data_hash): PassportElementErrorDataField
    {
        $this->data_hash = $data_hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return PassportElementErrorDataField
     */
    public function setMessage(string $message): PassportElementErrorDataField
    {
        $this->message = $message;
        return $this;
    }
}
