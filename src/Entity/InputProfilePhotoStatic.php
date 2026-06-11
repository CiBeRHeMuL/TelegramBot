<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputProfilePhotoTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a static profile photo to be set.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputprofilephotostatic
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputProfilePhotoStatic, Telegram, Bot API, DTO, inputprofilephotostatic
// STRUCTURE: ▶ ┌photo(InputFile)┐ → ∑ photo
// region CLASS_InputProfilePhotoStatic

/**
 * A static profile photo in the .JPG format.
 *
 * @see https://core.telegram.org/bots/api#inputprofilephotostatic
 */
#[BuildIf(new FieldIsChecker('type', InputProfilePhotoTypeEnum::Static->value))]
final class InputProfilePhotoStatic extends AbstractInputProfilePhoto
{
    /**
     * @param Filename|Url $photo The static profile photo. Profile photos can't be reused and can only be uploaded as a new file,
     *                            so you can pass “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data under <file_attach_name>.
     *                            More information on Sending Files »
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        protected Filename|Url $photo,
    ) {
        parent::__construct(InputProfilePhotoTypeEnum::Static);
    }

    /**
     * @return Filename|Url
     */
    public function getPhoto(): Filename|Url
    {
        return $this->photo;
    }

    /**
     * @param Filename|Url $photo
     *
     * @return InputProfilePhotoStatic
     */
    public function setPhoto(Filename|Url $photo): InputProfilePhotoStatic
    {
        $this->photo = $photo;

        return $this;
    }
}

// endregion CLASS_InputProfilePhotoStatic
