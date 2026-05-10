<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;

/**
 * The paid media is a live photo.
 *
 * @see https://core.telegram.org/bots/api#livephoto live photo
 * @link https://core.telegram.org/bots/api#paidmedialivephoto
 */
#[BuildIf(new FieldIsChecker('type', PaidMediaTypeEnum::LivePhoto->value))]
final class PaidMediaLivePhoto extends AbstractPaidMedia
{
    /**
     * @param LivePhoto $live_photo The photo
     *
     * @see https://core.telegram.org/bots/api#livephoto LivePhoto
     */
    public function __construct(
        protected LivePhoto $live_photo,
    ) {
        parent::__construct(
            PaidMediaTypeEnum::LivePhoto,
        );
    }

    /**
     * @return LivePhoto
     */
    public function getLivePhoto(): LivePhoto
    {
        return $this->live_photo;
    }

    /**
     * @param LivePhoto $live_photo
     *
     * @return PaidMediaLivePhoto
     */
    public function setLivePhoto(LivePhoto $live_photo): PaidMediaLivePhoto
    {
        $this->live_photo = $live_photo;
        return $this;
    }
}
