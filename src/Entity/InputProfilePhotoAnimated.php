<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputProfilePhotoTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * An animated profile photo in the MPEG4 format.
 *
 * @link https://core.telegram.org/bots/api#inputprofilephotoanimated
 */
#[BuildIf(new FieldIsChecker('type', InputProfilePhotoTypeEnum::Animated->value,))]
class InputProfilePhotoAnimated extends AbstractInputProfilePhoto
{
    /**
     * @param Filename|Url $animation The animated profile photo. Profile photos can't be reused and can only be uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data under <file_attach_name>.
     * More information on Sending Files »
     * @param float|null $main_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static profile
     * photo. Defaults to 0.0.
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        protected Filename|Url $animation,
        protected float|null $main_frame_timestamp = null,
    ) {
        parent::__construct(InputProfilePhotoTypeEnum::Animated);
    }

    public function getAnimation(): Filename|Url
    {
        return $this->animation;
    }

    public function setAnimation(Filename|Url $animation): InputProfilePhotoAnimated
    {
        $this->animation = $animation;
        return $this;
    }

    public function getMainFrameTimestamp(): float|null
    {
        return $this->main_frame_timestamp;
    }

    public function setMainFrameTimestamp(float|null $main_frame_timestamp): InputProfilePhotoAnimated
    {
        $this->main_frame_timestamp = $main_frame_timestamp;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'animation' => $this->animation instanceof Url ? $this->animation->getUrl() : $this->animation,
            'main_frame_timestamp' => $this->main_frame_timestamp,
        ];
    }
}
