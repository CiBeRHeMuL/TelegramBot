<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorReverseSideTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use stdClass;

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse side
 * of the document changes.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrorreverseside
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::ReverseSide->value))]
class PassportElementErrorReverseSide extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorReverseSideTypeEnum $type The section of the user's Telegram Passport which has the issue, one
     * of “driver_license”, “identity_card”
     * @param string $file_hash Base64-encoded hash of the file with the reverse side of the document
     * @param string $message Error message
     */
    public function __construct(
        protected PassportElementErrorReverseSideTypeEnum $type,
        protected string $file_hash,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::ReverseSide);
    }

    /**
     * @return PassportElementErrorReverseSideTypeEnum
     */
    public function getType(): PassportElementErrorReverseSideTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PassportElementErrorReverseSideTypeEnum $type
     *
     * @return PassportElementErrorReverseSide
     */
    public function setType(PassportElementErrorReverseSideTypeEnum $type): PassportElementErrorReverseSide
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
     * @return PassportElementErrorReverseSide
     */
    public function setFileHash(string $file_hash): PassportElementErrorReverseSide
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
     * @return PassportElementErrorReverseSide
     */
    public function setMessage(string $message): PassportElementErrorReverseSide
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
