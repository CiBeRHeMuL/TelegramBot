<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldCompareChecker;
use AndrewGos\TelegramBot\Enum\CompareOperatorEnum;
use stdClass;

/**
 * This object represents a message.
 * @link https://core.telegram.org/bots/api#message
 */
#[BuildIf(new FieldCompareChecker('date', 0, CompareOperatorEnum::NotEqual))]
class Message extends AbstractMaybeInaccessibleMessage
{
    /**
     * @param int $message_id Unique message identifier inside this chat
     * @param int $date Date the message was sent in Unix time. It is always a positive number, representing a valid date.
     * @param Chat $chat Chat the message belongs to
     * @param int|null $message_thread_id Unique identifier of a message thread to which the message belongs; for supergroups only
     * @param User|null $from Sender of the message; empty for messages sent to channels.
     * For backward compatibility, the field contains a fake sender user in non-channel chats,
     * if the message was sent on behalf of a chat.
     * @param Chat|null $sender_chat Sender of the message, sent on behalf of a chat.
     * For example, the channel itself for channel posts, the supergroup itself for messages
     * from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group.
     * For backward compatibility, the field from contains a fake sender user in non-channel chats,
     * if the message was sent on behalf of a chat.
     * @param int|null $sender_boost_count If the sender of the message boosted the chat, the number of boosts added by the user
     * @param AbstractMessageOrigin|null $forward_origin Information
     * about the original message for forwarded messages
     * @param bool|null $is_topic_message True, if the message is sent to a forum topic
     * @param bool|null $is_automatic_forward True, if the message is a channel post that was automatically forwarded
     * to the connected discussion group
     * @param Message|null $reply_to_message For replies in the same chat and message thread, the original message.
     * Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param ExternalReplyInfo|null $external_reply Information about the message that is being replied to,
     * which may come from another chat or forum topic
     * @param TextQuote|null $quote For replies that quote part of the original message, the quoted part of the message
     * @param Story|null $reply_to_story For replies to a story, the original story
     * @param User|null $via_bot Bot through which the message was sent
     * @param int|null $edit_date Date the message was last edited in Unix time
     * @param bool|null $has_protected_content True, if the message can't be forwarded
     * @param string|null $media_group_id The unique identifier of a media message group this message belongs to
     * @param string|null $author_signature Signature of the post author for messages in channels,
     * or the custom title of an anonymous group administrator
     * @param string|null $text For text messages, the actual UTF-8 text of the message
     * @param MessageEntity[]|null $entities For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     * @param LinkPreviewOptions|null $link_preview_options Options used for link preview generation for the message,
     * if it is a text message and link preview options were changed
     * @param Animation|null $animation Message is an animation, information about the animation.
     * For backward compatibility, when this field is set, the document field will also be set
     * @param Audio|null $audio Message is an audio file, information about the file
     * @param Document|null $document Message is a general file, information about the file
     * @param PhotoSize[]|null $photo Message is a photo, available sizes of the photo
     * @param Sticker|null $sticker Message is a sticker, information about the sticker
     * @param Story|null $story Message is a forwarded story
     * @param Video|null $video Message is a video, information about the video
     * @param VideoNote|null $video_note Message is a video note, information about the video message
     * @param Voice|null $voice Message is a voice message, information about the file
     * @param string|null $caption Caption for the animation, audio, document, photo, video or voice
     * @param MessageEntity[]|null $caption_entities For messages with a caption, special entities like usernames,
     * URLs, bot commands, etc. that appear in the caption
     * @param bool|null $has_media_spoiler True, if the message media is covered by a spoiler animation
     * @param Contact|null $contact Message is a shared contact, information about the contact
     * @param Dice|null $dice Message is a dice with random value
     * @param Game|null $game Message is a game, information about the game
     * @param Poll|null $poll Message is a native poll, information about the poll
     * @param Venue|null $venue Message is a venue, information about the venue.
     * For backward compatibility, when this field is set, the location field will also be set
     * @param Location|null $location Message is a shared location, information about the location
     * @param User[]|null $new_chat_members New members that were added to the group or supergroup and information about them
     * @param User|null $left_chat_member A member was removed from the group, information about them (this member may be the bot itself)
     * @param string|null $new_chat_title A chat title was changed to this value
     * @param PhotoSize[]|null $new_chat_photo A chat photo was change to this value
     * @param bool|null $delete_chat_photo Service message: the chat photo was deleted
     * @param bool|null $group_chat_created Service message: the group has been created
     * @param bool|null $supergroup_chat_created Service message: the supergroup has been created.
     * This field can't be received in a message coming through updates,
     * because the bot can't be a member of a supergroup when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     * @param bool|null $channel_chat_created Service message: the channel has been created.
     * This field can't be received in a message coming through updates,
     * because the bot can't be a member of a channel when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a channel.
     * @param MessageAutoDeleteTimerChanged|null $message_auto_delete_timer_changed
     * Service message: auto-delete timer settings changed in the chat
     * @param int|null $migrate_to_chat_id The group has been migrated to a supergroup with the specified identifier.
     * This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param int|null $migrate_from_chat_id The supergroup has been migrated from a group with the specified identifier.
     * This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param Message|InaccessibleMessage|null $pinned_message Specified message was pinned.
     * Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param Invoice|null $invoice Message is an invoice for a payment, information about the invoice
     * @param SuccessfulPayment|null $successful_payment Message is a service message about a successful payment, information about the payment
     * @param UsersShared|null $users_shared Service message: users were shared with the bot
     * @param ChatShared|null $chat_shared Service message: a chat was shared with the bot
     * @param string|null $connected_website The domain name of the website on which the user has logged in.
     * More about Telegram Login
     * @param WriteAccessAllowed|null $write_access_allowed
     * Service message: the user allowed the bot to write messages after adding it to the attachment or side menu,
     * launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
     * @param PassportData|null $passport_data Telegram Passport data
     * @param ProximityAlertTriggered|null $proximity_alert_triggered
     * Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     * @param ChatBoostAdded|null $boost_added Service message: user boosted the chat
     * @param ForumTopicCreated|null $forum_topic_created Service message: forum topic created
     * @param ForumTopicEdited|null $forum_topic_edited Service message: forum topic edited
     * @param ForumTopicClosed|null $forum_topic_closed Service message: forum topic closed
     * @param ForumTopicReopened|null $forum_topic_reopened Service message: forum topic reopened
     * @param GeneralForumTopicHidden|null $general_forum_topic_hidden Service message: the 'General' forum topic hidden
     * @param GeneralForumTopicUnhidden|null $general_forum_topic_unhidden Service message: the 'General' forum topic unhidden
     * @param GiveawayCreated|null $giveaway_created Service message: a scheduled giveaway was created
     * @param Giveaway|null $giveaway The message is a scheduled giveaway message
     * @param GiveawayWinners|null $giveaway_winners A giveaway with public winners was completed
     * @param GiveawayCompleted|null $giveaway_completed Service message: a giveaway without public winners was completed
     * @param VideoChatScheduled|null $video_chat_scheduled Service message: video chat scheduled
     * @param VideoChatStarted|null $video_chat_started Service message: video chat started
     * @param VideoChatEnded|null $video_chat_ended Service message: video chat ended
     * @param VideoChatParticipantsInvited|null $video_chat_participants_invited
     * Service message: new participants invited to a video chat
     * @param WebAppData|null $web_app_data Service message: data sent by a Web App
     * @param InlineKeyboardMarkup|null $reply_markup Inline keyboard attached to the message.
     * login_url buttons are represented as ordinary url buttons.
     * @param ChatBackground|null $chat_background_set Optional. Service message: chat background set
     * @param string|null $business_connection_id Optional. Unique identifier of the business connection from which the message was received.
     * If non-empty, the message belongs to a chat of the corresponding business account that is independent from any potential bot chat
     * which might share the same identifier.
     * @param User|null $sender_business_bot Optional. The bot that actually sent the message on behalf of the business account.
     * Available only for outgoing messages sent on behalf of the connected business account.
     * @param bool|null $is_from_offline Optional. True, if the message was sent by an implicit action, for example,
     * as an away or a greeting business message, or as a scheduled message
     */
    public function __construct(
        protected int $message_id,
        protected int $date,
        protected Chat $chat,
        private int|null $message_thread_id = null,
        private User|null $from = null,
        private Chat|null $sender_chat = null,
        private int|null $sender_boost_count = null,
        private AbstractMessageOrigin|null $forward_origin = null,
        private bool|null $is_topic_message = null,
        private bool|null $is_automatic_forward = null,
        private Message|null $reply_to_message = null,
        private ExternalReplyInfo|null $external_reply = null,
        private TextQuote|null $quote = null,
        private Story|null $reply_to_story = null,
        private User|null $via_bot = null,
        private int|null $edit_date = null,
        private bool|null $has_protected_content = null,
        private string|null $media_group_id = null,
        private string|null $author_signature = null,
        private string|null $text = null,
        #[ArrayType(MessageEntity::class)] private array|null $entities = null,
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
        private string|null $caption = null,
        #[ArrayType(MessageEntity::class)] private array|null $caption_entities = null,
        private bool|null $has_media_spoiler = null,
        private Contact|null $contact = null,
        private Dice|null $dice = null,
        private Game|null $game = null,
        private Poll|null $poll = null,
        private Venue|null $venue = null,
        private Location|null $location = null,
        #[ArrayType(User::class)] private array|null $new_chat_members = null,
        private User|null $left_chat_member = null,
        private string|null $new_chat_title = null,
        #[ArrayType(PhotoSize::class)] private array|null $new_chat_photo = null,
        private bool|null $delete_chat_photo = null,
        private bool|null $group_chat_created = null,
        private bool|null $supergroup_chat_created = null,
        private bool|null $channel_chat_created = null,
        private MessageAutoDeleteTimerChanged|null $message_auto_delete_timer_changed = null,
        private int|null $migrate_to_chat_id = null,
        private int|null $migrate_from_chat_id = null,
        private Message|InaccessibleMessage|null $pinned_message = null,
        private Invoice|null $invoice = null,
        private SuccessfulPayment|null $successful_payment = null,
        private UsersShared|null $users_shared = null,
        private ChatShared|null $chat_shared = null,
        private string|null $connected_website = null,
        private WriteAccessAllowed|null $write_access_allowed = null,
        private PassportData|null $passport_data = null,
        private ProximityAlertTriggered|null $proximity_alert_triggered = null,
        private ChatBoostAdded|null $boost_added = null,
        private ForumTopicCreated|null $forum_topic_created = null,
        private ForumTopicEdited|null $forum_topic_edited = null,
        private ForumTopicClosed|null $forum_topic_closed = null,
        private ForumTopicReopened|null $forum_topic_reopened = null,
        private GeneralForumTopicHidden|null $general_forum_topic_hidden = null,
        private GeneralForumTopicUnhidden|null $general_forum_topic_unhidden = null,
        private GiveawayCreated|null $giveaway_created = null,
        private Giveaway|null $giveaway = null,
        private GiveawayWinners|null $giveaway_winners = null,
        private GiveawayCompleted|null $giveaway_completed = null,
        private VideoChatScheduled|null $video_chat_scheduled = null,
        private VideoChatStarted|null $video_chat_started = null,
        private VideoChatEnded|null $video_chat_ended = null,
        private VideoChatParticipantsInvited|null $video_chat_participants_invited = null,
        private WebAppData|null $web_app_data = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private ChatBackground|null $chat_background_set = null,
        private string|null $business_connection_id = null,
        private User|null $sender_business_bot = null,
        private bool|null $is_from_offline = null,
    ) {
        parent::__construct($this->date);
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): Message
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): Message
    {
        $this->date = $date;
        return $this;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): Message
    {
        $this->chat = $chat;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): Message
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getFrom(): User|null
    {
        return $this->from;
    }

    public function setFrom(User|null $from): Message
    {
        $this->from = $from;
        return $this;
    }

    public function getSenderChat(): Chat|null
    {
        return $this->sender_chat;
    }

    public function setSenderChat(Chat|null $sender_chat): Message
    {
        $this->sender_chat = $sender_chat;
        return $this;
    }

    public function getSenderBoostCount(): int|null
    {
        return $this->sender_boost_count;
    }

    public function setSenderBoostCount(int|null $sender_boost_count): Message
    {
        $this->sender_boost_count = $sender_boost_count;
        return $this;
    }

    public function getForwardOrigin(): AbstractMessageOrigin|null
    {
        return $this->forward_origin;
    }

    public function setForwardOrigin(AbstractMessageOrigin|null $forward_origin): Message
    {
        $this->forward_origin = $forward_origin;
        return $this;
    }

    public function getIsTopicMessage(): bool|null
    {
        return $this->is_topic_message;
    }

    public function setIsTopicMessage(bool|null $is_topic_message): Message
    {
        $this->is_topic_message = $is_topic_message;
        return $this;
    }

    public function getIsAutomaticForward(): bool|null
    {
        return $this->is_automatic_forward;
    }

    public function setIsAutomaticForward(bool|null $is_automatic_forward): Message
    {
        $this->is_automatic_forward = $is_automatic_forward;
        return $this;
    }

    public function getReplyToMessage(): Message|null
    {
        return $this->reply_to_message;
    }

    public function setReplyToMessage(Message|null $reply_to_message): Message
    {
        $this->reply_to_message = $reply_to_message;
        return $this;
    }

    public function getExternalReply(): ExternalReplyInfo|null
    {
        return $this->external_reply;
    }

    public function setExternalReply(ExternalReplyInfo|null $external_reply): Message
    {
        $this->external_reply = $external_reply;
        return $this;
    }

    public function getQuote(): TextQuote|null
    {
        return $this->quote;
    }

    public function setQuote(TextQuote|null $quote): Message
    {
        $this->quote = $quote;
        return $this;
    }

    public function getReplyToStory(): Story|null
    {
        return $this->reply_to_story;
    }

    public function setReplyToStory(Story|null $reply_to_story): Message
    {
        $this->reply_to_story = $reply_to_story;
        return $this;
    }

    public function getViaBot(): User|null
    {
        return $this->via_bot;
    }

    public function setViaBot(User|null $via_bot): Message
    {
        $this->via_bot = $via_bot;
        return $this;
    }

    public function getEditDate(): int|null
    {
        return $this->edit_date;
    }

    public function setEditDate(int|null $edit_date): Message
    {
        $this->edit_date = $edit_date;
        return $this;
    }

    public function getHasProtectedContent(): bool|null
    {
        return $this->has_protected_content;
    }

    public function setHasProtectedContent(bool|null $has_protected_content): Message
    {
        $this->has_protected_content = $has_protected_content;
        return $this;
    }

    public function getMediaGroupId(): string|null
    {
        return $this->media_group_id;
    }

    public function setMediaGroupId(string|null $media_group_id): Message
    {
        $this->media_group_id = $media_group_id;
        return $this;
    }

    public function getAuthorSignature(): string|null
    {
        return $this->author_signature;
    }

    public function setAuthorSignature(string|null $author_signature): Message
    {
        $this->author_signature = $author_signature;
        return $this;
    }

    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(string|null $text): Message
    {
        $this->text = $text;
        return $this;
    }

    public function getEntities(): array|null
    {
        return $this->entities;
    }

    public function setEntities(array|null $entities): Message
    {
        $this->entities = $entities;
        return $this;
    }

    public function getLinkPreviewOptions(): LinkPreviewOptions|null
    {
        return $this->link_preview_options;
    }

    public function setLinkPreviewOptions(LinkPreviewOptions|null $link_preview_options): Message
    {
        $this->link_preview_options = $link_preview_options;
        return $this;
    }

    public function getAnimation(): Animation|null
    {
        return $this->animation;
    }

    public function setAnimation(Animation|null $animation): Message
    {
        $this->animation = $animation;
        return $this;
    }

    public function getAudio(): Audio|null
    {
        return $this->audio;
    }

    public function setAudio(Audio|null $audio): Message
    {
        $this->audio = $audio;
        return $this;
    }

    public function getDocument(): Document|null
    {
        return $this->document;
    }

    public function setDocument(Document|null $document): Message
    {
        $this->document = $document;
        return $this;
    }

    public function getPhoto(): array|null
    {
        return $this->photo;
    }

    public function setPhoto(array|null $photo): Message
    {
        $this->photo = $photo;
        return $this;
    }

    public function getSticker(): Sticker|null
    {
        return $this->sticker;
    }

    public function setSticker(Sticker|null $sticker): Message
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getStory(): Story|null
    {
        return $this->story;
    }

    public function setStory(Story|null $story): Message
    {
        $this->story = $story;
        return $this;
    }

    public function getVideo(): Video|null
    {
        return $this->video;
    }

    public function setVideo(Video|null $video): Message
    {
        $this->video = $video;
        return $this;
    }

    public function getVideoNote(): VideoNote|null
    {
        return $this->video_note;
    }

    public function setVideoNote(VideoNote|null $video_note): Message
    {
        $this->video_note = $video_note;
        return $this;
    }

    public function getVoice(): Voice|null
    {
        return $this->voice;
    }

    public function setVoice(Voice|null $voice): Message
    {
        $this->voice = $voice;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): Message
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): Message
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getHasMediaSpoiler(): bool|null
    {
        return $this->has_media_spoiler;
    }

    public function setHasMediaSpoiler(bool|null $has_media_spoiler): Message
    {
        $this->has_media_spoiler = $has_media_spoiler;
        return $this;
    }

    public function getContact(): Contact|null
    {
        return $this->contact;
    }

    public function setContact(Contact|null $contact): Message
    {
        $this->contact = $contact;
        return $this;
    }

    public function getDice(): Dice|null
    {
        return $this->dice;
    }

    public function setDice(Dice|null $dice): Message
    {
        $this->dice = $dice;
        return $this;
    }

    public function getGame(): Game|null
    {
        return $this->game;
    }

    public function setGame(Game|null $game): Message
    {
        $this->game = $game;
        return $this;
    }

    public function getPoll(): Poll|null
    {
        return $this->poll;
    }

    public function setPoll(Poll|null $poll): Message
    {
        $this->poll = $poll;
        return $this;
    }

    public function getVenue(): Venue|null
    {
        return $this->venue;
    }

    public function setVenue(Venue|null $venue): Message
    {
        $this->venue = $venue;
        return $this;
    }

    public function getLocation(): Location|null
    {
        return $this->location;
    }

    public function setLocation(Location|null $location): Message
    {
        $this->location = $location;
        return $this;
    }

    public function getNewChatMembers(): array|null
    {
        return $this->new_chat_members;
    }

    public function setNewChatMembers(array|null $new_chat_members): Message
    {
        $this->new_chat_members = $new_chat_members;
        return $this;
    }

    public function getLeftChatMember(): User|null
    {
        return $this->left_chat_member;
    }

    public function setLeftChatMember(User|null $left_chat_member): Message
    {
        $this->left_chat_member = $left_chat_member;
        return $this;
    }

    public function getNewChatTitle(): string|null
    {
        return $this->new_chat_title;
    }

    public function setNewChatTitle(string|null $new_chat_title): Message
    {
        $this->new_chat_title = $new_chat_title;
        return $this;
    }

    public function getNewChatPhoto(): array|null
    {
        return $this->new_chat_photo;
    }

    public function setNewChatPhoto(array|null $new_chat_photo): Message
    {
        $this->new_chat_photo = $new_chat_photo;
        return $this;
    }

    public function getDeleteChatPhoto(): bool|null
    {
        return $this->delete_chat_photo;
    }

    public function setDeleteChatPhoto(bool|null $delete_chat_photo): Message
    {
        $this->delete_chat_photo = $delete_chat_photo;
        return $this;
    }

    public function getGroupChatCreated(): bool|null
    {
        return $this->group_chat_created;
    }

    public function setGroupChatCreated(bool|null $group_chat_created): Message
    {
        $this->group_chat_created = $group_chat_created;
        return $this;
    }

    public function getSupergroupChatCreated(): bool|null
    {
        return $this->supergroup_chat_created;
    }

    public function setSupergroupChatCreated(bool|null $supergroup_chat_created): Message
    {
        $this->supergroup_chat_created = $supergroup_chat_created;
        return $this;
    }

    public function getChannelChatCreated(): bool|null
    {
        return $this->channel_chat_created;
    }

    public function setChannelChatCreated(bool|null $channel_chat_created): Message
    {
        $this->channel_chat_created = $channel_chat_created;
        return $this;
    }

    public function getMessageAutoDeleteTimerChanged(): MessageAutoDeleteTimerChanged|null
    {
        return $this->message_auto_delete_timer_changed;
    }

    public function setMessageAutoDeleteTimerChanged(MessageAutoDeleteTimerChanged|null $message_auto_delete_timer_changed): Message
    {
        $this->message_auto_delete_timer_changed = $message_auto_delete_timer_changed;
        return $this;
    }

    public function getMigrateToChatId(): int|null
    {
        return $this->migrate_to_chat_id;
    }

    public function setMigrateToChatId(int|null $migrate_to_chat_id): Message
    {
        $this->migrate_to_chat_id = $migrate_to_chat_id;
        return $this;
    }

    public function getMigrateFromChatId(): int|null
    {
        return $this->migrate_from_chat_id;
    }

    public function setMigrateFromChatId(int|null $migrate_from_chat_id): Message
    {
        $this->migrate_from_chat_id = $migrate_from_chat_id;
        return $this;
    }

    public function getPinnedMessage(): Message|InaccessibleMessage|null
    {
        return $this->pinned_message;
    }

    public function setPinnedMessage(Message|InaccessibleMessage|null $pinned_message): Message
    {
        $this->pinned_message = $pinned_message;
        return $this;
    }

    public function getInvoice(): Invoice|null
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice|null $invoice): Message
    {
        $this->invoice = $invoice;
        return $this;
    }

    public function getSuccessfulPayment(): SuccessfulPayment|null
    {
        return $this->successful_payment;
    }

    public function setSuccessfulPayment(SuccessfulPayment|null $successful_payment): Message
    {
        $this->successful_payment = $successful_payment;
        return $this;
    }

    public function getUsersShared(): UsersShared|null
    {
        return $this->users_shared;
    }

    public function setUsersShared(UsersShared|null $users_shared): Message
    {
        $this->users_shared = $users_shared;
        return $this;
    }

    public function getChatShared(): ChatShared|null
    {
        return $this->chat_shared;
    }

    public function setChatShared(ChatShared|null $chat_shared): Message
    {
        $this->chat_shared = $chat_shared;
        return $this;
    }

    public function getConnectedWebsite(): string|null
    {
        return $this->connected_website;
    }

    public function setConnectedWebsite(string|null $connected_website): Message
    {
        $this->connected_website = $connected_website;
        return $this;
    }

    public function getWriteAccessAllowed(): WriteAccessAllowed|null
    {
        return $this->write_access_allowed;
    }

    public function setWriteAccessAllowed(WriteAccessAllowed|null $write_access_allowed): Message
    {
        $this->write_access_allowed = $write_access_allowed;
        return $this;
    }

    public function getPassportData(): PassportData|null
    {
        return $this->passport_data;
    }

    public function setPassportData(PassportData|null $passport_data): Message
    {
        $this->passport_data = $passport_data;
        return $this;
    }

    public function getProximityAlertTriggered(): ProximityAlertTriggered|null
    {
        return $this->proximity_alert_triggered;
    }

    public function setProximityAlertTriggered(ProximityAlertTriggered|null $proximity_alert_triggered): Message
    {
        $this->proximity_alert_triggered = $proximity_alert_triggered;
        return $this;
    }

    public function getBoostAdded(): ChatBoostAdded|null
    {
        return $this->boost_added;
    }

    public function setBoostAdded(ChatBoostAdded|null $boost_added): Message
    {
        $this->boost_added = $boost_added;
        return $this;
    }

    public function getForumTopicCreated(): ForumTopicCreated|null
    {
        return $this->forum_topic_created;
    }

    public function setForumTopicCreated(ForumTopicCreated|null $forum_topic_created): Message
    {
        $this->forum_topic_created = $forum_topic_created;
        return $this;
    }

    public function getForumTopicEdited(): ForumTopicEdited|null
    {
        return $this->forum_topic_edited;
    }

    public function setForumTopicEdited(ForumTopicEdited|null $forum_topic_edited): Message
    {
        $this->forum_topic_edited = $forum_topic_edited;
        return $this;
    }

    public function getForumTopicClosed(): ForumTopicClosed|null
    {
        return $this->forum_topic_closed;
    }

    public function setForumTopicClosed(ForumTopicClosed|null $forum_topic_closed): Message
    {
        $this->forum_topic_closed = $forum_topic_closed;
        return $this;
    }

    public function getForumTopicReopened(): ForumTopicReopened|null
    {
        return $this->forum_topic_reopened;
    }

    public function setForumTopicReopened(ForumTopicReopened|null $forum_topic_reopened): Message
    {
        $this->forum_topic_reopened = $forum_topic_reopened;
        return $this;
    }

    public function getGeneralForumTopicHidden(): GeneralForumTopicHidden|null
    {
        return $this->general_forum_topic_hidden;
    }

    public function setGeneralForumTopicHidden(GeneralForumTopicHidden|null $general_forum_topic_hidden): Message
    {
        $this->general_forum_topic_hidden = $general_forum_topic_hidden;
        return $this;
    }

    public function getGeneralForumTopicUnhidden(): GeneralForumTopicUnhidden|null
    {
        return $this->general_forum_topic_unhidden;
    }

    public function setGeneralForumTopicUnhidden(GeneralForumTopicUnhidden|null $general_forum_topic_unhidden): Message
    {
        $this->general_forum_topic_unhidden = $general_forum_topic_unhidden;
        return $this;
    }

    public function getGiveawayCreated(): GiveawayCreated|null
    {
        return $this->giveaway_created;
    }

    public function setGiveawayCreated(GiveawayCreated|null $giveaway_created): Message
    {
        $this->giveaway_created = $giveaway_created;
        return $this;
    }

    public function getGiveaway(): Giveaway|null
    {
        return $this->giveaway;
    }

    public function setGiveaway(Giveaway|null $giveaway): Message
    {
        $this->giveaway = $giveaway;
        return $this;
    }

    public function getGiveawayWinners(): GiveawayWinners|null
    {
        return $this->giveaway_winners;
    }

    public function setGiveawayWinners(GiveawayWinners|null $giveaway_winners): Message
    {
        $this->giveaway_winners = $giveaway_winners;
        return $this;
    }

    public function getGiveawayCompleted(): GiveawayCompleted|null
    {
        return $this->giveaway_completed;
    }

    public function setGiveawayCompleted(GiveawayCompleted|null $giveaway_completed): Message
    {
        $this->giveaway_completed = $giveaway_completed;
        return $this;
    }

    public function getVideoChatScheduled(): VideoChatScheduled|null
    {
        return $this->video_chat_scheduled;
    }

    public function setVideoChatScheduled(VideoChatScheduled|null $video_chat_scheduled): Message
    {
        $this->video_chat_scheduled = $video_chat_scheduled;
        return $this;
    }

    public function getVideoChatStarted(): VideoChatStarted|null
    {
        return $this->video_chat_started;
    }

    public function setVideoChatStarted(VideoChatStarted|null $video_chat_started): Message
    {
        $this->video_chat_started = $video_chat_started;
        return $this;
    }

    public function getVideoChatEnded(): VideoChatEnded|null
    {
        return $this->video_chat_ended;
    }

    public function setVideoChatEnded(VideoChatEnded|null $video_chat_ended): Message
    {
        $this->video_chat_ended = $video_chat_ended;
        return $this;
    }

    public function getVideoChatParticipantsInvited(): VideoChatParticipantsInvited|null
    {
        return $this->video_chat_participants_invited;
    }

    public function setVideoChatParticipantsInvited(VideoChatParticipantsInvited|null $video_chat_participants_invited): Message
    {
        $this->video_chat_participants_invited = $video_chat_participants_invited;
        return $this;
    }

    public function getWebAppData(): WebAppData|null
    {
        return $this->web_app_data;
    }

    public function setWebAppData(WebAppData|null $web_app_data): Message
    {
        $this->web_app_data = $web_app_data;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): Message
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getChatBackgroundSet(): ChatBackground|null
    {
        return $this->chat_background_set;
    }

    public function setChatBackgroundSet(ChatBackground|null $chat_background_set): Message
    {
        $this->chat_background_set = $chat_background_set;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): Message
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getSenderBusinessBot(): User|null
    {
        return $this->sender_business_bot;
    }

    public function setSenderBusinessBot(User|null $sender_business_bot): Message
    {
        $this->sender_business_bot = $sender_business_bot;
        return $this;
    }

    public function getIsFromOffline(): bool|null
    {
        return $this->is_from_offline;
    }

    public function setIsFromOffline(bool|null $is_from_offline): Message
    {
        $this->is_from_offline = $is_from_offline;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'message_id' => $this->message_id,
            'message_thread_id' => $this->message_thread_id,
            'from' => $this->from?->toArray(),
            'sender_chat' => $this->sender_chat?->toArray(),
            'sender_boost_count' => $this->sender_boost_count,
            'date' => $this->date,
            'chat' => $this->chat->toArray(),
            'forward_origin' => $this->forward_origin?->toArray(),
            'is_topic_message' => $this->is_topic_message,
            'is_automatic_forward' => $this->is_automatic_forward,
            'reply_to_message' => $this->reply_to_message?->toArray(),
            'external_reply' => $this->external_reply?->toArray(),
            'quote' => $this->quote?->toArray(),
            'reply_to_story' => $this->reply_to_story?->toArray(),
            'via_bot' => $this->via_bot?->toArray(),
            'edit_date' => $this->edit_date,
            'has_protected_content' => $this->has_protected_content,
            'media_group_id' => $this->media_group_id,
            'author_signature' => $this->author_signature,
            'text' => $this->text,
            'entities' => $this->entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->entities,
                )
                : null,
            'link_preview_options' => $this->link_preview_options?->toArray(),
            'animation' => $this->animation?->toArray(),
            'audio' => $this->audio?->toArray(),
            'document' => $this->document?->toArray(),
            'photo' => $this->photo !== null
                ? array_map(
                    fn(PhotoSize $p) => $p->toArray(),
                    $this->photo,
                )
                : null,
            'sticker' => $this->sticker?->toArray(),
            'story' => $this->story?->toArray(),
            'video' => $this->video?->toArray(),
            'video_note' => $this->video_note?->toArray(),
            'voice' => $this->voice?->toArray(),
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->caption_entities,
                )
                : null,
            'has_media_spoiler' => $this->has_media_spoiler,
            'contact' => $this->contact?->toArray(),
            'dice' => $this->dice?->toArray(),
            'game' => $this->game?->toArray(),
            'poll' => $this->poll?->toArray(),
            'venue' => $this->venue?->toArray(),
            'location' => $this->location?->toArray(),
            'new_chat_members' => $this->new_chat_members !== null
                ? array_map(
                    fn(User $u) => $u->toArray(),
                    $this->new_chat_members,
                )
                : null,
            'left_chat_member' => $this->left_chat_member?->toArray(),
            'new_chat_title' => $this->new_chat_title,
            'new_chat_photo' => $this->new_chat_photo !== null
                ? array_map(
                    fn(PhotoSize $p) => $p->toArray(),
                    $this->new_chat_photo,
                )
                : null,
            'delete_chat_photo' => $this->delete_chat_photo,
            'group_chat_created' => $this->group_chat_created,
            'supergroup_chat_created' => $this->supergroup_chat_created,
            'channel_chat_created' => $this->channel_chat_created,
            'message_auto_delete_timer_changed' => $this->message_auto_delete_timer_changed?->toArray(),
            'migrate_to_chat_id' => $this->migrate_to_chat_id,
            'migrate_from_chat_id' => $this->migrate_from_chat_id,
            'pinned_message' => $this->pinned_message?->toArray(),
            'invoice' => $this->invoice?->toArray(),
            'successful_payment' => $this->successful_payment?->toArray(),
            'users_shared' => $this->users_shared?->toArray(),
            'chat_shared' => $this->chat_shared?->toArray(),
            'connected_website' => $this->connected_website,
            'write_access_allowed' => $this->write_access_allowed?->toArray(),
            'passport_data' => $this->passport_data?->toArray(),
            'proximity_alert_triggered' => $this->proximity_alert_triggered?->toArray(),
            'boost_added' => $this->boost_added?->toArray(),
            'forum_topic_created' => $this->forum_topic_created?->toArray(),
            'forum_topic_edited' => $this->forum_topic_edited?->toArray(),
            'forum_topic_closed' => $this->forum_topic_closed?->toArray(),
            'forum_topic_reopened' => $this->forum_topic_reopened?->toArray(),
            'general_forum_topic_hidden' => $this->general_forum_topic_hidden?->toArray(),
            'general_forum_topic_unhidden' => $this->general_forum_topic_unhidden?->toArray(),
            'giveaway_created' => $this->giveaway_created?->toArray(),
            'giveaway' => $this->giveaway?->toArray(),
            'giveaway_winners' => $this->giveaway_winners?->toArray(),
            'giveaway_completed' => $this->giveaway_completed?->toArray(),
            'video_chat_scheduled' => $this->video_chat_scheduled?->toArray(),
            'video_chat_started' => $this->video_chat_started?->toArray(),
            'video_chat_ended' => $this->video_chat_ended?->toArray(),
            'video_chat_participants_invited' => $this->video_chat_participants_invited?->toArray(),
            'web_app_data' => $this->web_app_data?->toArray(),
            'reply_markup' => $this->reply_markup?->toArray(),
            'chat_background_set' => $this->chat_background_set?->toArray(),
            'business_connection_id' => $this->business_connection_id,
            'sender_business_bot' => $this->sender_business_bot?->toArray(),
            'is_from_offline' => $this->is_from_offline,
        ];
    }
}
