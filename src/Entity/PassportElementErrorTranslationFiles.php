<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorTranslationFilesTypeEnum;

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document translation change.
 * @link https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::TranslationFiles->value))]
class PassportElementErrorTranslationFiles extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorTranslationFilesTypeEnum $type Type of element of the user's Telegram Passport which has the issue,
     * one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”,
     * “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string[] $file_hashes List of base64-encoded file hashes
     * @param string $message Error message
     */
    public function __construct(
        private PassportElementErrorTranslationFilesTypeEnum $type,
        #[ArrayType('string')] private array $file_hashes,
        private string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::TranslationFiles);
    }

    public function getType(): PassportElementErrorTranslationFilesTypeEnum
    {
        return $this->type;
    }

    public function setType(PassportElementErrorTranslationFilesTypeEnum $type): PassportElementErrorTranslationFiles
    {
        $this->type = $type;
        return $this;
    }

    public function getFileHashes(): array
    {
        return $this->file_hashes;
    }

    public function setFileHashes(array $file_hashes): PassportElementErrorTranslationFiles
    {
        $this->file_hashes = $file_hashes;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorTranslationFiles
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'source' => $this->source->value,
            'type' => $this->type->value,
            'file_hash' => $this->file_hashes,
            'message' => $this->message,
        ];
    }
}
