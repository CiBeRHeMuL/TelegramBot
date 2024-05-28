<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSelfieTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

/**
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie changes.
 * @link https://core.telegram.org/bots/api#passportelementerrorselfie
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::Selfie->value))]
class PassportElementErrorSelfie extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorSelfieTypeEnum $type The section of the user's Telegram Passport which has the issue,
     * one of “passport”, “driver_license”, “identity_card”, “internal_passport”
     * @param string $file_hash Base64-encoded hash of the file with the selfie
     * @param string $message Error message
     */
    public function __construct(
        private PassportElementErrorSelfieTypeEnum $type,
        private string $file_hash,
        private string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::Selfie);
    }

    public function getType(): PassportElementErrorSelfieTypeEnum
    {
        return $this->type;
    }

    public function setType(PassportElementErrorSelfieTypeEnum $type): PassportElementErrorSelfie
    {
        $this->type = $type;
        return $this;
    }

    public function getFileHash(): string
    {
        return $this->file_hash;
    }

    public function setFileHash(string $file_hash): PassportElementErrorSelfie
    {
        $this->file_hash = $file_hash;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorSelfie
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'source' => $this->source->value,
            'type' => $this->type->value,
            'file_hash' => $this->file_hash,
            'message' => $this->message,
        ];
    }
}
