<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a media to be sent as part of a rich message.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichmessagemedia
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichMessageMedia, Telegram, Bot API, DTO, Input Rich Message Media
// STRUCTURE: ▶ ┌id,media(IAudio|IVideo|IPhoto|IAnimation|IVoiceNote)┐ → ∑ InputRichMessageMedia
// region CLASS_InputRichMessageMedia

/**
 * Represents a media to be sent as part of a rich message.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagemedia
 */
final class InputRichMessageMedia implements EntityInterface
{
    /**
     * @param string                                                                                  $id    Unique identifier for the media in the rich message
     * @param InputMediaAnimation|InputMediaAudio|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media Media to be sent
     *
     * @see https://core.telegram.org/bots/api#inputmediaanimation InputMediaAnimation
     * @see https://core.telegram.org/bots/api#inputmediaaudio InputMediaAudio
     * @see https://core.telegram.org/bots/api#inputmediaphoto InputMediaPhoto
     * @see https://core.telegram.org/bots/api#inputmediavideo InputMediaVideo
     * @see https://core.telegram.org/bots/api#inputmediavoicenote InputMediaVoiceNote
     */
    public function __construct(
        protected string $id,
        protected InputMediaAnimation|InputMediaAudio|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media,
    ) {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return InputRichMessageMedia
     */
    public function setId(string $id): InputRichMessageMedia
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return InputMediaAnimation|InputMediaAudio|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote
     */
    public function getMedia(): InputMediaAnimation|InputMediaAudio|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote
    {
        return $this->media;
    }

    /**
     * @param InputMediaAnimation|InputMediaAudio|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media
     *
     * @return InputRichMessageMedia
     */
    public function setMedia(
        InputMediaAnimation|InputMediaAudio|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media,
    ): InputRichMessageMedia {
        $this->media = $media;

        return $this;
    }
}

// endregion CLASS_InputRichMessageMedia
