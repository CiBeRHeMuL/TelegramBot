<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorFilesTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use stdClass;

/**
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans changes.
 * @link https://core.telegram.org/bots/api#passportelementerrorfiles
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::Files->value))]
class PassportElementErrorFiles extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorFilesTypeEnum $type The section of the user's Telegram Passport which has the issue,
     * one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string[] $file_hashes List of base64-encoded file hashes
     * @param string $message Error message
     */
    public function __construct(
        protected PassportElementErrorFilesTypeEnum $type,
        #[ArrayType('string')] protected array $file_hashes,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::Files);
    }

    public function getType(): PassportElementErrorFilesTypeEnum
    {
        return $this->type;
    }

    public function setType(PassportElementErrorFilesTypeEnum $type): PassportElementErrorFiles
    {
        $this->type = $type;
        return $this;
    }

    public function getFileHashes(): array
    {
        return $this->file_hashes;
    }

    public function setFileHashes(array $file_hashes): PassportElementErrorFiles
    {
        $this->file_hashes = $file_hashes;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorFiles
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'source' => $this->source->value,
            'type' => $this->type->value,
            'file_hash' => $this->file_hashes,
            'message' => $this->message,
        ];
    }
}
