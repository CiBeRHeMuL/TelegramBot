<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
 *
 * @link https://core.telegram.org/bots/api#externalreplyinfo
 */
final class ExternalReplyInfo implements EntityInterface
{
    /**
     * @param AbstractMessageOrigin $origin Origin of the message replied to by the given message
     * @param Chat|null $chat Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
     * @param int|null $message_id Optional. Unique message identifier inside the original chat. Available only if the original chat
     * is a supergroup or a channel.
     * @param LinkPreviewOptions|null $link_preview_options Optional. Options used for link preview generation for the original message,
     * if it is a text message
     * @param Animation|null $animation Optional. Message is an animation, information about the animation
     * @param Audio|null $audio Optional. Message is an audio file, information about the file
     * @param Document|null $document Optional. Message is a general file, information about the file
     * @param PhotoSize[]|null $photo Optional. Message is a photo, available sizes of the photo
     * @param Sticker|null $sticker Optional. Message is a sticker, information about the sticker
     * @param Story|null $story Optional. Message is a forwarded story
     * @param Video|null $video Optional. Message is a video, information about the video
     * @param VideoNote|null $video_note Optional. Message is a video note, information about the video message
     * @param Voice|null $voice Optional. Message is a voice message, information about the file
     * @param bool|null $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation
     * @param Contact|null $contact Optional. Message is a shared contact, information about the contact
     * @param Dice|null $dice Optional. Message is a dice with random value
     * @param Game|null $game Optional. Message is a game, information about the game. More about games »
     * @param Giveaway|null $giveaway Optional. Message is a scheduled giveaway, information about the giveaway
     * @param GiveawayWinners|null $giveaway_winners Optional. A giveaway with public winners was completed
     * @param Invoice|null $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments
     * »
     * @param Location|null $location Optional. Message is a shared location, information about the location
     * @param Poll|null $poll Optional. Message is a native poll, information about the poll
     * @param Venue|null $venue Optional. Message is a venue, information about the venue
     * @param PaidMediaInfo|null $paid_media Optional. Message contains paid media; information about the paid media
     * @param Checklist|null $checklist Optional. Message is a checklist
     *
     * @see https://core.telegram.org/bots/api#messageorigin MessageOrigin
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#linkpreviewoptions LinkPreviewOptions
     * @see https://core.telegram.org/bots/api#animation Animation
     * @see https://core.telegram.org/bots/api#audio Audio
     * @see https://core.telegram.org/bots/api#document Document
     * @see https://core.telegram.org/bots/api#paidmediainfo PaidMediaInfo
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     * @see https://core.telegram.org/bots/api#sticker Sticker
     * @see https://core.telegram.org/bots/api#story Story
     * @see https://core.telegram.org/bots/api#video Video
     * @see https://core.telegram.org/bots/api#videonote VideoNote
     * @see https://telegram.org/blog/video-messages-and-telescope video note
     * @see https://core.telegram.org/bots/api#voice Voice
     * @see https://core.telegram.org/bots/api#checklist Checklist
     * @see https://core.telegram.org/bots/api#contact Contact
     * @see https://core.telegram.org/bots/api#dice Dice
     * @see https://core.telegram.org/bots/api#game Game
     * @see https://core.telegram.org/bots/api#games More about games »
     * @see https://core.telegram.org/bots/api#giveaway Giveaway
     * @see https://core.telegram.org/bots/api#giveawaywinners GiveawayWinners
     * @see https://core.telegram.org/bots/api#invoice Invoice
     * @see https://core.telegram.org/bots/api#payments More about payments »
     * @see https://core.telegram.org/bots/api#location Location
     * @see https://core.telegram.org/bots/api#poll Poll
     * @see https://core.telegram.org/bots/api#venue Venue
     */
    public function __construct(
        protected AbstractMessageOrigin $origin,
        protected ?Chat $chat = null,
        protected ?int $message_id = null,
        protected ?LinkPreviewOptions $link_preview_options = null,
        protected ?Animation $animation = null,
        protected ?Audio $audio = null,
        protected ?Document $document = null,
        #[ArrayType(PhotoSize::class)]
        protected ?array $photo = null,
        protected ?Sticker $sticker = null,
        protected ?Story $story = null,
        protected ?Video $video = null,
        protected ?VideoNote $video_note = null,
        protected ?Voice $voice = null,
        protected ?bool $has_media_spoiler = null,
        protected ?Contact $contact = null,
        protected ?Dice $dice = null,
        protected ?Game $game = null,
        protected ?Giveaway $giveaway = null,
        protected ?GiveawayWinners $giveaway_winners = null,
        protected ?Invoice $invoice = null,
        protected ?Location $location = null,
        protected ?Poll $poll = null,
        protected ?Venue $venue = null,
        protected ?PaidMediaInfo $paid_media = null,
        protected ?Checklist $checklist = null,
    ) {}

    /**
     * @return AbstractMessageOrigin
     */
    public function getOrigin(): AbstractMessageOrigin
    {
        return $this->origin;
    }

