<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSelfieTypeEnum;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents an error in the selfie of a Telegram Passport document.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#passportelementerrorselfie
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PassportElementErrorSelfie, Telegram, Bot API, DTO, passportelementerrorselfie
// STRUCTURE: ▶ ┌type,file_hash,message┐ → ∑ error
// region CLASS_PassportElementErrorSelfie

/**
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorselfie
 */
#[BuildIf(new FieldIsChecker('source', PassportElementErrorSourceEnum::Selfie->value))]
final class PassportElementErrorSelfie extends AbstractPassportElementError
{
    /**
     * @param PassportElementErrorSelfieTypeEnum $type      The section of the user's Telegram Passport which has the issue, one of “passport”,
     *                                                      “driver_license”, “identity_card”, “internal_passport”
     * @param string                             $file_hash Base64-encoded hash of the file with the selfie
     * @param string                             $message   Error message
     */
    public function __construct(
        protected PassportElementErrorSelfieTypeEnum $type,
        protected string $file_hash,
        protected string $message,
    ) {
        parent::__construct(PassportElementErrorSourceEnum::Selfie);
    }

    /**
     * @return PassportElementErrorSelfieTypeEnum
     */
    public function getType(): PassportElementErrorSelfieTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PassportElementErrorSelfieTypeEnum $type
     *
     * @return PassportElementErrorSelfie
     */
    public function setType(PassportElementErrorSelfieTypeEnum $type): PassportElementErrorSelfie
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
     * @return PassportElementErrorSelfie
     */
    public function setFileHash(string $file_hash): PassportElementErrorSelfie
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
     * @return PassportElementErrorSelfie
     */
    public function setMessage(string $message): PassportElementErrorSelfie
    {
        $this->message = $message;

        return $this;
    }
}

// endregion CLASS_PassportElementErrorSelfie
