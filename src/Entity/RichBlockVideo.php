<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block with a video, corresponding to the HTML tag <video>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockvideo
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockVideo, Telegram, Bot API, DTO, Rich Block Video
// STRUCTURE: ▶ ┌type,video,has_spoiler,caption┐ → ∑ RichBlockVideo
// region CLASS_RichBlockVideo
/**
 * A block with a video, corresponding to the HTML tag <video>.
 *
 * @see https://core.telegram.org/bots/api#richblockvideo
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Video->value))]
final class RichBlockVideo extends AbstractRichBlock
{
    /**
     * @param Video                 $video       The video
     * @param bool|null             $has_spoiler Optional. True, if the media preview is covered by a spoiler animation
     * @param RichBlockCaption|null $caption     Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#video Video
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected Video $video,
        protected ?bool $has_spoiler = null,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Video);
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
     * @return RichBlockVideo
     */
    public function setVideo(Video $video): RichBlockVideo
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->has_spoiler;
    }

    /**
     * @param bool|null $has_spoiler
     *
     * @return RichBlockVideo
     */
    public function setHasSpoiler(?bool $has_spoiler): RichBlockVideo
    {
        $this->has_spoiler = $has_spoiler;

        return $this;
    }

    /**
     * @return RichBlockCaption|null
     */
    public function getCaption(): ?RichBlockCaption
    {
        return $this->caption;
    }

    /**
     * @param RichBlockCaption|null $caption
     *
     * @return RichBlockVideo
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockVideo
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockVideo
