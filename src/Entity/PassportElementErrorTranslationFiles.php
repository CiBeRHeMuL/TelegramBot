<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorTranslationFilesTypeEnum;

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document
 * translation change.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::TranslationFiles->value))]
final class PassportElementErrorTranslationFiles extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorTranslationFilesTypeEnum $type Type of element of the user's Telegram Passport which has the issue,
     * one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”,
     * “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string[] $file_hashes List of base64-encoded file hashes
     * @param string $message Error message
     */
    public function __construct(
        protected PassportElementErrorTranslationFilesTypeEnum $type,
        #[ArrayType('string')]
        protected array $file_hashes,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::TranslationFiles);
    }

    /**
     * @return PassportElementErrorTranslationFilesTypeEnum
     */
    public function getType(): PassportElementErrorTranslationFilesTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PassportElementErrorTranslationFilesTypeEnum $type
     *
     * @return PassportElementErrorTranslationFiles
     */
    public function setType(PassportElementErrorTranslationFilesTypeEnum $type): PassportElementErrorTranslationFiles
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getFileHashes(): array
    {
        return $this->file_hashes;
    }

    /**
     * @param string[] $file_hashes
     *
     * @return PassportElementErrorTranslationFiles
     */
    public function setFileHashes(array $file_hashes): PassportElementErrorTranslationFiles
    {
        $this->file_hashes = $file_hashes;
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
     * @return PassportElementErrorTranslationFiles
     */
    public function setMessage(string $message): PassportElementErrorTranslationFiles
    {
        $this->message = $message;
        return $this;
    }
}
