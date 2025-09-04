<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\EncryptedPassportElementTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrorunspecified
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::Unspecified->value))]
final class PassportElementErrorUnspecified extends AbstractPassportElementError
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

    /**
     * @return EncryptedPassportElementTypeEnum
     */
    public function getType(): EncryptedPassportElementTypeEnum
    {
        return $this->type;
    }

    /**
     * @param EncryptedPassportElementTypeEnum $type
     *
     * @return PassportElementErrorUnspecified
     */
    public function setType(EncryptedPassportElementTypeEnum $type): PassportElementErrorUnspecified
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getElementHash(): string
    {
        return $this->element_hash;
    }

    /**
     * @param string $element_hash
     *
     * @return PassportElementErrorUnspecified
     */
    public function setElementHash(string $element_hash): PassportElementErrorUnspecified
    {
        $this->element_hash = $element_hash;
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
     * @return PassportElementErrorUnspecified
     */
    public function setMessage(string $message): PassportElementErrorUnspecified
    {
        $this->message = $message;
        return $this;
    }
}
