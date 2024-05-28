<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorDataFieldTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's
 * value changes.
 * @link https://core.telegram.org/bots/api#passportelementerrordatafield
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::Data->value))]
class PassportElementErrorDataField extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorDataFieldTypeEnum $type The section of the user's Telegram Passport which has the error,
     * one of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
     * @param string $field_name Name of the data field which has the error
     * @param string $data_hash Base64-encoded data hash
     * @param string $message Error message
     */
    public function __construct(
        private PassportElementErrorDataFieldTypeEnum $type,
        private string $field_name,
        private string $data_hash,
        private string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::Data);
    }

    public function getType(): PassportElementErrorDataFieldTypeEnum
    {
        return $this->type;
    }

    public function setType(PassportElementErrorDataFieldTypeEnum $type): PassportElementErrorDataField
    {
        $this->type = $type;
        return $this;
    }

    public function getFieldName(): string
    {
        return $this->field_name;
    }

    public function setFieldName(string $field_name): PassportElementErrorDataField
    {
        $this->field_name = $field_name;
        return $this;
    }

    public function getDataHash(): string
    {
        return $this->data_hash;
    }

    public function setDataHash(string $data_hash): PassportElementErrorDataField
    {
        $this->data_hash = $data_hash;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorDataField
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'source' => $this->source->value,
            'type' => $this->type->value,
            'field_name' => $this->field_name,
            'data_hash' => $this->data_hash,
            'message' => $this->message,
        ];
    }
}
