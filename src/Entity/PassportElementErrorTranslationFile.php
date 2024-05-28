<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorTranslationFileTypeEnum;
use stdClass;

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 * @link https://core.telegram.org/bots/api#passportelementerrortranslationfile
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::TranslationFile->value))]
class PassportElementErrorTranslationFile extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorTranslationFileTypeEnum $type Type of element of the user's Telegram Passport which has the issue,
     * one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”,
     * “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string $file_hash Base64-encoded file hash
     * @param string $message Error message
     */
    public function __construct(
        protected PassportElementErrorTranslationFileTypeEnum $type,
        protected string $file_hash,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::TranslationFile);
    }

    public function getType(): PassportElementErrorTranslationFileTypeEnum
    {
        return $this->type;
    }

    public function setType(PassportElementErrorTranslationFileTypeEnum $type): PassportElementErrorTranslationFile
    {
        $this->type = $type;
        return $this;
    }

    public function getFileHash(): string
    {
        return $this->file_hash;
    }

    public function setFileHash(string $file_hash): PassportElementErrorTranslationFile
    {
        $this->file_hash = $file_hash;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorTranslationFile
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'source' => $this->source->value,
            'type' => $this->type->value,
            'file_hash' => $this->file_hash,
            'message' => $this->message,
        ];
    }
}
