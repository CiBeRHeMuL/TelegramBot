<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

/**
 * This object represents an error in the Telegram Passport element which was submitted that should be resolved by the user.
 * @link https://core.telegram.org/bots/api#passportelementerror
 */
#[AvailableInheritors([
    PassportElementErrorDataField::class,
    PassportElementErrorFrontSide::class,
    PassportElementErrorReverseSide::class,
    PassportElementErrorSelfie::class,
    PassportElementErrorFile::class,
    PassportElementErrorFiles::class,
    PassportElementErrorTranslationFile::class,
    PassportElementErrorTranslationFiles::class,
    PassportElementErrorUnspecified::class,
])]
abstract class AbstractPassportElementError implements EntityInterface
{
    public function __construct(
        protected readonly PassportElementErrorSourceEnum $source,
    ) {
    }

    public function getSource(): PassportElementErrorSourceEnum
    {
        return $this->source;
    }
}
