<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains media to be attached to a poll question or explanation.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#pollmedia
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PollMedia, Telegram, Bot API, DTO, pollmedia
// STRUCTURE: ▶ ┌media(InputFileStr)┐ → ◇ caption,parse_mode → ∑ PollMedia
// region CLASS_PollMedia

/**
 * At most one of the optional fields can be present in any given object.
 *
 * @see https://core.telegram.org/bots/api#pollmedia
 */
final class PollMedia implements EntityInterface
{
    /**
     * @param Animation|null   $animation  Optional. Media is an animation, information about the animation
     * @param Audio|null       $audio      Optional. Media is an audio file, information about the file; currently, can't be received in a poll
     *                                     option
     * @param Document|null    $document   Optional. Media is a general file, information about the file; currently, can't be received
     *                                     in a poll option
     * @param LivePhoto|null   $live_photo Optional. Media is a live photo, information about the live photo
     * @param Location|null    $location   Optional. Media is a shared location, information about the location
     * @param PhotoSize[]|null $photo      Optional. Media is a photo, available sizes of the photo
     * @param Sticker|null     $sticker    Optional. Media is a sticker, information about the sticker; currently, for poll options only
     * @param Venue|null       $venue      Optional. Media is a venue, information about the venue
     * @param Video|null       $video      Optional. Media is a video, information about the video
     * @param Link|null        $link       Optional. Media is a link, information about the link
     *
     * @see https://core.telegram.org/bots/api#animation Animation
     * @see https://core.telegram.org/bots/api#audio Audio
     * @see https://core.telegram.org/bots/api#document Document
     * @see https://core.telegram.org/bots/api#livephoto LivePhoto
     * @see https://core.telegram.org/bots/api#location Location
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     * @see https://core.telegram.org/bots/api#sticker Sticker
     * @see https://core.telegram.org/bots/api#venue Venue
     * @see https://core.telegram.org/bots/api#video Video
     */
    public function __construct(
        protected ?Animation $animation = null,
        protected ?Audio $audio = null,
        protected ?Document $document = null,
        protected ?LivePhoto $live_photo = null,
        protected ?Location $location = null,
        #[ArrayType(PhotoSize::class)]
        protected ?array $photo = null,
        protected ?Sticker $sticker = null,
        protected ?Venue $venue = null,
        protected ?Video $video = null,
        protected ?Link $link = null,
    ) {}

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     *
     * @return PollMedia
     */
    public function setAnimation(?Animation $animation): PollMedia
    {
        $this->animation = $animation;

        return $this;
    }

    /**
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @param Audio|null $audio
     *
     * @return PollMedia
     */
    public function setAudio(?Audio $audio): PollMedia
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param Document|null $document
     *
     * @return PollMedia
     */
    public function setDocument(?Document $document): PollMedia
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return LivePhoto|null
     */
    public function getLivePhoto(): ?LivePhoto
    {
        return $this->live_photo;
    }

    /**
     * @param LivePhoto|null $live_photo
     *
     * @return PollMedia
     */
    public function setLivePhoto(?LivePhoto $live_photo): PollMedia
    {
        $this->live_photo = $live_photo;

        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     *
     * @return PollMedia
     */
    public function setLocation(?Location $location): PollMedia
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[]|null $photo
     *
     * @return PollMedia
     */
    public function setPhoto(?array $photo): PollMedia
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     *
     * @return PollMedia
     */
    public function setSticker(?Sticker $sticker): PollMedia
    {
        $this->sticker = $sticker;

        return $this;
    }

    /**
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @param Venue|null $venue
     *
     * @return PollMedia
     */
    public function setVenue(?Venue $venue): PollMedia
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     *
     * @return PollMedia
     */
    public function setVideo(?Video $video): PollMedia
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Link|null
     */
    public function getLink(): ?Link
    {
        return $this->link;
    }

    /**
     * @param Link|null $link
     *
     * @return PollMedia
     */
    public function setLink(?Link $link): PollMedia
    {
        $this->link = $link;

        return $this;
    }
}

// endregion CLASS_PollMedia
