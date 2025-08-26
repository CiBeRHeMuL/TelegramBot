<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorTranslationFileTypeEnum;
use stdClass;

/**
 * Represents an issue with one of the files that constitute the translation of a document. The error is considered resolved
 * when the file changes.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrortranslationfile
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::TranslationFile->value))]
final class PassportElementErrorTranslationFile extends AbstractPassportElementError
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

    /**
     * @return PassportElementErrorTranslationFileTypeEnum
     */
    public function getType(): PassportElementErrorTranslationFileTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PassportElementErrorTranslationFileTypeEnum $type
     *
     * @return PassportElementErrorTranslationFile
     */
    public function setType(PassportElementErrorTranslationFileTypeEnum $type): PassportElementErrorTranslationFile
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileHash(): string
    {
        return $this->file_hash;
    }

    /**
     * @param string $file_hash
     *
     * @return PassportElementErrorTranslationFile
     */
    public function setFileHash(string $file_hash): PassportElementErrorTranslationFile
    {
        $this->file_hash = $file_hash;
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
     * @return PassportElementErrorTranslationFile
     */
    public function setMessage(string $message): PassportElementErrorTranslationFile
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'file_hash' => $this->file_hash,
            'message' => $this->message,
            'source' => $this->source->value,
        ];
    }
}
