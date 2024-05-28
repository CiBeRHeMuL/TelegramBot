<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorFileTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 * @link https://core.telegram.org/bots/api#passportelementerrorfile
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::File->value))]
class PassportElementErrorFile extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorFileTypeEnum $type The section of the user's Telegram Passport which has the issue,
     * one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string $file_hash Base64-encoded file hash
     * @param string $message Error message
     */
    public function __construct(
        private PassportElementErrorFileTypeEnum $type,
        private string $file_hash,
        private string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::File);
    }

    public function getType(): PassportElementErrorFileTypeEnum
    {
        return $this->type;
    }

    public function setType(PassportElementErrorFileTypeEnum $type): PassportElementErrorFile
    {
        $this->type = $type;
        return $this;
    }

    public function getFileHash(): string
    {
        return $this->file_hash;
    }

    public function setFileHash(string $file_hash): PassportElementErrorFile
    {
        $this->file_hash = $file_hash;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorFile
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
