<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputProfilePhotoTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * A static profile photo in the .JPG format.
 *
 * @link https://core.telegram.org/bots/api#inputprofilephotostatic
 */
#[BuildIf(new FieldIsChecker('type', InputProfilePhotoTypeEnum::Static->value,))]
class InputProfilePhotoStatic extends AbstractInputProfilePhoto
{
    /**
     * @param Filename|Url $photo The static profile photo. Profile photos can't be reused and can only be uploaded as a new file, so you
     * can pass “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data under <file_attach_name>. More
     * information on Sending Files »
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files
     */
    public function __construct(
        protected Filename|Url $photo,
    ) {
        parent::__construct(InputProfilePhotoTypeEnum::Static);
    }

    public function getPhoto(): Filename|Url
    {
        return $this->photo;
    }

    public function setPhoto(Filename|Url $photo): InputProfilePhotoStatic
    {
        $this->photo = $photo;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'photo' => $this->photo instanceof Url ? $this->photo->getUrl() : $this->photo,
        ];
    }
}
