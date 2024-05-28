<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use stdClass;

/**
 * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
 * @link https://core.telegram.org/bots/api#externalreplyinfo
 */
class ExternalReplyInfo implements EntityInterface
{
    /**
     * @param AbstractMessageOrigin $origin Origin of the message
     * replied to by the given message
     * @param Chat|null $chat Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
     * @param int|null $message_id Unique message identifier inside the original chat.
     * Available only if the original chat is a supergroup or a channel.
     * @param LinkPreviewOptions|null $link_preview_options Options used for link preview generation for the original message,
     * if it is a text message
     * @param Animation|null $animation Message is an animation, information about the animation
     * @param Audio|null $audio Message is an audio file, information about the file
     * @param Document|null $document Message is a general file, information about the file
     * @param PhotoSize[]|null $photo Message is a photo, available sizes of the photo
     * @param Sticker|null $sticker Message is a sticker, information about the sticker
     * @param Story|null $story Message is a forwarded story
     * @param Video|null $video Message is a video, information about the video
     * @param VideoNote|null $video_note Message is a video note, information about the video message
     * @param Voice|null $voice Message is a voice message, information about the file
     * @param bool|null $has_media_spoiler True, if the message media is covered by a spoiler animation
     * @param Contact|null $contact Message is a shared contact, information about the contact
     * @param Dice|null $dice Message is a dice with random value
     * @param Game|null $game Message is a game, information about the game. More about games
     * @param Giveaway|null $giveaway Message is a scheduled giveaway, information about the giveaway
     * @param GiveawayWinners|null $giveaway_winners A giveaway with public winners was completed
     * @param Invoice|null $invoice Message is an invoice for a payment, information about the invoice. More about payments
     * @param Location|null $location Message is a shared location, information about the location
     * @param Poll|null $poll Message is a native poll, information about the poll
     * @param Venue|null $venue Message is a venue, information about the venue
     */
    public function __construct(
        private AbstractMessageOrigin $origin,
        private Chat|null $chat = null,
        private int|null $message_id = null,
        private LinkPreviewOptions|null $link_preview_options = null,
        private Animation|null $animation = null,
        private Audio|null $audio = null,
        private Document|null $document = null,
        #[ArrayType(PhotoSize::class)] private array|null $photo = null,
        private Sticker|null $sticker = null,
        private Story|null $story = null,
        private Video|null $video = null,
        private VideoNote|null $video_note = null,
        private Voice|null $voice = null,
        private bool|null $has_media_spoiler = null,
        private Contact|null $contact = null,
        private Dice|null $dice = null,
        private Game|null $game = null,
        private Giveaway|null $giveaway = null,
        private GiveawayWinners|null $giveaway_winners = null,
        private Invoice|null $invoice = null,
        private Location|null $location = null,
        private Poll|null $poll = null,
        private Venue|null $venue = null,
    ) {
    }

    public function getOrigin(): AbstractMessageOrigin
    {
        return $this->origin;
    }

    public function setOrigin(AbstractMessageOrigin $origin): ExternalReplyInfo
    {
        $this->origin = $origin;
        return $this;
    }

    public function getChat(): Chat|null
    {
        return $this->chat;
    }

    public function setChat(Chat|null $chat): ExternalReplyInfo
    {
        $this->chat = $chat;
        return $this;
    }

    public function getMessageId(): int|null
    {
        return $this->message_id;
    }

    public function setMessageId(int|null $message_id): ExternalReplyInfo
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getLinkPreviewOptions(): LinkPreviewOptions|null
    {
        return $this->link_preview_options;
    }

    public function setLinkPreviewOptions(LinkPreviewOptions|null $link_preview_options): ExternalReplyInfo
    {
        $this->link_preview_options = $link_preview_options;
        return $this;
    }

    public function getAnimation(): Animation|null
    {
        return $this->animation;
    }

    public function setAnimation(Animation|null $animation): ExternalReplyInfo
    {
        $this->animation = $animation;
        return $this;
    }

