<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a paid media video.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#paidmediavideo
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PaidMediaVideo, Telegram, Bot API, DTO, paidmediavideo
// STRUCTURE: ▶ ┌type,file_id,file_unique_id,video_width,video_height,duration┐ → ∑ media
// region CLASS_PaidMediaVideo

/**
 * The paid media is a video.
 *
 * @see https://core.telegram.org/bots/api#paidmediavideo
 */
#[BuildIf(new FieldIsChecker('type', PaidMediaTypeEnum::Video->value))]
final class PaidMediaVideo extends AbstractPaidMedia
{
    /**
     * @param Video $video The video
     *
     * @see https://core.telegram.org/bots/api#video Video
     */
    public function __construct(
        protected Video $video,
    ) {
        parent::__construct(PaidMediaTypeEnum::Video);
    }

    /**
     * @return Video
     */
    public function getVideo(): Video
    {
        return $this->video;
    }

    /**
     * @param Video $video
     *
     * @return PaidMediaVideo
     */
    public function setVideo(Video $video): PaidMediaVideo
    {
        $this->video = $video;

        return $this;
    }
}

// endregion CLASS_PaidMediaVideo
