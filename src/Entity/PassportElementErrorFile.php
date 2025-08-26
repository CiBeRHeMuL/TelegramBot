<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorFileTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use stdClass;

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrorfile
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::File->value))]
final class PassportElementErrorFile extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorFileTypeEnum $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”,
     * “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string $file_hash Base64-encoded file hash
     * @param string $message Error message
     */
    public function __construct(
        protected PassportElementErrorFileTypeEnum $type,
        protected string $file_hash,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::File);
    }

    /**
     * @return PassportElementErrorFileTypeEnum
     */
    public function getType(): PassportElementErrorFileTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PassportElementErrorFileTypeEnum $type
     *
     * @return PassportElementErrorFile
     */
    public function setType(PassportElementErrorFileTypeEnum $type): PassportElementErrorFile
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
     * @return PassportElementErrorFile
     */
    public function setFileHash(string $file_hash): PassportElementErrorFile
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
     * @return PassportElementErrorFile
     */
    public function setMessage(string $message): PassportElementErrorFile
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
