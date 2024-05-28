<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\EncryptedPassportElementTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;
use stdClass;

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 * @link https://core.telegram.org/bots/api#passportelementerrorfile
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::Unspecified->value))]
class PassportElementErrorUnspecified extends AbstractPassportElementError
{
    /**
     * @param EncryptedPassportElementTypeEnum $type Type of element of the user's Telegram Passport which has the issue
     * @param string $element_hash Base64-encoded element hash
     * @param string $message Error message
     */
    public function __construct(
        protected EncryptedPassportElementTypeEnum $type,
        protected string $element_hash,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::Unspecified);
    }

    public function getType(): EncryptedPassportElementTypeEnum
    {
        return $this->type;
    }

    public function setType(EncryptedPassportElementTypeEnum $type): PassportElementErrorUnspecified
    {
        $this->type = $type;
        return $this;
    }

    public function getElementHash(): string
    {
        return $this->element_hash;
    }

    public function setElementHash(string $element_hash): PassportElementErrorUnspecified
    {
        $this->element_hash = $element_hash;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): PassportElementErrorUnspecified
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'source' => $this->source->value,
            'type' => $this->type->value,
            'file_hash' => $this->element_hash,
            'message' => $this->message,
        ];
    }
}
