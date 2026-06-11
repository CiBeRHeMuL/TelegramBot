<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputProfilePhotoTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents an animated profile photo to be set.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputprofilephotoanimated
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputProfilePhotoAnimated, Telegram, Bot API, DTO, inputprofilephotoanimated
// STRUCTURE: ▶ ┌animation(InputFile)┐ → ◇ main_frame_timestamp → ∑ photo
// region CLASS_InputProfilePhotoAnimated

/**
 * An animated profile photo in the MPEG4 format.
 *
 * @see https://core.telegram.org/bots/api#inputprofilephotoanimated
 */
#[BuildIf(new FieldIsChecker('type', InputProfilePhotoTypeEnum::Animated->value))]
final class InputProfilePhotoAnimated extends AbstractInputProfilePhoto
{
    /**
     * @param Filename|Url $animation            The animated profile photo. Profile photos can't be reused and can only be uploaded as a new
     *                                           file, so you can pass “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data under <file_attach_name>.
     *                                           More information on Sending Files »
     * @param float|null   $main_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static profile
     *                                           photo. Defaults to 0.0.
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        protected Filename|Url $animation,
        protected ?float $main_frame_timestamp = null,
    ) {
        parent::__construct(InputProfilePhotoTypeEnum::Animated);
    }

    /**
     * @return Filename|Url
     */
    public function getAnimation(): Filename|Url
    {
        return $this->animation;
    }

    /**
     * @param Filename|Url $animation
     *
     * @return InputProfilePhotoAnimated
     */
    public function setAnimation(Filename|Url $animation): InputProfilePhotoAnimated
    {
        $this->animation = $animation;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMainFrameTimestamp(): ?float
    {
        return $this->main_frame_timestamp;
    }

    /**
     * @param float|null $main_frame_timestamp
     *
     * @return InputProfilePhotoAnimated
     */
    public function setMainFrameTimestamp(?float $main_frame_timestamp): InputProfilePhotoAnimated
    {
        $this->main_frame_timestamp = $main_frame_timestamp;

        return $this;
    }
}

// endregion CLASS_InputProfilePhotoAnimated