    public function getAudio(): Audio|null
    {
        return $this->audio;
    }

    public function setAudio(Audio|null $audio): ExternalReplyInfo
    {
        $this->audio = $audio;
        return $this;
    }

    public function getDocument(): Document|null
    {
        return $this->document;
    }

    public function setDocument(Document|null $document): ExternalReplyInfo
    {
        $this->document = $document;
        return $this;
    }

    public function getPhoto(): array|null
    {
        return $this->photo;
    }

    public function setPhoto(array|null $photo): ExternalReplyInfo
    {
        $this->photo = $photo;
        return $this;
    }

    public function getSticker(): Sticker|null
    {
        return $this->sticker;
    }

    public function setSticker(Sticker|null $sticker): ExternalReplyInfo
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getStory(): Story|null
    {
        return $this->story;
    }

    public function setStory(Story|null $story): ExternalReplyInfo
    {
        $this->story = $story;
        return $this;
    }

    public function getVideo(): Video|null
    {
        return $this->video;
    }

    public function setVideo(Video|null $video): ExternalReplyInfo
    {
        $this->video = $video;
        return $this;
    }

    public function getVideoNote(): VideoNote|null
    {
        return $this->video_note;
    }

    public function setVideoNote(VideoNote|null $video_note): ExternalReplyInfo
    {
        $this->video_note = $video_note;
        return $this;
    }

    public function getVoice(): Voice|null
    {
        return $this->voice;
    }

    public function setVoice(Voice|null $voice): ExternalReplyInfo
    {
        $this->voice = $voice;
        return $this;
    }

    public function getHasMediaSpoiler(): bool|null
    {
        return $this->has_media_spoiler;
    }

    public function setHasMediaSpoiler(bool|null $has_media_spoiler): ExternalReplyInfo
    {
        $this->has_media_spoiler = $has_media_spoiler;
        return $this;
    }

    public function getContact(): Contact|null
    {
        return $this->contact;
    }

    public function setContact(Contact|null $contact): ExternalReplyInfo
    {
        $this->contact = $contact;
        return $this;
    }

    public function getDice(): Dice|null
    {
        return $this->dice;
    }

    public function setDice(Dice|null $dice): ExternalReplyInfo
    {
        $this->dice = $dice;
        return $this;
    }

    public function getGame(): Game|null
    {
        return $this->game;
    }

    public function setGame(Game|null $game): ExternalReplyInfo
    {
        $this->game = $game;
        return $this;
    }

    public function getGiveaway(): Giveaway|null
    {
        return $this->giveaway;
    }

    public function setGiveaway(Giveaway|null $giveaway): ExternalReplyInfo
    {
        $this->giveaway = $giveaway;
        return $this;
    }

    public function getGiveawayWinners(): GiveawayWinners|null
    {
        return $this->giveaway_winners;
    }

    public function setGiveawayWinners(GiveawayWinners|null $giveaway_winners): ExternalReplyInfo
    {
        $this->giveaway_winners = $giveaway_winners;
        return $this;
    }

    public function getInvoice(): Invoice|null
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice|null $invoice): ExternalReplyInfo
    {
        $this->invoice = $invoice;
        return $this;
    }

    public function getLocation(): Location|null
    {
        return $this->location;
    }

    public function setLocation(Location|null $location): ExternalReplyInfo
    {
        $this->location = $location;
        return $this;
    }

    public function getPoll(): Poll|null
    {
        return $this->poll;
    }

    public function setPoll(Poll|null $poll): ExternalReplyInfo
    {
        $this->poll = $poll;
        return $this;
    }

    public function getVenue(): Venue|null
    {
        return $this->venue;
    }

    public function setVenue(Venue|null $venue): ExternalReplyInfo
    {
        $this->venue = $venue;
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
            'photo' => $this->photo !== null
                ? array_map(fn(PhotoSize $ps) => $ps->toArray(), $this->photo)
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
        ];
    }
}
