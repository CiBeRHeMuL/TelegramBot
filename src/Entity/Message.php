<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;

/**
 * This object represents a message.
 *
 * @link https://core.telegram.org/bots/api#message
 */
#[BuildIf(new FieldCompareChecker('date', 0, CompareOperatorEnum::NotEqual))]
final class Message extends AbstractMaybeInaccessibleMessage
{
    /**
     * @param int $message_id Unique message identifier inside this chat. In specific instances (e.g., message containing a video
     * sent to a big chat), the server might automatically schedule a message instead of sending it immediately. In such cases, this
     * field will be 0 and the relevant message will be unusable until it is actually sent
     * @param int $date Date the message was sent in Unix time. It is always a positive number, representing a valid date.
     * @param Chat $chat Chat the message belongs to
     * @param int|null $message_thread_id Optional. Unique identifier of a message thread or forum topic to which the message belongs;
     * for supergroups and private chats only
     * @param User|null $from Optional. Sender of the message; may be empty for messages sent to channels. For backward compatibility,
     * if the message was sent on behalf of a chat, the field contains a fake sender user in non-channel chats
     * @param Chat|null $sender_chat Optional. Sender of the message when sent on behalf of a chat. For example, the supergroup itself
     * for messages sent by its anonymous administrators or a linked channel for messages automatically forwarded to the channel's
     * discussion group. For backward compatibility, if the message was sent on behalf of a chat, the field from contains a fake
     * sender user in non-channel chats.
     * @param int|null $sender_boost_count Optional. If the sender of the message boosted the chat, the number of boosts added by
     * the user
     * @param AbstractMessageOrigin|null $forward_origin Optional. Information about the original message for forwarded messages
     * @param bool|null $is_topic_message Optional. True, if the message is sent to a topic in a forum supergroup or a private chat
     * with the bot
     * @param bool|null $is_automatic_forward Optional. True, if the message is a channel post that was automatically forwarded to
     * the connected discussion group
     * @param Message|null $reply_to_message Optional. For replies in the same chat and message thread, the original message. Note
     * that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param ExternalReplyInfo|null $external_reply Optional. Information about the message that is being replied to, which may
     * come from another chat or forum topic
     * @param TextQuote|null $quote Optional. For replies that quote part of the original message, the quoted part of the message
     * @param Story|null $reply_to_story Optional. For replies to a story, the original story
     * @param User|null $via_bot Optional. Bot through which the message was sent
     * @param int|null $edit_date Optional. Date the message was last edited in Unix time
     * @param bool|null $has_protected_content Optional. True, if the message can't be forwarded
     * @param string|null $media_group_id Optional. The unique identifier of a media message group this message belongs to
     * @param string|null $author_signature Optional. Signature of the post author for messages in channels, or the custom title
     * of an anonymous group administrator
     * @param string|null $text Optional. For text messages, the actual UTF-8 text of the message
     * @param MessageEntity[]|null $entities Optional. For text messages, special entities like usernames, URLs, bot commands, etc.
     * that appear in the text
     * @param LinkPreviewOptions|null $link_preview_options Optional. Options used for link preview generation for the message, if
     * it is a text message and link preview options were changed
     * @param Animation|null $animation Optional. Message is an animation, information about the animation. For backward compatibility,
     * when this field is set, the document field will also be set
     * @param Audio|null $audio Optional. Message is an audio file, information about the file
     * @param Document|null $document Optional. Message is a general file, information about the file
     * @param PhotoSize[]|null $photo Optional. Message is a photo, available sizes of the photo
     * @param Sticker|null $sticker Optional. Message is a sticker, information about the sticker
     * @param Story|null $story Optional. Message is a forwarded story
     * @param Video|null $video Optional. Message is a video, information about the video
     * @param VideoNote|null $video_note Optional. Message is a video note, information about the video message
     * @param Voice|null $voice Optional. Message is a voice message, information about the file
     * @param string|null $caption Optional. Caption for the animation, audio, document, paid media, photo, video or voice
     * @param MessageEntity[]|null $caption_entities Optional. For messages with a caption, special entities like usernames, URLs,
     * bot commands, etc. that appear in the caption
     * @param bool|null $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation
     * @param Contact|null $contact Optional. Message is a shared contact, information about the contact
     * @param Dice|null $dice Optional. Message is a dice with random value
     * @param Game|null $game Optional. Message is a game, information about the game. More about games »
     * @param Poll|null $poll Optional. Message is a native poll, information about the poll
     * @param Venue|null $venue Optional. Message is a venue, information about the venue. For backward compatibility, when this
     * field is set, the location field will also be set
     * @param Location|null $location Optional. Message is a shared location, information about the location
     * @param User[]|null $new_chat_members Optional. New members that were added to the group or supergroup and information about
     * them (the bot itself may be one of these members)
     * @param User|null $left_chat_member Optional. A member was removed from the group, information about them (this member may
     * be the bot itself)
     * @param string|null $new_chat_title Optional. A chat title was changed to this value
     * @param PhotoSize[]|null $new_chat_photo Optional. A chat photo was change to this value
     * @param bool|null $delete_chat_photo Optional. Service message: the chat photo was deleted
     * @param bool|null $group_chat_created Optional. Service message: the group has been created
     * @param bool|null $supergroup_chat_created Optional. Service message: the supergroup has been created. This field can't be
     * received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only
     * be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     * @param bool|null $channel_chat_created Optional. Service message: the channel has been created. This field can't be received
     * in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in
     * reply_to_message if someone replies to a very first message in a channel.
     * @param MessageAutoDeleteTimerChanged|null $message_auto_delete_timer_changed Optional. Service message: auto-delete timer
     * settings changed in the chat
     * @param int|null $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This
     * number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting
     * it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     * @param int|null $migrate_from_chat_id Optional. The supergroup has been migrated from a group with the specified identifier.
     * This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting
     * it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     * @param AbstractMaybeInaccessibleMessage|null $pinned_message Optional. Specified message was pinned. Note that the Message
     * object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param Invoice|null $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments
     * »
     * @param SuccessfulPayment|null $successful_payment Optional. Message is a service message about a successful payment, information
     * about the payment. More about payments »
     * @param UsersShared|null $users_shared Optional. Service message: users were shared with the bot
     * @param ChatShared|null $chat_shared Optional. Service message: a chat was shared with the bot
     * @param string|null $connected_website Optional. The domain name of the website on which the user has logged in. More about
     * Telegram Login »
     * @param WriteAccessAllowed|null $write_access_allowed Optional. Service message: the user allowed the bot to write messages
     * after adding it to the attachment or side menu, launching a Web App from a link, or accepting an explicit request from a Web
     * App sent by the method requestWriteAccess
     * @param PassportData|null $passport_data Optional. Telegram Passport data
     * @param ProximityAlertTriggered|null $proximity_alert_triggered Optional. Service message. A user in the chat triggered another
     * user's proximity alert while sharing Live Location.
     * @param ChatBoostAdded|null $boost_added Optional. Service message: user boosted the chat
     * @param ForumTopicCreated|null $forum_topic_created Optional. Service message: forum topic created
     * @param ForumTopicEdited|null $forum_topic_edited Optional. Service message: forum topic edited
     * @param ForumTopicClosed|null $forum_topic_closed Optional. Service message: forum topic closed
     * @param ForumTopicReopened|null $forum_topic_reopened Optional. Service message: forum topic reopened
     * @param GeneralForumTopicHidden|null $general_forum_topic_hidden Optional. Service message: the 'General' forum topic hidden
     * @param GeneralForumTopicUnhidden|null $general_forum_topic_unhidden Optional. Service message: the 'General' forum topic unhidden
     * @param GiveawayCreated|null $giveaway_created Optional. Service message: a scheduled giveaway was created
     * @param Giveaway|null $giveaway Optional. The message is a scheduled giveaway message
     * @param GiveawayWinners|null $giveaway_winners Optional. A giveaway with public winners was completed
     * @param GiveawayCompleted|null $giveaway_completed Optional. Service message: a giveaway without public winners was completed
     * @param VideoChatScheduled|null $video_chat_scheduled Optional. Service message: video chat scheduled
     * @param VideoChatStarted|null $video_chat_started Optional. Service message: video chat started
     * @param VideoChatEnded|null $video_chat_ended Optional. Service message: video chat ended
     * @param VideoChatParticipantsInvited|null $video_chat_participants_invited Optional. Service message: new participants invited
     * to a video chat
     * @param WebAppData|null $web_app_data Optional. Service message: data sent by a Web App
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message. login_url buttons are represented
     * as ordinary url buttons.
     * @param ChatBackground|null $chat_background_set Optional. Service message: chat background set
     * @param string|null $business_connection_id Optional. Unique identifier of the business connection from which the message was
     * received. If non-empty, the message belongs to a chat of the corresponding business account that is independent from any potential
     * bot chat which might share the same identifier.
     * @param User|null $sender_business_bot Optional. The bot that actually sent the message on behalf of the business account.
     * Available only for outgoing messages sent on behalf of the connected business account.
     * @param bool|null $is_from_offline Optional. True, if the message was sent by an implicit action, for example, as an away or
     * a greeting business message, or as a scheduled message
     * @param string|null $effect_id Optional. Unique identifier of the message effect added to the message
     * @param bool|null $show_caption_above_media Optional. True, if the caption must be shown above the message media
     * @param PaidMediaInfo|null $paid_media Optional. Message contains paid media; information about the paid media
     * @param RefundedPayment|null $refunded_payment Optional. Message is a service message about a refunded payment, information
     * about the payment. More about payments »
     * @param GiftInfo|null $gift Optional. Service message: a regular gift was sent or received
     * @param UniqueGiftInfo|null $unique_gift Optional. Service message: a unique gift was sent or received
     * @param PaidMessagePriceChanged|null $paid_message_price_changed Optional. Service message: the price for paid messages has
     * changed in the chat
     * @param int|null $paid_star_count Optional. The number of Telegram Stars that were paid by the sender of the message to send
     * it
     * @param Checklist|null $checklist Optional. Message is a checklist
     * @param ChecklistTasksDone|null $checklist_tasks_done Optional. Service message: some tasks in a checklist were marked as done
     * or not done
     * @param ChecklistTasksAdded|null $checklist_tasks_added Optional. Service message: tasks were added to a checklist
     * @param DirectMessagePriceChanged|null $direct_message_price_changed Optional. Service message: the price for paid messages
     * in the corresponding direct messages chat of a channel has changed
     * @param DirectMessagesTopic|null $direct_messages_topic Optional. Information about the direct messages chat topic that contains
     * the message
     * @param int|null $reply_to_checklist_task_id Optional. Identifier of the specific checklist task that is being replied to
     * @param bool|null $is_paid_post Optional. True, if the message is a paid post. Note that such posts must not be deleted for
     * 24 hours to receive the payment and can't be edited.
     * @param SuggestedPostInfo|null $suggested_post_info Optional. Information about suggested post parameters if the message is
     * a suggested post in a channel direct messages chat. If the message is an approved or declined suggested post, then it can't
     * be edited.
     * @param SuggestedPostApproved|null $suggested_post_approved Optional. Service message: a suggested post was approved
     * @param SuggestedPostApprovalFailed|null $suggested_post_approval_failed Optional. Service message: approval of a suggested
     * post has failed
     * @param SuggestedPostDeclined|null $suggested_post_declined Optional. Service message: a suggested post was declined
     * @param SuggestedPostPaid|null $suggested_post_paid Optional. Service message: payment for a suggested post was received
     * @param SuggestedPostRefunded|null $suggested_post_refunded Optional. Service message: payment for a suggested post was refunded
     * @param GiftInfo|null $gift_upgrade_sent Optional. Service message: upgrade of a gift was purchased after the gift was sent
     *
     * @see https://core.telegram.org/bots/api#directmessagestopic DirectMessagesTopic
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#messageorigin MessageOrigin
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#externalreplyinfo ExternalReplyInfo
     * @see https://core.telegram.org/bots/api#textquote TextQuote
     * @see https://core.telegram.org/bots/api#story Story
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#linkpreviewoptions LinkPreviewOptions
     * @see https://core.telegram.org/bots/api#suggestedpostinfo SuggestedPostInfo
     * @see https://core.telegram.org/bots/api#animation Animation
     * @see https://core.telegram.org/bots/api#audio Audio
     * @see https://core.telegram.org/bots/api#document Document
     * @see https://core.telegram.org/bots/api#paidmediainfo PaidMediaInfo
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     * @see https://core.telegram.org/bots/api#sticker Sticker
     * @see https://core.telegram.org/bots/api#video Video
     * @see https://core.telegram.org/bots/api#videonote VideoNote
     * @see https://telegram.org/blog/video-messages-and-telescope video note
     * @see https://core.telegram.org/bots/api#voice Voice
     * @see https://core.telegram.org/bots/api#checklist Checklist
     * @see https://core.telegram.org/bots/api#contact Contact
     * @see https://core.telegram.org/bots/api#dice Dice
     * @see https://core.telegram.org/bots/api#game Game
     * @see https://core.telegram.org/bots/api#games More about games »
     * @see https://core.telegram.org/bots/api#poll Poll
     * @see https://core.telegram.org/bots/api#venue Venue
     * @see https://core.telegram.org/bots/api#location Location
     * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged MessageAutoDeleteTimerChanged
     * @see https://core.telegram.org/bots/api#maybeinaccessiblemessage MaybeInaccessibleMessage
     * @see https://core.telegram.org/bots/api#invoice Invoice
     * @see https://core.telegram.org/bots/api#payments More about payments »
     * @see https://core.telegram.org/bots/api#successfulpayment SuccessfulPayment
     * @see https://core.telegram.org/bots/api#refundedpayment RefundedPayment
     * @see https://core.telegram.org/bots/api#usersshared UsersShared
     * @see https://core.telegram.org/bots/api#chatshared ChatShared
     * @see https://core.telegram.org/bots/api#giftinfo GiftInfo
     * @see https://core.telegram.org/bots/api#uniquegiftinfo UniqueGiftInfo
     * @see https://core.telegram.org/widgets/login More about Telegram Login »
     * @see https://core.telegram.org/bots/api#writeaccessallowed WriteAccessAllowed
     * @see https://core.telegram.org/bots/webapps#initializing-mini-apps requestWriteAccess
     * @see https://core.telegram.org/bots/api#passportdata PassportData
     * @see https://core.telegram.org/bots/api#proximityalerttriggered ProximityAlertTriggered
     * @see https://core.telegram.org/bots/api#chatboostadded ChatBoostAdded
     * @see https://core.telegram.org/bots/api#chatbackground ChatBackground
     * @see https://core.telegram.org/bots/api#checklisttasksdone ChecklistTasksDone
     * @see https://core.telegram.org/bots/api#checklisttasksadded ChecklistTasksAdded
     * @see https://core.telegram.org/bots/api#directmessagepricechanged DirectMessagePriceChanged
     * @see https://core.telegram.org/bots/api#forumtopiccreated ForumTopicCreated
     * @see https://core.telegram.org/bots/api#forumtopicedited ForumTopicEdited
     * @see https://core.telegram.org/bots/api#forumtopicclosed ForumTopicClosed
     * @see https://core.telegram.org/bots/api#forumtopicreopened ForumTopicReopened
     * @see https://core.telegram.org/bots/api#generalforumtopichidden GeneralForumTopicHidden
     * @see https://core.telegram.org/bots/api#generalforumtopicunhidden GeneralForumTopicUnhidden
     * @see https://core.telegram.org/bots/api#giveawaycreated GiveawayCreated
     * @see https://core.telegram.org/bots/api#giveaway Giveaway
     * @see https://core.telegram.org/bots/api#giveawaywinners GiveawayWinners
     * @see https://core.telegram.org/bots/api#giveawaycompleted GiveawayCompleted
     * @see https://core.telegram.org/bots/api#paidmessagepricechanged PaidMessagePriceChanged
     * @see https://core.telegram.org/bots/api#suggestedpostapproved SuggestedPostApproved
     * @see https://core.telegram.org/bots/api#suggestedpostapprovalfailed SuggestedPostApprovalFailed
     * @see https://core.telegram.org/bots/api#suggestedpostdeclined SuggestedPostDeclined
     * @see https://core.telegram.org/bots/api#suggestedpostpaid SuggestedPostPaid
     * @see https://core.telegram.org/bots/api#suggestedpostrefunded SuggestedPostRefunded
     * @see https://core.telegram.org/bots/api#videochatscheduled VideoChatScheduled
     * @see https://core.telegram.org/bots/api#videochatstarted VideoChatStarted
     * @see https://core.telegram.org/bots/api#videochatended VideoChatEnded
     * @see https://core.telegram.org/bots/api#videochatparticipantsinvited VideoChatParticipantsInvited
     * @see https://core.telegram.org/bots/api#webappdata WebAppData
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     */
    public function __construct(
        protected int $message_id,
        protected int $date,
        protected Chat $chat,
        protected ?int $message_thread_id = null,
        protected ?User $from = null,
        protected ?Chat $sender_chat = null,
        protected ?int $sender_boost_count = null,
        protected ?AbstractMessageOrigin $forward_origin = null,
        protected ?bool $is_topic_message = null,
        protected ?bool $is_automatic_forward = null,
        protected ?Message $reply_to_message = null,
        protected ?ExternalReplyInfo $external_reply = null,
        protected ?TextQuote $quote = null,
        protected ?Story $reply_to_story = null,
        protected ?User $via_bot = null,
        protected ?int $edit_date = null,
        protected ?bool $has_protected_content = null,
        protected ?string $media_group_id = null,
        protected ?string $author_signature = null,
        protected ?string $text = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $entities = null,
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
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?bool $has_media_spoiler = null,
        protected ?Contact $contact = null,
        protected ?Dice $dice = null,
        protected ?Game $game = null,
        protected ?Poll $poll = null,
        protected ?Venue $venue = null,
        protected ?Location $location = null,
        #[ArrayType(User::class)]
        protected ?array $new_chat_members = null,
        protected ?User $left_chat_member = null,
        protected ?string $new_chat_title = null,
        #[ArrayType(PhotoSize::class)]
        protected ?array $new_chat_photo = null,
        protected ?bool $delete_chat_photo = null,
        protected ?bool $group_chat_created = null,
        protected ?bool $supergroup_chat_created = null,
        protected ?bool $channel_chat_created = null,
        protected ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed = null,
        protected ?int $migrate_to_chat_id = null,
        protected ?int $migrate_from_chat_id = null,
        protected ?AbstractMaybeInaccessibleMessage $pinned_message = null,
        protected ?Invoice $invoice = null,
        protected ?SuccessfulPayment $successful_payment = null,
        protected ?UsersShared $users_shared = null,
        protected ?ChatShared $chat_shared = null,
        protected ?string $connected_website = null,
        protected ?WriteAccessAllowed $write_access_allowed = null,
        protected ?PassportData $passport_data = null,
        protected ?ProximityAlertTriggered $proximity_alert_triggered = null,
        protected ?ChatBoostAdded $boost_added = null,
        protected ?ForumTopicCreated $forum_topic_created = null,
        protected ?ForumTopicEdited $forum_topic_edited = null,
        protected ?ForumTopicClosed $forum_topic_closed = null,
        protected ?ForumTopicReopened $forum_topic_reopened = null,
        protected ?GeneralForumTopicHidden $general_forum_topic_hidden = null,
        protected ?GeneralForumTopicUnhidden $general_forum_topic_unhidden = null,
        protected ?GiveawayCreated $giveaway_created = null,
        protected ?Giveaway $giveaway = null,
        protected ?GiveawayWinners $giveaway_winners = null,
        protected ?GiveawayCompleted $giveaway_completed = null,
        protected ?VideoChatScheduled $video_chat_scheduled = null,
        protected ?VideoChatStarted $video_chat_started = null,
        protected ?VideoChatEnded $video_chat_ended = null,
        protected ?VideoChatParticipantsInvited $video_chat_participants_invited = null,
        protected ?WebAppData $web_app_data = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
        protected ?ChatBackground $chat_background_set = null,
        protected ?string $business_connection_id = null,
        protected ?User $sender_business_bot = null,
        protected ?bool $is_from_offline = null,
        protected ?string $effect_id = null,
        protected ?bool $show_caption_above_media = null,
        protected ?PaidMediaInfo $paid_media = null,
        protected ?RefundedPayment $refunded_payment = null,
        protected ?GiftInfo $gift = null,
        protected ?UniqueGiftInfo $unique_gift = null,
        protected ?PaidMessagePriceChanged $paid_message_price_changed = null,
        protected ?int $paid_star_count = null,
        protected ?Checklist $checklist = null,
        protected ?ChecklistTasksDone $checklist_tasks_done = null,
        protected ?ChecklistTasksAdded $checklist_tasks_added = null,
        protected ?DirectMessagePriceChanged $direct_message_price_changed = null,
        protected ?DirectMessagesTopic $direct_messages_topic = null,
        protected ?int $reply_to_checklist_task_id = null,
        protected ?bool $is_paid_post = null,
        protected ?SuggestedPostInfo $suggested_post_info = null,
        protected ?SuggestedPostApproved $suggested_post_approved = null,
        protected ?SuggestedPostApprovalFailed $suggested_post_approval_failed = null,
        protected ?SuggestedPostDeclined $suggested_post_declined = null,
        protected ?SuggestedPostPaid $suggested_post_paid = null,
        protected ?SuggestedPostRefunded $suggested_post_refunded = null,
        protected ?GiftInfo $gift_upgrade_sent = null,
    ) {
        parent::__construct($this->date);
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $message_id
     *
     * @return Message
     */
    public function setMessageId(int $message_id): Message
    {
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return Message
     */
    public function setDate(int $date): Message
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     *
     * @return Message
     */
    public function setChat(Chat $chat): Message
    {
        $this->chat = $chat;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    /**
     * @param int|null $message_thread_id
     *
     * @return Message
     */
    public function setMessageThreadId(?int $message_thread_id): Message
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * @param User|null $from
     *
     * @return Message
     */
    public function setFrom(?User $from): Message
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getSenderChat(): ?Chat
    {
        return $this->sender_chat;
    }

    /**
     * @param Chat|null $sender_chat
     *
     * @return Message
     */
    public function setSenderChat(?Chat $sender_chat): Message
    {
        $this->sender_chat = $sender_chat;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSenderBoostCount(): ?int
    {
        return $this->sender_boost_count;
    }

    /**
     * @param int|null $sender_boost_count
     *
     * @return Message
     */
    public function setSenderBoostCount(?int $sender_boost_count): Message
    {
        $this->sender_boost_count = $sender_boost_count;
        return $this;
    }

    /**
     * @return AbstractMessageOrigin|null
     */
    public function getForwardOrigin(): ?AbstractMessageOrigin
    {
        return $this->forward_origin;
    }

    /**
     * @param AbstractMessageOrigin|null $forward_origin
     *
     * @return Message
     */
    public function setForwardOrigin(?AbstractMessageOrigin $forward_origin): Message
    {
        $this->forward_origin = $forward_origin;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsTopicMessage(): ?bool
    {
        return $this->is_topic_message;
    }

    /**
     * @param bool|null $is_topic_message
     *
     * @return Message
     */
    public function setIsTopicMessage(?bool $is_topic_message): Message
    {
        $this->is_topic_message = $is_topic_message;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsAutomaticForward(): ?bool
    {
        return $this->is_automatic_forward;
    }

    /**
     * @param bool|null $is_automatic_forward
     *
     * @return Message
     */
    public function setIsAutomaticForward(?bool $is_automatic_forward): Message
    {
        $this->is_automatic_forward = $is_automatic_forward;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->reply_to_message;
    }

    /**
     * @param Message|null $reply_to_message
     *
     * @return Message
     */
    public function setReplyToMessage(?Message $reply_to_message): Message
    {
        $this->reply_to_message = $reply_to_message;
        return $this;
    }

    /**
     * @return ExternalReplyInfo|null
     */
    public function getExternalReply(): ?ExternalReplyInfo
    {
        return $this->external_reply;
    }

    /**
     * @param ExternalReplyInfo|null $external_reply
     *
     * @return Message
     */
    public function setExternalReply(?ExternalReplyInfo $external_reply): Message
    {
        $this->external_reply = $external_reply;
        return $this;
    }

    /**
     * @return TextQuote|null
     */
    public function getQuote(): ?TextQuote
    {
        return $this->quote;
    }

    /**
     * @param TextQuote|null $quote
     *
     * @return Message
     */
    public function setQuote(?TextQuote $quote): Message
    {
        $this->quote = $quote;
        return $this;
    }

    /**
     * @return Story|null
     */
    public function getReplyToStory(): ?Story
    {
        return $this->reply_to_story;
    }

    /**
     * @param Story|null $reply_to_story
     *
     * @return Message
     */
    public function setReplyToStory(?Story $reply_to_story): Message
    {
        $this->reply_to_story = $reply_to_story;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getViaBot(): ?User
    {
        return $this->via_bot;
    }

    /**
     * @param User|null $via_bot
     *
     * @return Message
     */
    public function setViaBot(?User $via_bot): Message
    {
        $this->via_bot = $via_bot;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEditDate(): ?int
    {
        return $this->edit_date;
    }

    /**
     * @param int|null $edit_date
     *
     * @return Message
     */
    public function setEditDate(?int $edit_date): Message
    {
        $this->edit_date = $edit_date;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasProtectedContent(): ?bool
    {
        return $this->has_protected_content;
    }

    /**
     * @param bool|null $has_protected_content
     *
     * @return Message
     */
    public function setHasProtectedContent(?bool $has_protected_content): Message
    {
        $this->has_protected_content = $has_protected_content;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMediaGroupId(): ?string
    {
        return $this->media_group_id;
    }

    /**
     * @param string|null $media_group_id
     *
     * @return Message
     */
    public function setMediaGroupId(?string $media_group_id): Message
    {
        $this->media_group_id = $media_group_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    /**
     * @param string|null $author_signature
     *
     * @return Message
     */
    public function setAuthorSignature(?string $author_signature): Message
    {
        $this->author_signature = $author_signature;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @return Message
     */
    public function setText(?string $text): Message
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     *
     * @return Message
     */
    public function setEntities(?array $entities): Message
    {
        $this->entities = $entities;
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
     * @return Message
     */
    public function setLinkPreviewOptions(?LinkPreviewOptions $link_preview_options): Message
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
     * @return Message
     */
    public function setAnimation(?Animation $animation): Message
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
     * @return Message
     */
    public function setAudio(?Audio $audio): Message
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
     * @return Message
     */
    public function setDocument(?Document $document): Message
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
     * @return Message
     */
    public function setPhoto(?array $photo): Message
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
     * @return Message
     */
    public function setSticker(?Sticker $sticker): Message
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
     * @return Message
     */
    public function setStory(?Story $story): Message
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
     * @return Message
     */
    public function setVideo(?Video $video): Message
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
     * @return Message
     */
    public function setVideoNote(?VideoNote $video_note): Message
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
     * @return Message
     */
    public function setVoice(?Voice $voice): Message
    {
        $this->voice = $voice;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     *
     * @return Message
     */
    public function setCaption(?string $caption): Message
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    /**
     * @param MessageEntity[]|null $caption_entities
     *
     * @return Message
     */
    public function setCaptionEntities(?array $caption_entities): Message
    {
        $this->caption_entities = $caption_entities;
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
     * @return Message
     */
    public function setHasMediaSpoiler(?bool $has_media_spoiler): Message
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
     * @return Message
     */
    public function setContact(?Contact $contact): Message
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
     * @return Message
     */
    public function setDice(?Dice $dice): Message
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
     * @return Message
     */
    public function setGame(?Game $game): Message
    {
        $this->game = $game;
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
     * @return Message
     */
    public function setPoll(?Poll $poll): Message
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
     * @return Message
     */
    public function setVenue(?Venue $venue): Message
    {
        $this->venue = $venue;
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
     * @return Message
     */
    public function setLocation(?Location $location): Message
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getNewChatMembers(): ?array
    {
        return $this->new_chat_members;
    }

    /**
     * @param User[]|null $new_chat_members
     *
     * @return Message
     */
    public function setNewChatMembers(?array $new_chat_members): Message
    {
        $this->new_chat_members = $new_chat_members;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getLeftChatMember(): ?User
    {
        return $this->left_chat_member;
    }

    /**
     * @param User|null $left_chat_member
     *
     * @return Message
     */
    public function setLeftChatMember(?User $left_chat_member): Message
    {
        $this->left_chat_member = $left_chat_member;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewChatTitle(): ?string
    {
        return $this->new_chat_title;
    }

    /**
     * @param string|null $new_chat_title
     *
     * @return Message
     */
    public function setNewChatTitle(?string $new_chat_title): Message
    {
        $this->new_chat_title = $new_chat_title;
        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->new_chat_photo;
    }

    /**
     * @param PhotoSize[]|null $new_chat_photo
     *
     * @return Message
     */
    public function setNewChatPhoto(?array $new_chat_photo): Message
    {
        $this->new_chat_photo = $new_chat_photo;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleteChatPhoto(): ?bool
    {
        return $this->delete_chat_photo;
    }

    /**
     * @param bool|null $delete_chat_photo
     *
     * @return Message
     */
    public function setDeleteChatPhoto(?bool $delete_chat_photo): Message
    {
        $this->delete_chat_photo = $delete_chat_photo;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGroupChatCreated(): ?bool
    {
        return $this->group_chat_created;
    }

    /**
     * @param bool|null $group_chat_created
     *
     * @return Message
     */
    public function setGroupChatCreated(?bool $group_chat_created): Message
    {
        $this->group_chat_created = $group_chat_created;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSupergroupChatCreated(): ?bool
    {
        return $this->supergroup_chat_created;
    }

    /**
     * @param bool|null $supergroup_chat_created
     *
     * @return Message
     */
    public function setSupergroupChatCreated(?bool $supergroup_chat_created): Message
    {
        $this->supergroup_chat_created = $supergroup_chat_created;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChannelChatCreated(): ?bool
    {
        return $this->channel_chat_created;
    }

    /**
     * @param bool|null $channel_chat_created
     *
     * @return Message
     */
    public function setChannelChatCreated(?bool $channel_chat_created): Message
    {
        $this->channel_chat_created = $channel_chat_created;
        return $this;
    }

    /**
     * @return MessageAutoDeleteTimerChanged|null
     */
    public function getMessageAutoDeleteTimerChanged(): ?MessageAutoDeleteTimerChanged
    {
        return $this->message_auto_delete_timer_changed;
    }

    /**
     * @param MessageAutoDeleteTimerChanged|null $message_auto_delete_timer_changed
     *
     * @return Message
     */
    public function setMessageAutoDeleteTimerChanged(?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed): Message
    {
        $this->message_auto_delete_timer_changed = $message_auto_delete_timer_changed;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrate_to_chat_id;
    }

    /**
     * @param int|null $migrate_to_chat_id
     *
     * @return Message
     */
    public function setMigrateToChatId(?int $migrate_to_chat_id): Message
    {
        $this->migrate_to_chat_id = $migrate_to_chat_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrate_from_chat_id;
    }

    /**
     * @param int|null $migrate_from_chat_id
     *
     * @return Message
     */
    public function setMigrateFromChatId(?int $migrate_from_chat_id): Message
    {
        $this->migrate_from_chat_id = $migrate_from_chat_id;
        return $this;
    }

    /**
     * @return AbstractMaybeInaccessibleMessage|null
     */
    public function getPinnedMessage(): ?AbstractMaybeInaccessibleMessage
    {
        return $this->pinned_message;
    }

    /**
     * @param AbstractMaybeInaccessibleMessage|null $pinned_message
     *
     * @return Message
     */
    public function setPinnedMessage(?AbstractMaybeInaccessibleMessage $pinned_message): Message
    {
        $this->pinned_message = $pinned_message;
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
     * @return Message
     */
    public function setInvoice(?Invoice $invoice): Message
    {
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * @return SuccessfulPayment|null
     */
    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successful_payment;
    }

    /**
     * @param SuccessfulPayment|null $successful_payment
     *
     * @return Message
     */
    public function setSuccessfulPayment(?SuccessfulPayment $successful_payment): Message
    {
        $this->successful_payment = $successful_payment;
        return $this;
    }

    /**
     * @return UsersShared|null
     */
    public function getUsersShared(): ?UsersShared
    {
        return $this->users_shared;
    }

    /**
     * @param UsersShared|null $users_shared
     *
     * @return Message
     */
    public function setUsersShared(?UsersShared $users_shared): Message
    {
        $this->users_shared = $users_shared;
        return $this;
    }

    /**
     * @return ChatShared|null
     */
    public function getChatShared(): ?ChatShared
    {
        return $this->chat_shared;
    }

    /**
     * @param ChatShared|null $chat_shared
     *
     * @return Message
     */
    public function setChatShared(?ChatShared $chat_shared): Message
    {
        $this->chat_shared = $chat_shared;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connected_website;
    }

    /**
     * @param string|null $connected_website
     *
     * @return Message
     */
    public function setConnectedWebsite(?string $connected_website): Message
    {
        $this->connected_website = $connected_website;
        return $this;
    }

    /**
     * @return WriteAccessAllowed|null
     */
    public function getWriteAccessAllowed(): ?WriteAccessAllowed
    {
        return $this->write_access_allowed;
    }

    /**
     * @param WriteAccessAllowed|null $write_access_allowed
     *
     * @return Message
     */
    public function setWriteAccessAllowed(?WriteAccessAllowed $write_access_allowed): Message
    {
        $this->write_access_allowed = $write_access_allowed;
        return $this;
    }

    /**
     * @return PassportData|null
     */
    public function getPassportData(): ?PassportData
    {
        return $this->passport_data;
    }

    /**
     * @param PassportData|null $passport_data
     *
     * @return Message
     */
    public function setPassportData(?PassportData $passport_data): Message
    {
        $this->passport_data = $passport_data;
        return $this;
    }

    /**
     * @return ProximityAlertTriggered|null
     */
    public function getProximityAlertTriggered(): ?ProximityAlertTriggered
    {
        return $this->proximity_alert_triggered;
    }

    /**
     * @param ProximityAlertTriggered|null $proximity_alert_triggered
     *
     * @return Message
     */
    public function setProximityAlertTriggered(?ProximityAlertTriggered $proximity_alert_triggered): Message
    {
        $this->proximity_alert_triggered = $proximity_alert_triggered;
        return $this;
    }

    /**
     * @return ChatBoostAdded|null
     */
    public function getBoostAdded(): ?ChatBoostAdded
    {
        return $this->boost_added;
    }

    /**
     * @param ChatBoostAdded|null $boost_added
     *
     * @return Message
     */
    public function setBoostAdded(?ChatBoostAdded $boost_added): Message
    {
        $this->boost_added = $boost_added;
        return $this;
    }

    /**
     * @return ForumTopicCreated|null
     */
    public function getForumTopicCreated(): ?ForumTopicCreated
    {
        return $this->forum_topic_created;
    }

    /**
     * @param ForumTopicCreated|null $forum_topic_created
     *
     * @return Message
     */
    public function setForumTopicCreated(?ForumTopicCreated $forum_topic_created): Message
    {
        $this->forum_topic_created = $forum_topic_created;
        return $this;
    }

    /**
     * @return ForumTopicEdited|null
     */
    public function getForumTopicEdited(): ?ForumTopicEdited
    {
        return $this->forum_topic_edited;
    }

    /**
     * @param ForumTopicEdited|null $forum_topic_edited
     *
     * @return Message
     */
    public function setForumTopicEdited(?ForumTopicEdited $forum_topic_edited): Message
    {
        $this->forum_topic_edited = $forum_topic_edited;
        return $this;
    }

    /**
     * @return ForumTopicClosed|null
     */
    public function getForumTopicClosed(): ?ForumTopicClosed
    {
        return $this->forum_topic_closed;
    }

    /**
     * @param ForumTopicClosed|null $forum_topic_closed
     *
     * @return Message
     */
    public function setForumTopicClosed(?ForumTopicClosed $forum_topic_closed): Message
    {
        $this->forum_topic_closed = $forum_topic_closed;
        return $this;
    }

    /**
     * @return ForumTopicReopened|null
     */
    public function getForumTopicReopened(): ?ForumTopicReopened
    {
        return $this->forum_topic_reopened;
    }

    /**
     * @param ForumTopicReopened|null $forum_topic_reopened
     *
     * @return Message
     */
    public function setForumTopicReopened(?ForumTopicReopened $forum_topic_reopened): Message
    {
        $this->forum_topic_reopened = $forum_topic_reopened;
        return $this;
    }

    /**
     * @return GeneralForumTopicHidden|null
     */
    public function getGeneralForumTopicHidden(): ?GeneralForumTopicHidden
    {
        return $this->general_forum_topic_hidden;
    }

    /**
     * @param GeneralForumTopicHidden|null $general_forum_topic_hidden
     *
     * @return Message
     */
    public function setGeneralForumTopicHidden(?GeneralForumTopicHidden $general_forum_topic_hidden): Message
    {
        $this->general_forum_topic_hidden = $general_forum_topic_hidden;
        return $this;
    }

    /**
     * @return GeneralForumTopicUnhidden|null
     */
    public function getGeneralForumTopicUnhidden(): ?GeneralForumTopicUnhidden
    {
        return $this->general_forum_topic_unhidden;
    }

    /**
     * @param GeneralForumTopicUnhidden|null $general_forum_topic_unhidden
     *
     * @return Message
     */
    public function setGeneralForumTopicUnhidden(?GeneralForumTopicUnhidden $general_forum_topic_unhidden): Message
    {
        $this->general_forum_topic_unhidden = $general_forum_topic_unhidden;
        return $this;
    }

    /**
     * @return GiveawayCreated|null
     */
    public function getGiveawayCreated(): ?GiveawayCreated
    {
        return $this->giveaway_created;
    }

    /**
     * @param GiveawayCreated|null $giveaway_created
     *
     * @return Message
     */
    public function setGiveawayCreated(?GiveawayCreated $giveaway_created): Message
    {
        $this->giveaway_created = $giveaway_created;
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
     * @return Message
     */
    public function setGiveaway(?Giveaway $giveaway): Message
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
     * @return Message
     */
    public function setGiveawayWinners(?GiveawayWinners $giveaway_winners): Message
    {
        $this->giveaway_winners = $giveaway_winners;
        return $this;
    }

    /**
     * @return GiveawayCompleted|null
     */
    public function getGiveawayCompleted(): ?GiveawayCompleted
    {
        return $this->giveaway_completed;
    }

    /**
     * @param GiveawayCompleted|null $giveaway_completed
     *
     * @return Message
     */
    public function setGiveawayCompleted(?GiveawayCompleted $giveaway_completed): Message
    {
        $this->giveaway_completed = $giveaway_completed;
        return $this;
    }

    /**
     * @return VideoChatScheduled|null
     */
    public function getVideoChatScheduled(): ?VideoChatScheduled
    {
        return $this->video_chat_scheduled;
    }

    /**
     * @param VideoChatScheduled|null $video_chat_scheduled
     *
     * @return Message
     */
    public function setVideoChatScheduled(?VideoChatScheduled $video_chat_scheduled): Message
    {
        $this->video_chat_scheduled = $video_chat_scheduled;
        return $this;
    }

    /**
     * @return VideoChatStarted|null
     */
    public function getVideoChatStarted(): ?VideoChatStarted
    {
        return $this->video_chat_started;
    }

    /**
     * @param VideoChatStarted|null $video_chat_started
     *
     * @return Message
     */
    public function setVideoChatStarted(?VideoChatStarted $video_chat_started): Message
    {
        $this->video_chat_started = $video_chat_started;
        return $this;
    }

    /**
     * @return VideoChatEnded|null
     */
    public function getVideoChatEnded(): ?VideoChatEnded
    {
        return $this->video_chat_ended;
    }

    /**
     * @param VideoChatEnded|null $video_chat_ended
     *
     * @return Message
     */
    public function setVideoChatEnded(?VideoChatEnded $video_chat_ended): Message
    {
        $this->video_chat_ended = $video_chat_ended;
        return $this;
    }

    /**
     * @return VideoChatParticipantsInvited|null
     */
    public function getVideoChatParticipantsInvited(): ?VideoChatParticipantsInvited
    {
        return $this->video_chat_participants_invited;
    }

    /**
     * @param VideoChatParticipantsInvited|null $video_chat_participants_invited
     *
     * @return Message
     */
    public function setVideoChatParticipantsInvited(?VideoChatParticipantsInvited $video_chat_participants_invited): Message
    {
        $this->video_chat_participants_invited = $video_chat_participants_invited;
        return $this;
    }

    /**
     * @return WebAppData|null
     */
    public function getWebAppData(): ?WebAppData
    {
        return $this->web_app_data;
    }

    /**
     * @param WebAppData|null $web_app_data
     *
     * @return Message
     */
    public function setWebAppData(?WebAppData $web_app_data): Message
    {
        $this->web_app_data = $web_app_data;
        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return Message
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): Message
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return ChatBackground|null
     */
    public function getChatBackgroundSet(): ?ChatBackground
    {
        return $this->chat_background_set;
    }

    /**
     * @param ChatBackground|null $chat_background_set
     *
     * @return Message
     */
    public function setChatBackgroundSet(?ChatBackground $chat_background_set): Message
    {
        $this->chat_background_set = $chat_background_set;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    /**
     * @param string|null $business_connection_id
     *
     * @return Message
     */
    public function setBusinessConnectionId(?string $business_connection_id): Message
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getSenderBusinessBot(): ?User
    {
        return $this->sender_business_bot;
    }

    /**
     * @param User|null $sender_business_bot
     *
     * @return Message
     */
    public function setSenderBusinessBot(?User $sender_business_bot): Message
    {
        $this->sender_business_bot = $sender_business_bot;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFromOffline(): ?bool
    {
        return $this->is_from_offline;
    }

    /**
     * @param bool|null $is_from_offline
     *
     * @return Message
     */
    public function setIsFromOffline(?bool $is_from_offline): Message
    {
        $this->is_from_offline = $is_from_offline;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEffectId(): ?string
    {
        return $this->effect_id;
    }

    /**
     * @param string|null $effect_id
     *
     * @return Message
     */
    public function setEffectId(?string $effect_id): Message
    {
        $this->effect_id = $effect_id;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    /**
     * @param bool|null $show_caption_above_media
     *
     * @return Message
     */
    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): Message
    {
        $this->show_caption_above_media = $show_caption_above_media;
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
     * @return Message
     */
    public function setPaidMedia(?PaidMediaInfo $paid_media): Message
    {
        $this->paid_media = $paid_media;
        return $this;
    }

    /**
     * @return RefundedPayment|null
     */
    public function getRefundedPayment(): ?RefundedPayment
    {
        return $this->refunded_payment;
    }

    /**
     * @param RefundedPayment|null $refunded_payment
     *
     * @return Message
     */
    public function setRefundedPayment(?RefundedPayment $refunded_payment): Message
    {
        $this->refunded_payment = $refunded_payment;
        return $this;
    }

    /**
     * @return GiftInfo|null
     */
    public function getGift(): ?GiftInfo
    {
        return $this->gift;
    }

    /**
     * @param GiftInfo|null $gift
     *
     * @return Message
     */
    public function setGift(?GiftInfo $gift): Message
    {
        $this->gift = $gift;
        return $this;
    }

    /**
     * @return UniqueGiftInfo|null
     */
    public function getUniqueGift(): ?UniqueGiftInfo
    {
        return $this->unique_gift;
    }

    /**
     * @param UniqueGiftInfo|null $unique_gift
     *
     * @return Message
     */
    public function setUniqueGift(?UniqueGiftInfo $unique_gift): Message
    {
        $this->unique_gift = $unique_gift;
        return $this;
    }

    /**
     * @return PaidMessagePriceChanged|null
     */
    public function getPaidMessagePriceChanged(): ?PaidMessagePriceChanged
    {
        return $this->paid_message_price_changed;
    }

    /**
     * @param PaidMessagePriceChanged|null $paid_message_price_changed
     *
     * @return Message
     */
    public function setPaidMessagePriceChanged(?PaidMessagePriceChanged $paid_message_price_changed): Message
    {
        $this->paid_message_price_changed = $paid_message_price_changed;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaidStarCount(): ?int
    {
        return $this->paid_star_count;
    }

    /**
     * @param int|null $paid_star_count
     *
     * @return Message
     */
    public function setPaidStarCount(?int $paid_star_count): Message
    {
        $this->paid_star_count = $paid_star_count;
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
     * @return Message
     */
    public function setChecklist(?Checklist $checklist): Message
    {
        $this->checklist = $checklist;
        return $this;
    }

    /**
     * @return ChecklistTasksDone|null
     */
    public function getChecklistTasksDone(): ?ChecklistTasksDone
    {
        return $this->checklist_tasks_done;
    }

    /**
     * @param ChecklistTasksDone|null $checklist_tasks_done
     *
     * @return Message
     */
    public function setChecklistTasksDone(?ChecklistTasksDone $checklist_tasks_done): Message
    {
        $this->checklist_tasks_done = $checklist_tasks_done;
        return $this;
    }

    /**
     * @return ChecklistTasksAdded|null
     */
    public function getChecklistTasksAdded(): ?ChecklistTasksAdded
    {
        return $this->checklist_tasks_added;
    }

    /**
     * @param ChecklistTasksAdded|null $checklist_tasks_added
     *
     * @return Message
     */
    public function setChecklistTasksAdded(?ChecklistTasksAdded $checklist_tasks_added): Message
    {
        $this->checklist_tasks_added = $checklist_tasks_added;
        return $this;
    }

    /**
     * @return DirectMessagePriceChanged|null
     */
    public function getDirectMessagePriceChanged(): ?DirectMessagePriceChanged
    {
        return $this->direct_message_price_changed;
    }

    /**
     * @param DirectMessagePriceChanged|null $direct_message_price_changed
     *
     * @return Message
     */
    public function setDirectMessagePriceChanged(?DirectMessagePriceChanged $direct_message_price_changed): Message
    {
        $this->direct_message_price_changed = $direct_message_price_changed;
        return $this;
    }

    /**
     * @return DirectMessagesTopic|null
     */
    public function getDirectMessagesTopic(): ?DirectMessagesTopic
    {
        return $this->direct_messages_topic;
    }

    /**
     * @param DirectMessagesTopic|null $direct_messages_topic
     *
     * @return Message
     */
    public function setDirectMessagesTopic(?DirectMessagesTopic $direct_messages_topic): Message
    {
        $this->direct_messages_topic = $direct_messages_topic;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getReplyToChecklistTaskId(): ?int
    {
        return $this->reply_to_checklist_task_id;
    }

    /**
     * @param int|null $reply_to_checklist_task_id
     *
     * @return Message
     */
    public function setReplyToChecklistTaskId(?int $reply_to_checklist_task_id): Message
    {
        $this->reply_to_checklist_task_id = $reply_to_checklist_task_id;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsPaidPost(): ?bool
    {
        return $this->is_paid_post;
    }

    /**
     * @param bool|null $is_paid_post
     *
     * @return Message
     */
    public function setIsPaidPost(?bool $is_paid_post): Message
    {
        $this->is_paid_post = $is_paid_post;
        return $this;
    }

    /**
     * @return SuggestedPostInfo|null
     */
    public function getSuggestedPostInfo(): ?SuggestedPostInfo
    {
        return $this->suggested_post_info;
    }

    /**
     * @param SuggestedPostInfo|null $suggested_post_info
     *
     * @return Message
     */
    public function setSuggestedPostInfo(?SuggestedPostInfo $suggested_post_info): Message
    {
        $this->suggested_post_info = $suggested_post_info;
        return $this;
    }

    /**
     * @return SuggestedPostApproved|null
     */
    public function getSuggestedPostApproved(): ?SuggestedPostApproved
    {
        return $this->suggested_post_approved;
    }

    /**
     * @param SuggestedPostApproved|null $suggested_post_approved
     *
     * @return Message
     */
    public function setSuggestedPostApproved(?SuggestedPostApproved $suggested_post_approved): Message
    {
        $this->suggested_post_approved = $suggested_post_approved;
        return $this;
    }

    /**
     * @return SuggestedPostApprovalFailed|null
     */
    public function getSuggestedPostApprovalFailed(): ?SuggestedPostApprovalFailed
    {
        return $this->suggested_post_approval_failed;
    }

    /**
     * @param SuggestedPostApprovalFailed|null $suggested_post_approval_failed
     *
     * @return Message
     */
    public function setSuggestedPostApprovalFailed(?SuggestedPostApprovalFailed $suggested_post_approval_failed): Message
    {
        $this->suggested_post_approval_failed = $suggested_post_approval_failed;
        return $this;
    }

    /**
     * @return SuggestedPostDeclined|null
     */
    public function getSuggestedPostDeclined(): ?SuggestedPostDeclined
    {
        return $this->suggested_post_declined;
    }

    /**
     * @param SuggestedPostDeclined|null $suggested_post_declined
     *
     * @return Message
     */
    public function setSuggestedPostDeclined(?SuggestedPostDeclined $suggested_post_declined): Message
    {
        $this->suggested_post_declined = $suggested_post_declined;
        return $this;
    }

    /**
     * @return SuggestedPostPaid|null
     */
    public function getSuggestedPostPaid(): ?SuggestedPostPaid
    {
        return $this->suggested_post_paid;
    }

    /**
     * @param SuggestedPostPaid|null $suggested_post_paid
     *
     * @return Message
     */
    public function setSuggestedPostPaid(?SuggestedPostPaid $suggested_post_paid): Message
    {
        $this->suggested_post_paid = $suggested_post_paid;
        return $this;
    }

    /**
     * @return SuggestedPostRefunded|null
     */
    public function getSuggestedPostRefunded(): ?SuggestedPostRefunded
    {
        return $this->suggested_post_refunded;
    }

    /**
     * @param SuggestedPostRefunded|null $suggested_post_refunded
     *
     * @return Message
     */
    public function setSuggestedPostRefunded(?SuggestedPostRefunded $suggested_post_refunded): Message
    {
        $this->suggested_post_refunded = $suggested_post_refunded;
        return $this;
    }

    /**
     * @return GiftInfo|null
     */
    public function getGiftUpgradeSent(): ?GiftInfo
    {
        return $this->gift_upgrade_sent;
    }

    /**
     * @param GiftInfo|null $gift_upgrade_sent
     *
     * @return Message
     */
    public function setGiftUpgradeSent(?GiftInfo $gift_upgrade_sent): Message
    {
        $this->gift_upgrade_sent = $gift_upgrade_sent;
        return $this;
    }
}
