<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputPaidMediaTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a paid live photo to be sent as part of a paid media group.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputpaidmedialivephoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputPaidMediaLivePhoto, Telegram, Bot API, DTO, inputpaidmedialivephoto
// STRUCTURE: ▶ ┌media(FileUrlStr)┐ → ◇ caption,parse_mode → ∑ InputPaidMediaLivePhoto
// region CLASS_InputPaidMediaLivePhoto

/**
 * The paid media to send is a live photo.
 *
 * @see https://core.telegram.org/bots/api#inputpaidmedialivephoto
 */
#[BuildIf(new FieldIsChecker('type', InputPaidMediaTypeEnum::LivePhoto->value))]
final class InputPaidMediaLivePhoto extends AbstractInputPaidMedia
{
    /**
     * @param Filename|Url|string $media Video of the live photo to send. Pass a file_id to send a file that exists on the Telegram
     *                                   servers (recommended) or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name>
     *                                   name. More information on Sending Files ». Sending live photos by a URL is currently unsupported.
     * @param string              $photo The static photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended)
     *                                   or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More
     *                                   information on Sending Files ». Sending live photos by a URL is currently unsupported.
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected string $photo,
    ) {
        parent::__construct(
            InputPaidMediaTypeEnum::LivePhoto,
        );
    }

    /**
     * @return Filename|Url|string
     */
    public function getMedia(): Filename|Url|string
    {
        return $this->media;
    }

    /**
     * @param Filename|Url|string $media
     *
     * @return InputPaidMediaLivePhoto
     */
    public function setMedia(Filename|Url|string $media): InputPaidMediaLivePhoto
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     *
     * @return InputPaidMediaLivePhoto
     */
    public function setPhoto(string $photo): InputPaidMediaLivePhoto
    {
        $this->photo = $photo;

        return $this;
    }
}

// endregion CLASS_InputPaidMediaLivePhoto
