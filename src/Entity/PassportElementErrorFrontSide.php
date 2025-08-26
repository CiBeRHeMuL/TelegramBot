<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorFrontSideTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use stdClass;

/**
 * Represents an issue with the front side of a document. The error is considered resolved when the file with the front side
 * of the document changes.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrorfrontside
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::FrontSide->value))]
final class PassportElementErrorFrontSide extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorFrontSideTypeEnum $type The section of the user's Telegram Passport which has the issue, one of
     * “passport”, “driver_license”, “identity_card”, “internal_passport”
     * @param string $file_hash Base64-encoded hash of the file with the front side of the document
     * @param string $message Error message
     */
    public function __construct(
        protected PassportElementErrorFrontSideTypeEnum $type,
        protected string $file_hash,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::FrontSide);
    }

    /**
     * @return PassportElementErrorFrontSideTypeEnum
     */
    public function getType(): PassportElementErrorFrontSideTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PassportElementErrorFrontSideTypeEnum $type
     *
     * @return PassportElementErrorFrontSide
     */
    public function setType(PassportElementErrorFrontSideTypeEnum $type): PassportElementErrorFrontSide
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
     * @return PassportElementErrorFrontSide
     */
    public function setFileHash(string $file_hash): PassportElementErrorFrontSide
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
     * @return PassportElementErrorFrontSide
     */
    public function setMessage(string $message): PassportElementErrorFrontSide
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
