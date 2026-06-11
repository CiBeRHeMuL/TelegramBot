<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\PassportElementErrorSourceEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents an error in the Telegram Passport element which was submitted that should be resolved by the user.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#passportelementerror
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Passport element error types] => PassportElementErrorDataField, PassportElementErrorFrontSide, PassportElementErrorReverseSide, PassportElementErrorSelfie, PassportElementErrorFile, PassportElementErrorFiles, PassportElementErrorTranslationFile, PassportElementErrorTranslationFiles, PassportElementErrorUnspecified
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractPassportElementError, Telegram Bot API, abstract, passport, element, error, DTO
// STRUCTURE: ▶ ┌source: PassportElementErrorSourceEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractPassportElementError [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object represents an error in the Telegram Passport element which was submitted that should be resolved by the user.
 *
 * @see https://core.telegram.org/bots/api#passportelementerror
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
    ) {}

    public function getSource(): PassportElementErrorSourceEnum
    {
        return $this->source;
    }
}
// endregion CLASS_AbstractPassportElementError
