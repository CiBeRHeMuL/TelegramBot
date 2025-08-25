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
 *
 * @link https://core.telegram.org/bots/api#passportelementerrorfiles
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::Files->value))]
class PassportElementErrorFiles extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorFilesTypeEnum $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”,
     * “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string[] $file_hashes List of base64-encoded file hashes
     * @param string $message Error message
     */
    public function __construct(
        protected PassportElementErrorFilesTypeEnum $type,
        #[ArrayType('string')]
        protected array $file_hashes,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::Files);
    }

    /**
     * @return PassportElementErrorFilesTypeEnum
     */
    public function getType(): PassportElementErrorFilesTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PassportElementErrorFilesTypeEnum $type
     *
     * @return PassportElementErrorFiles
     */
    public function setType(PassportElementErrorFilesTypeEnum $type): PassportElementErrorFiles
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
     * @return PassportElementErrorFiles
     */
    public function setFileHashes(array $file_hashes): PassportElementErrorFiles
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
     * @return PassportElementErrorFiles
     */
    public function setMessage(string $message): PassportElementErrorFiles
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'file_hashes' => $this->file_hashes,
            'message' => $this->message,
            'source' => $this->source->value,
        ];
    }
}
