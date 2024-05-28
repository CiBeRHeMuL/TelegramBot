<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorFrontSideTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

/**
 * Represents an issue with the front side of a document. The error is considered resolved when the file with the front side
 * of the document changes.
 * @link https://core.telegram.org/bots/api#passportelementerrorfrontside
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::FrontSide->value))]
class PassportElementErrorFrontSide extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorFrontSideTypeEnum $type The section of the user's Telegram Passport which has the issue, one of
     * “passport”, “driver_license”, “identity_card”, “internal_passport”
     * @param string $file_hash Base64-encoded hash of the file with the front side of the document
     * @param string $message Error message
     */
    public function __construct(
        private PassportElementErrorFrontSideTypeEnum $type,
        private string $file_hash,
        private string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::FrontSide);
    }

    public function getType(): PassportElementErrorFrontSideTypeEnum
    {
        return $this->type;
    }

    public function setType(PassportElementErrorFrontSideTypeEnum $type): PassportElementErrorFrontSide
    {
        $this->type = $type;
        return $this;
    }

    public function getFileHash(): string
    {
        return $this->file_hash;
    }

    public function setFileHash(string $file_hash): PassportElementErrorFrontSide
    {
        $this->file_hash = $file_hash;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorFrontSide
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