    /**
     * @param AbstractMessageOrigin $origin
     *
     * @return ExternalReplyInfo
     */
    public function setOrigin(AbstractMessageOrigin $origin): ExternalReplyInfo
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat|null $chat
     *
     * @return ExternalReplyInfo
     */
    public function setChat(?Chat $chat): ExternalReplyInfo
    {
        $this->chat = $chat;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    /**
     * @param int|null $message_id
     *
     * @return ExternalReplyInfo
     */
    public function setMessageId(?int $message_id): ExternalReplyInfo
    {
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->link_preview_options;
    }

    /**
     * @param LinkPreviewOptions|null $link_preview_options
     *
     * @return ExternalReplyInfo
     */
    public function setLinkPreviewOptions(?LinkPreviewOptions $link_preview_options): ExternalReplyInfo
    {
        $this->link_preview_options = $link_preview_options;
        return $this;
    }

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
     * @return ExternalReplyInfo
     */
    public function setAnimation(?Animation $animation): ExternalReplyInfo
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
     * @return ExternalReplyInfo
     */
    public function setAudio(?Audio $audio): ExternalReplyInfo
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
     * @return ExternalReplyInfo
     */
    public function setDocument(?Document $document): ExternalReplyInfo
    {
        $this->document = $document;
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
     * @return ExternalReplyInfo
     */
    public function setPhoto(?array $photo): ExternalReplyInfo
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
     * @return ExternalReplyInfo
     */
    public function setSticker(?Sticker $sticker): ExternalReplyInfo
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return Story|null
     */
    public function getStory(): ?Story
    {
        return $this->story;
    }

    /**
     * @param Story|null $story
     *
     * @return ExternalReplyInfo
     */
    public function setStory(?Story $story): ExternalReplyInfo
    {
        $this->story = $story;
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
     * @return ExternalReplyInfo
     */
    public function setVideo(?Video $video): ExternalReplyInfo
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->video_note;
    }

    /**
     * @param VideoNote|null $video_note
     *
     * @return ExternalReplyInfo
     */
    public function setVideoNote(?VideoNote $video_note): ExternalReplyInfo
    {
        $this->video_note = $video_note;
        return $this;
    }

    /**
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @param Voice|null $voice
     *
     * @return ExternalReplyInfo
     */
    public function setVoice(?Voice $voice): ExternalReplyInfo
    {
        $this->voice = $voice;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasMediaSpoiler(): ?bool
    {
        return $this->has_media_spoiler;
    }

    /**
     * @param bool|null $has_media_spoiler
     *
     * @return ExternalReplyInfo
     */
    public function setHasMediaSpoiler(?bool $has_media_spoiler): ExternalReplyInfo
    {
        $this->has_media_spoiler = $has_media_spoiler;
        return $this;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     *
     * @return ExternalReplyInfo
     */
    public function setContact(?Contact $contact): ExternalReplyInfo
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return Dice|null
     */
    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    /**
     * @param Dice|null $dice
     *
     * @return ExternalReplyInfo
     */
    public function setDice(?Dice $dice): ExternalReplyInfo
    {
        $this->dice = $dice;
        return $this;
    }

    /**
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Game|null $game
     *
     * @return ExternalReplyInfo
     */
    public function setGame(?Game $game): ExternalReplyInfo
    {
        $this->game = $game;
        return $this;
    }

    /**
     * @return Giveaway|null
     */
    public function getGiveaway(): ?Giveaway
    {
        return $this->giveaway;
    }

    /**
     * @param Giveaway|null $giveaway
     *
     * @return ExternalReplyInfo
     */
    public function setGiveaway(?Giveaway $giveaway): ExternalReplyInfo
    {
        $this->giveaway = $giveaway;
        return $this;
    }

    /**
     * @return GiveawayWinners|null
     */
    public function getGiveawayWinners(): ?GiveawayWinners
    {
        return $this->giveaway_winners;
    }

    /**
     * @param GiveawayWinners|null $giveaway_winners
     *
     * @return ExternalReplyInfo
     */
    public function setGiveawayWinners(?GiveawayWinners $giveaway_winners): ExternalReplyInfo
    {
        $this->giveaway_winners = $giveaway_winners;
        return $this;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|null $invoice
     *
     * @return ExternalReplyInfo
     */
    public function setInvoice(?Invoice $invoice): ExternalReplyInfo
    {
        $this->invoice = $invoice;
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
     * @return ExternalReplyInfo
     */
    public function setLocation(?Location $location): ExternalReplyInfo
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Poll|null
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * @param Poll|null $poll
     *
     * @return ExternalReplyInfo
     */
    public function setPoll(?Poll $poll): ExternalReplyInfo
    {
        $this->poll = $poll;
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
     * @return ExternalReplyInfo
     */
    public function setVenue(?Venue $venue): ExternalReplyInfo
    {
        $this->venue = $venue;
        return $this;
    }

    /**
     * @return PaidMediaInfo|null
     */
    public function getPaidMedia(): ?PaidMediaInfo
    {
        return $this->paid_media;
    }

    /**
     * @param PaidMediaInfo|null $paid_media
     *
     * @return ExternalReplyInfo
     */
    public function setPaidMedia(?PaidMediaInfo $paid_media): ExternalReplyInfo
    {
        $this->paid_media = $paid_media;
        return $this;
    }

    /**
     * @return Checklist|null
     */
    public function getChecklist(): ?Checklist
    {
        return $this->checklist;
    }

    /**
     * @param Checklist|null $checklist
     *
     * @return ExternalReplyInfo
     */
    public function setChecklist(?Checklist $checklist): ExternalReplyInfo
    {
        $this->checklist = $checklist;
        return $this;
    }
}
