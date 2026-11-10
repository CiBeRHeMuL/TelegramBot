<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_InputRichMessageMedia
/**
 * Represents a media to be sent as part of a rich message.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagemedia
 */
final class InputRichMessageMedia implements EntityInterface
{
    /**
     * @param string                                                                                                     $id    Unique identifier for the media in the rich message
     * @param InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media Media to be sent
     *
     * @see https://core.telegram.org/bots/api#inputmediaanimation InputMediaAnimation
     * @see https://core.telegram.org/bots/api#inputmediaaudio InputMediaAudio
     * @see https://core.telegram.org/bots/api#inputmediadocument InputMediaDocument
     * @see https://core.telegram.org/bots/api#inputmediaphoto InputMediaPhoto
     * @see https://core.telegram.org/bots/api#inputmediavideo InputMediaVideo
     * @see https://core.telegram.org/bots/api#inputmediavoicenote InputMediaVoiceNote
     */
    public function __construct(
        protected string $id,
        protected InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media,
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
     * @return InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote
     */
    public function getMedia(): InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote
    {
        return $this->media;
    }

    /**
     * @param InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media
     *
     * @return InputRichMessageMedia
     */
    public function setMedia(
        InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media,
    ): InputRichMessageMedia {
        $this->media = $media;

        return $this;
    }
}

// endregion CLASS_InputRichMessageMedia
