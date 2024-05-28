<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorReverseSideTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse side
 * of the document changes.
 * @link https://core.telegram.org/bots/api#passportelementerrorreverseside
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::ReverseSide->value))]
class PassportElementErrorReverseSide extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorReverseSideTypeEnum $type The section of the user's Telegram Passport which has the issue,
     * one of “driver_license”, “identity_card”
     * @param string $file_hash Base64-encoded hash of the file with the reverse side of the document
     * @param string $message Error message
     */
    public function __construct(
        private PassportElementErrorReverseSideTypeEnum $type,
        private string $file_hash,
        private string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::ReverseSide);
    }

    public function getType(): PassportElementErrorReverseSideTypeEnum
    {
        return $this->type;
    }

    public function setType(PassportElementErrorReverseSideTypeEnum $type): PassportElementErrorReverseSide
    {
        $this->type = $type;
        return $this;
    }

    public function getFileHash(): string
    {
        return $this->file_hash;
    }

    public function setFileHash(string $file_hash): PassportElementErrorReverseSide
    {
        $this->file_hash = $file_hash;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorReverseSide
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
