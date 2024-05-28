<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;
use stdClass;

/**
 * The paid media is a video.
 * @link https://core.telegram.org/bots/api#paidmediavideo
 */
#[BuildIf(new FieldIsChecker('type', PaidMediaTypeEnum::Video->value))]
class PaidMediaVideo extends AbstractPaidMedia
{
    /**
     * @param Video $video The video
     */
    public function __construct(
        protected Video $video,
    ) {
        parent::__construct(PaidMediaTypeEnum::Video);
    }

    public function getVideo(): Video
    {
        return $this->video;
    }

    public function setVideo(Video $video): PaidMediaVideo
    {
        $this->video = $video;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'video' => $this->video->toArray(),
        ];
    }
}
