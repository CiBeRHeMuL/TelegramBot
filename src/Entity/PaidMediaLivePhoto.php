<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a paid media live photo.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#paidmedialivephoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PaidMediaLivePhoto, Telegram, Bot API, DTO, paidmedialivephoto
// STRUCTURE: ▶ ┌type,file_id,file_unique_id,video_file_id,video_file_unique_id┐ → ∑ media
// region CLASS_PaidMediaLivePhoto

/**
 * The paid media is a live photo.
 *
 * @see https://core.telegram.org/bots/api#livephoto live photo
 * @see https://core.telegram.org/bots/api#paidmedialivephoto
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

// endregion CLASS_PaidMediaLivePhoto
