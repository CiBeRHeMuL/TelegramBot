<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
 *
 * @link https://core.telegram.org/bots/api#externalreplyinfo
 */
class ExternalReplyInfo extends AbstractEntity
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
     * @param Game|null $game Optional. Message is a game, information about the game. More about games Â»
     * @param Giveaway|null $giveaway Optional. Message is a scheduled giveaway, information about the giveaway
     * @param GiveawayWinners|null $giveaway_winners Optional. A giveaway with public winners was completed
     * @param Invoice|null $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments
     * Â»
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
     * @see https://core.telegram.org/bots/api#games More about games Â»
     * @see https://core.telegram.org/bots/api#giveaway Giveaway
     * @see https://core.telegram.org/bots/api#giveawaywinners GiveawayWinners
     * @see https://core.telegram.org/bots/api#invoice Invoice
     * @see https://core.telegram.org/bots/api#payments payment
     * @see https://core.telegram.org/bots/api#payments More about payments Â»
     * @see https://core.telegram.org/bots/api#location Location
     * @see https://core.telegram.org/bots/api#poll Poll
     * @see https://core.telegram.org/bots/api#venue Venue
     */
    public function __construct(
        protected AbstractMessageOrigin $origin,
        protected Chat|null $chat = null,
        protected int|null $message_id = null,
        protected LinkPreviewOptions|null $link_preview_options = null,
        protected Animation|null $animation = null,
        protected Audio|null $audio = null,
        protected Document|null $document = null,
        #[ArrayType(PhotoSize::class)]
        protected array|null $photo = null,
        protected Sticker|null $sticker = null,
        protected Story|null $story = null,
        protected Video|null $video = null,
        protected VideoNote|null $video_note = null,
        protected Voice|null $voice = null,
        protected bool|null $has_media_spoiler = null,
        protected Contact|null $contact = null,
        protected Dice|null $dice = null,
        protected Game|null $game = null,
        protected Giveaway|null $giveaway = null,
        protected GiveawayWinners|null $giveaway_winners = null,
        protected Invoice|null $invoice = null,
        protected Location|null $location = null,
        protected Poll|null $poll = null,
        protected Venue|null $venue = null,
        protected PaidMediaInfo|null $paid_media = null,
        protected Checklist|null $checklist = null,
    ) {
        parent::__construct();
    }

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
    public function getChat(): Chat|null
    {
        return $this->chat;
    }

    /**
     * @param Chat|null $chat
     *
     * @return ExternalReplyInfo
     */
    public function setChat(Chat|null $chat): ExternalReplyInfo
    {
        $this->chat = $chat;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageId(): int|null
    {
        return $this->message_id;
    }

    /**
     * @param int|null $message_id
     *
     * @return ExternalReplyInfo
     */
    public function setMessageId(int|null $message_id): ExternalReplyInfo
    {
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions(): LinkPreviewOptions|null
    {
        return $this->link_preview_options;
    }

    /**
     * @param LinkPreviewOptions|null $link_preview_options
     *
     * @return ExternalReplyInfo
     */
    public function setLinkPreviewOptions(LinkPreviewOptions|null $link_preview_options): ExternalReplyInfo
    {
        $this->link_preview_options = $link_preview_options;
        return $this;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): Animation|null
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     *
     * @return ExternalReplyInfo
     */
    public function setAnimation(Animation|null $animation): ExternalReplyInfo
    {
        $this->animation = $animation;
        return $this;
    }

    /**
     * @return Audio|null
     */
    public function getAudio(): Audio|null
    {
        return $this->audio;
    }

    /**
     * @param Audio|null $audio
     *
     * @return ExternalReplyInfo
     */
    public function setAudio(Audio|null $audio): ExternalReplyInfo
    {
        $this->audio = $audio;
        return $this;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): Document|null
    {
        return $this->document;
    }

    /**
     * @param Document|null $document
     *
     * @return ExternalReplyInfo
     */
    public function setDocument(Document|null $document): ExternalReplyInfo
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): array|null
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[]|null $photo
     *
     * @return ExternalReplyInfo
     */
    public function setPhoto(array|null $photo): ExternalReplyInfo
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): Sticker|null
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     *
     * @return ExternalReplyInfo
     */
    public function setSticker(Sticker|null $sticker): ExternalReplyInfo
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return Story|null
     */
    public function getStory(): Story|null
    {
        return $this->story;
    }

    /**
     * @param Story|null $story
     *
     * @return ExternalReplyInfo
     */
    public function setStory(Story|null $story): ExternalReplyInfo
    {
        $this->story = $story;
        return $this;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): Video|null
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     *
     * @return ExternalReplyInfo
     */
    public function setVideo(Video|null $video): ExternalReplyInfo
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): VideoNote|null
    {
        return $this->video_note;
    }

    /**
     * @param VideoNote|null $video_note
     *
     * @return ExternalReplyInfo
     */
    public function setVideoNote(VideoNote|null $video_note): ExternalReplyInfo
    {
        $this->video_note = $video_note;
        return $this;
    }

    /**
     * @return Voice|null
     */
    public function getVoice(): Voice|null
    {
        return $this->voice;
    }

    /**
     * @param Voice|null $voice
     *
     * @return ExternalReplyInfo
     */
    public function setVoice(Voice|null $voice): ExternalReplyInfo
    {
        $this->voice = $voice;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasMediaSpoiler(): bool|null
    {
        return $this->has_media_spoiler;
    }

    /**
     * @param bool|null $has_media_spoiler
     *
     * @return ExternalReplyInfo
     */
    public function setHasMediaSpoiler(bool|null $has_media_spoiler): ExternalReplyInfo
    {
        $this->has_media_spoiler = $has_media_spoiler;
        return $this;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): Contact|null
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     *
     * @return ExternalReplyInfo
     */
    public function setContact(Contact|null $contact): ExternalReplyInfo
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return Dice|null
     */
    public function getDice(): Dice|null
    {
        return $this->dice;
    }

    /**
     * @param Dice|null $dice
     *
     * @return ExternalReplyInfo
     */
    public function setDice(Dice|null $dice): ExternalReplyInfo
    {
        $this->dice = $dice;
        return $this;
    }

    /**
     * @return Game|null
     */
    public function getGame(): Game|null
    {
        return $this->game;
    }

    /**
     * @param Game|null $game
     *
     * @return ExternalReplyInfo
     */
    public function setGame(Game|null $game): ExternalReplyInfo
    {
        $this->game = $game;
        return $this;
    }

    /**
     * @return Giveaway|null
     */
    public function getGiveaway(): Giveaway|null
    {
        return $this->giveaway;
    }

    /**
     * @param Giveaway|null $giveaway
     *
     * @return ExternalReplyInfo
     */
    public function setGiveaway(Giveaway|null $giveaway): ExternalReplyInfo
    {
        $this->giveaway = $giveaway;
        return $this;
    }

    /**
     * @return GiveawayWinners|null
     */
    public function getGiveawayWinners(): GiveawayWinners|null
    {
        return $this->giveaway_winners;
    }

    /**
     * @param GiveawayWinners|null $giveaway_winners
     *
     * @return ExternalReplyInfo
     */
    public function setGiveawayWinners(GiveawayWinners|null $giveaway_winners): ExternalReplyInfo
    {
        $this->giveaway_winners = $giveaway_winners;
        return $this;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): Invoice|null
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|null $invoice
     *
     * @return ExternalReplyInfo
     */
    public function setInvoice(Invoice|null $invoice): ExternalReplyInfo
    {
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): Location|null
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     *
     * @return ExternalReplyInfo
     */
    public function setLocation(Location|null $location): ExternalReplyInfo
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Poll|null
     */
    public function getPoll(): Poll|null
    {
        return $this->poll;
    }

    /**
     * @param Poll|null $poll
     *
     * @return ExternalReplyInfo
     */
    public function setPoll(Poll|null $poll): ExternalReplyInfo
    {
        $this->poll = $poll;
        return $this;
    }

    /**
     * @return Venue|null
     */
    public function getVenue(): Venue|null
    {
        return $this->venue;
    }

    /**
     * @param Venue|null $venue
     *
     * @return ExternalReplyInfo
     */
    public function setVenue(Venue|null $venue): ExternalReplyInfo
    {
        $this->venue = $venue;
        return $this;
    }

    /**
     * @return PaidMediaInfo|null
     */
    public function getPaidMedia(): PaidMediaInfo|null
    {
        return $this->paid_media;
    }

    /**
     * @param PaidMediaInfo|null $paid_media
     *
     * @return ExternalReplyInfo
     */
    public function setPaidMedia(PaidMediaInfo|null $paid_media): ExternalReplyInfo
    {
        $this->paid_media = $paid_media;
        return $this;
    }

    /**
     * @return Checklist|null
     */
    public function getChecklist(): Checklist|null
    {
        return $this->checklist;
    }

    /**
     * @param Checklist|null $checklist
     *
     * @return ExternalReplyInfo
     */
    public function setChecklist(Checklist|null $checklist): ExternalReplyInfo
    {
        $this->checklist = $checklist;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'origin' => $this->origin->toArray(),
            'chat' => $this->chat?->toArray(),
            'message_id' => $this->message_id,
            'link_preview_options' => $this->link_preview_options?->toArray(),
            'animation' => $this->animation?->toArray(),
            'audio' => $this->audio?->toArray(),
            'document' => $this->document?->toArray(),
            'photo' => $this->photo
                ? array_map(fn(PhotoSize $e) => $e->toArray(), $this->photo)
                : null,
            'sticker' => $this->sticker?->toArray(),
            'story' => $this->story?->toArray(),
            'video' => $this->video?->toArray(),
            'video_note' => $this->video_note?->toArray(),
            'voice' => $this->voice?->toArray(),
            'has_media_spoiler' => $this->has_media_spoiler,
            'contact' => $this->contact?->toArray(),
            'dice' => $this->dice?->toArray(),
            'game' => $this->game?->toArray(),
            'giveaway' => $this->giveaway?->toArray(),
            'giveaway_winners' => $this->giveaway_winners?->toArray(),
            'invoice' => $this->invoice?->toArray(),
            'location' => $this->location?->toArray(),
            'poll' => $this->poll?->toArray(),
            'venue' => $this->venue?->toArray(),
            'paid_media' => $this->paid_media?->toArray(),
            'checklist' => $this->checklist?->toArray(),
        ];
    }
}
