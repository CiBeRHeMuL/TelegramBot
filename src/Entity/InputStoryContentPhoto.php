<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputStoryContentTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Describes a photo to post as a story.
 *
 * @link https://core.telegram.org/bots/api#inputstorycontentphoto
 */
#[BuildIf(new FieldIsChecker('type', InputStoryContentTypeEnum::Photo->value))]
class InputStoryContentPhoto extends AbstractInputStoryContent
{
    /**
     * @param Filename|Url $photo The photo to post as a story. The photo must be of the size 1080x1920 and must not exceed 10 MB. The
     * photo can't be reused and can only be uploaded as a new file, so you can pass “attach://<file_attach_name>” if the photo
     * was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files
     */
    public function __construct(
        protected Filename|Url $photo,
    ) {
        parent::__construct(InputStoryContentTypeEnum::Photo);
    }

    public function getPhoto(): Filename|Url
    {
        return $this->photo;
    }

    public function setPhoto(Filename|Url $photo): InputStoryContentPhoto
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
