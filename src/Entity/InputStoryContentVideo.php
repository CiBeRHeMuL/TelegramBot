<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputStoryContentTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Describes a video to post as a story.
 *
 * @link https://core.telegram.org/bots/api#inputstorycontentvideo
 */
#[BuildIf(new FieldIsChecker('type', InputStoryContentTypeEnum::Photo->value))]
final class InputStoryContentVideo extends AbstractInputStoryContent
{
    /**
     * @param Filename|Url $video The video to post as a story. The video must be of the size 720x1280, streamable, encoded with
     * H.265 codec, with key frames added each second in the MPEG4 format, and must not exceed 30 MB. The video can't be reused and
     * can only be uploaded as a new file, so you can pass “attach://<file_attach_name>” if the video was uploaded using multipart/form-data
     * under <file_attach_name>. More information on Sending Files »
     * @param float|null $cover_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static cover
     * for the story. Defaults to 0.0.
     * @param float|null $duration Optional. Precise duration of the video in seconds; 0-60
     * @param bool|null $is_animation Optional. Pass True if the video has no sound
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        protected Filename|Url $video,
        protected float|null $cover_frame_timestamp = null,
        protected float|null $duration = null,
        protected bool|null $is_animation = null,
    ) {
        parent::__construct(InputStoryContentTypeEnum::Video);
    }

    /**
     * @return Filename|Url
     */
    public function getVideo(): Filename|Url
    {
        return $this->video;
    }

    /**
     * @param Filename|Url $video
     *
     * @return InputStoryContentVideo
     */
    public function setVideo(Filename|Url $video): InputStoryContentVideo
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getCoverFrameTimestamp(): float|null
    {
        return $this->cover_frame_timestamp;
    }

    /**
     * @param float|null $cover_frame_timestamp
     *
     * @return InputStoryContentVideo
     */
    public function setCoverFrameTimestamp(float|null $cover_frame_timestamp): InputStoryContentVideo
    {
        $this->cover_frame_timestamp = $cover_frame_timestamp;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDuration(): float|null
    {
        return $this->duration;
    }

    /**
     * @param float|null $duration
     *
     * @return InputStoryContentVideo
     */
    public function setDuration(float|null $duration): InputStoryContentVideo
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsAnimation(): bool|null
    {
        return $this->is_animation;
    }

    /**
     * @param bool|null $is_animation
     *
     * @return InputStoryContentVideo
     */
    public function setIsAnimation(bool|null $is_animation): InputStoryContentVideo
    {
        $this->is_animation = $is_animation;
        return $this;
    }
}
