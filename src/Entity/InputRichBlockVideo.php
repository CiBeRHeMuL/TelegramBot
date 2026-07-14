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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockvideo
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockVideo, Telegram, Bot API, DTO, Input Rich Block Video
// STRUCTURE: ▶ ┌type,video,caption┐ → ∑ InputRichBlockVideo
// region CLASS_InputRichBlockVideo
/**
 * A block with a video, corresponding to the HTML tag <video>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockvideo
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Video->value))]
final class InputRichBlockVideo extends AbstractInputRichBlock
{
    /**
     * @param InputMediaVideo       $video   The video. Caption is ignored.
     * @param RichBlockCaption|null $caption Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#inputmediavideo InputMediaVideo
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected InputMediaVideo $video,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Video);
    }

    /**
     * @return InputMediaVideo
     */
    public function getVideo(): InputMediaVideo
    {
        return $this->video;
    }

    /**
     * @param InputMediaVideo $video
     *
     * @return InputRichBlockVideo
     */
    public function setVideo(InputMediaVideo $video): InputRichBlockVideo
    {
        $this->video = $video;

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
     * @return InputRichBlockVideo
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockVideo
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockVideo
