<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * This object represents an incoming update.At most one of the optional parameters can be present in any given update.
 *
 * @see https://core.telegram.org/bots/api#available-types object
 * @link https://core.telegram.org/bots/api#update
 */
final class Update implements EntityInterface
{
    /**
     * @param int $update_id The update's unique identifier. Update identifiers start from a certain positive number and increase
     * sequentially. This identifier becomes especially handy if you're using webhooks, since it allows you to ignore repeated updates
     * or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week,
     * then identifier of the next update will be chosen randomly instead of sequentially.
     * @param BusinessConnection|null $business_connection Optional. The bot was connected to or disconnected from a business account,
     * or a user edited an existing connection with the bot
     * @param Message|null $business_message Optional. New message from a connected business account
     * @param CallbackQuery|null $callback_query Optional. New incoming callback query
     * @param Message|null $channel_post Optional. New incoming channel post of any kind - text, photo, sticker, etc.
     * @param ChatBoostUpdated|null $chat_boost Optional. A chat boost was added or changed. The bot must be an administrator in
     * the chat to receive these updates.
     * @param ChatJoinRequest|null $chat_join_request Optional. A request to join the chat has been sent. The bot must have the can_invite_users
     * administrator right in the chat to receive these updates.
     * @param ChatMemberUpdated|null $chat_member Optional. A chat member's status was updated in a chat. The bot must be an administrator
     * in the chat and must explicitly specify "chat_member" in the list of allowed_updates to receive these updates.
     * @param ChosenInlineResult|null $chosen_inline_result Optional. The result of an inline query that was chosen by a user and
     * sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates
     * for your bot.
     * @param BusinessMessagesDeleted|null $deleted_business_messages Optional. Messages were deleted from a connected business account
     * @param Message|null $edited_business_message Optional. New version of a message from a connected business account
     * @param Message|null $edited_channel_post Optional. New version of a channel post that is known to the bot and was edited.
     * This update may at times be triggered by changes to message fields that are either unavailable or not actively used by your
     * bot.
     * @param Message|null $edited_message Optional. New version of a message that is known to the bot and was edited. This update
     * may at times be triggered by changes to message fields that are either unavailable or not actively used by your bot.
     * @param InlineQuery|null $inline_query Optional. New incoming inline query
     * @param Message|null $message Optional. New incoming message of any kind - text, photo, sticker, etc.
     * @param MessageReactionUpdated|null $message_reaction Optional. A reaction to a message was changed by a user. The bot must
     * be an administrator in the chat and must explicitly specify "message_reaction" in the list of allowed_updates to receive these
     * updates. The update isn't received for reactions set by bots.
     * @param MessageReactionCountUpdated|null $message_reaction_count Optional. Reactions to a message with anonymous reactions
     * were changed. The bot must be an administrator in the chat and must explicitly specify "message_reaction_count" in the list
     * of allowed_updates to receive these updates. The updates are grouped and can be sent with delay up to a few minutes.
     * @param ChatMemberUpdated|null $my_chat_member Optional. The bot's chat member status was updated in a chat. For private chats,
     * this update is received only when the bot is blocked or unblocked by the user.
     * @param Poll|null $poll Optional. New poll state. Bots receive only updates about manually stopped polls and polls, which are
     * sent by the bot
     * @param PollAnswer|null $poll_answer Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes
     * only in polls that were sent by the bot itself.
     * @param PreCheckoutQuery|null $pre_checkout_query Optional. New incoming pre-checkout query. Contains full information about
     * checkout
     * @param ChatBoostRemoved|null $removed_chat_boost Optional. A boost was removed from a chat. The bot must be an administrator
     * in the chat to receive these updates.
     * @param ShippingQuery|null $shipping_query Optional. New incoming shipping query. Only for invoices with flexible price
     * @param PaidMediaPurchased|null $purchased_paid_media Optional. A user purchased paid media with a non-empty payload sent by
     * the bot in a non-channel chat
     *
     * @see https://core.telegram.org/bots/api#setwebhook webhooks
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#businessconnection BusinessConnection
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#businessmessagesdeleted BusinessMessagesDeleted
     * @see https://core.telegram.org/bots/api#messagereactionupdated MessageReactionUpdated
     * @see https://core.telegram.org/bots/api#messagereactioncountupdated MessageReactionCountUpdated
     * @see https://core.telegram.org/bots/api#inlinequery InlineQuery
     * @see https://core.telegram.org/bots/api#inline-mode inline
     * @see https://core.telegram.org/bots/api#choseninlineresult ChosenInlineResult
     * @see https://core.telegram.org/bots/api#inline-mode inline
     * @see https://core.telegram.org/bots/inline#collecting-feedback feedback collecting
     * @see https://core.telegram.org/bots/api#callbackquery CallbackQuery
     * @see https://core.telegram.org/bots/api#shippingquery ShippingQuery
     * @see https://core.telegram.org/bots/api#precheckoutquery PreCheckoutQuery
     * @see https://core.telegram.org/bots/api#paidmediapurchased PaidMediaPurchased
     * @see https://core.telegram.org/bots/api#poll Poll
     * @see https://core.telegram.org/bots/api#pollanswer PollAnswer
     * @see https://core.telegram.org/bots/api#chatmemberupdated ChatMemberUpdated
     * @see https://core.telegram.org/bots/api#chatmemberupdated ChatMemberUpdated
     * @see https://core.telegram.org/bots/api#chatjoinrequest ChatJoinRequest
     * @see https://core.telegram.org/bots/api#chatboostupdated ChatBoostUpdated
     * @see https://core.telegram.org/bots/api#chatboostremoved ChatBoostRemoved
     */
    public function __construct(
        protected int $update_id,
        protected ?BusinessConnection $business_connection = null,
        protected ?Message $business_message = null,
        protected ?CallbackQuery $callback_query = null,
        protected ?Message $channel_post = null,
        protected ?ChatBoostUpdated $chat_boost = null,
        protected ?ChatJoinRequest $chat_join_request = null,
        protected ?ChatMemberUpdated $chat_member = null,
        protected ?ChosenInlineResult $chosen_inline_result = null,
        protected ?BusinessMessagesDeleted $deleted_business_messages = null,
        protected ?Message $edited_business_message = null,
        protected ?Message $edited_channel_post = null,
        protected ?Message $edited_message = null,
        protected ?InlineQuery $inline_query = null,
        protected ?Message $message = null,
        protected ?MessageReactionUpdated $message_reaction = null,
        protected ?MessageReactionCountUpdated $message_reaction_count = null,
        protected ?ChatMemberUpdated $my_chat_member = null,
        protected ?Poll $poll = null,
        protected ?PollAnswer $poll_answer = null,
        protected ?PreCheckoutQuery $pre_checkout_query = null,
        protected ?ChatBoostRemoved $removed_chat_boost = null,
        protected ?ShippingQuery $shipping_query = null,
        protected ?PaidMediaPurchased $purchased_paid_media = null,
    ) {}

    /**
     * @return int
     */
    public function getUpdateId(): int
    {
        return $this->update_id;
    }

    /**
     * @param int $update_id
     *
     * @return Update
     */
    public function setUpdateId(int $update_id): Update
    {
        $this->update_id = $update_id;
        return $this;
    }

    /**
     * @return BusinessConnection|null
     */
    public function getBusinessConnection(): ?BusinessConnection
    {
        return $this->business_connection;
    }

    /**
     * @param BusinessConnection|null $business_connection
     *
     * @return Update
     */
    public function setBusinessConnection(?BusinessConnection $business_connection): Update
    {
        $this->business_connection = $business_connection;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getBusinessMessage(): ?Message
    {
        return $this->business_message;
    }

    /**
     * @param Message|null $business_message
     *
     * @return Update
     */
    public function setBusinessMessage(?Message $business_message): Update
    {
        $this->business_message = $business_message;
        return $this;
    }

    /**
     * @return CallbackQuery|null
     */
    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callback_query;
    }

    /**
     * @param CallbackQuery|null $callback_query
     *
     * @return Update
     */
    public function setCallbackQuery(?CallbackQuery $callback_query): Update
    {
        $this->callback_query = $callback_query;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getChannelPost(): ?Message
    {
        return $this->channel_post;
    }

    /**
     * @param Message|null $channel_post
     *
     * @return Update
     */
    public function setChannelPost(?Message $channel_post): Update
    {
        $this->channel_post = $channel_post;
        return $this;
    }

    /**
     * @return ChatBoostUpdated|null
     */
    public function getChatBoost(): ?ChatBoostUpdated
    {
        return $this->chat_boost;
    }

    /**
     * @param ChatBoostUpdated|null $chat_boost
     *
     * @return Update
     */
    public function setChatBoost(?ChatBoostUpdated $chat_boost): Update
    {
        $this->chat_boost = $chat_boost;
        return $this;
    }

    /**
     * @return ChatJoinRequest|null
     */
    public function getChatJoinRequest(): ?ChatJoinRequest
    {
        return $this->chat_join_request;
    }

    /**
     * @param ChatJoinRequest|null $chat_join_request
     *
     * @return Update
     */
    public function setChatJoinRequest(?ChatJoinRequest $chat_join_request): Update
    {
        $this->chat_join_request = $chat_join_request;
        return $this;
    }

    /**
     * @return ChatMemberUpdated|null
     */
    public function getChatMember(): ?ChatMemberUpdated
    {
        return $this->chat_member;
    }

    /**
     * @param ChatMemberUpdated|null $chat_member
     *
     * @return Update
     */
    public function setChatMember(?ChatMemberUpdated $chat_member): Update
    {
        $this->chat_member = $chat_member;
        return $this;
    }

    /**
     * @return ChosenInlineResult|null
     */
    public function getChosenInlineResult(): ?ChosenInlineResult
    {
        return $this->chosen_inline_result;
    }

    /**
     * @param ChosenInlineResult|null $chosen_inline_result
     *
     * @return Update
     */
    public function setChosenInlineResult(?ChosenInlineResult $chosen_inline_result): Update
    {
        $this->chosen_inline_result = $chosen_inline_result;
        return $this;
    }

    /**
     * @return BusinessMessagesDeleted|null
     */
    public function getDeletedBusinessMessages(): ?BusinessMessagesDeleted
    {
        return $this->deleted_business_messages;
    }

    /**
     * @param BusinessMessagesDeleted|null $deleted_business_messages
     *
     * @return Update
     */
    public function setDeletedBusinessMessages(?BusinessMessagesDeleted $deleted_business_messages): Update
    {
        $this->deleted_business_messages = $deleted_business_messages;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedBusinessMessage(): ?Message
    {
        return $this->edited_business_message;
    }

    /**
     * @param Message|null $edited_business_message
     *
     * @return Update
     */
    public function setEditedBusinessMessage(?Message $edited_business_message): Update
    {
        $this->edited_business_message = $edited_business_message;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedChannelPost(): ?Message
    {
        return $this->edited_channel_post;
    }

    /**
     * @param Message|null $edited_channel_post
     *
     * @return Update
     */
    public function setEditedChannelPost(?Message $edited_channel_post): Update
    {
        $this->edited_channel_post = $edited_channel_post;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedMessage(): ?Message
    {
        return $this->edited_message;
    }

    /**
     * @param Message|null $edited_message
     *
     * @return Update
     */
    public function setEditedMessage(?Message $edited_message): Update
    {
        $this->edited_message = $edited_message;
        return $this;
    }

    /**
     * @return InlineQuery|null
     */
    public function getInlineQuery(): ?InlineQuery
    {
        return $this->inline_query;
    }

    /**
     * @param InlineQuery|null $inline_query
     *
     * @return Update
     */
    public function setInlineQuery(?InlineQuery $inline_query): Update
    {
        $this->inline_query = $inline_query;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * @param Message|null $message
     *
     * @return Update
     */
    public function setMessage(?Message $message): Update
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return MessageReactionUpdated|null
     */
    public function getMessageReaction(): ?MessageReactionUpdated
    {
        return $this->message_reaction;
    }

    /**
     * @param MessageReactionUpdated|null $message_reaction
     *
     * @return Update
     */
    public function setMessageReaction(?MessageReactionUpdated $message_reaction): Update
    {
        $this->message_reaction = $message_reaction;
        return $this;
    }

    /**
     * @return MessageReactionCountUpdated|null
     */
    public function getMessageReactionCount(): ?MessageReactionCountUpdated
    {
        return $this->message_reaction_count;
    }

    /**
     * @param MessageReactionCountUpdated|null $message_reaction_count
     *
     * @return Update
     */
    public function setMessageReactionCount(?MessageReactionCountUpdated $message_reaction_count): Update
    {
        $this->message_reaction_count = $message_reaction_count;
        return $this;
    }

    /**
     * @return ChatMemberUpdated|null
     */
    public function getMyChatMember(): ?ChatMemberUpdated
    {
        return $this->my_chat_member;
    }

    /**
     * @param ChatMemberUpdated|null $my_chat_member
     *
     * @return Update
     */
    public function setMyChatMember(?ChatMemberUpdated $my_chat_member): Update
    {
        $this->my_chat_member = $my_chat_member;
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
     * @return Update
     */
    public function setPoll(?Poll $poll): Update
    {
        $this->poll = $poll;
        return $this;
    }

    /**
     * @return PollAnswer|null
     */
    public function getPollAnswer(): ?PollAnswer
    {
        return $this->poll_answer;
    }

    /**
     * @param PollAnswer|null $poll_answer
     *
     * @return Update
     */
    public function setPollAnswer(?PollAnswer $poll_answer): Update
    {
        $this->poll_answer = $poll_answer;
        return $this;
    }

    /**
     * @return PreCheckoutQuery|null
     */
    public function getPreCheckoutQuery(): ?PreCheckoutQuery
    {
        return $this->pre_checkout_query;
    }

    /**
     * @param PreCheckoutQuery|null $pre_checkout_query
     *
     * @return Update
     */
    public function setPreCheckoutQuery(?PreCheckoutQuery $pre_checkout_query): Update
    {
        $this->pre_checkout_query = $pre_checkout_query;
        return $this;
    }

    /**
     * @return ChatBoostRemoved|null
     */
    public function getRemovedChatBoost(): ?ChatBoostRemoved
    {
        return $this->removed_chat_boost;
    }

    /**
     * @param ChatBoostRemoved|null $removed_chat_boost
     *
     * @return Update
     */
    public function setRemovedChatBoost(?ChatBoostRemoved $removed_chat_boost): Update
    {
        $this->removed_chat_boost = $removed_chat_boost;
        return $this;
    }

    /**
     * @return ShippingQuery|null
     */
    public function getShippingQuery(): ?ShippingQuery
    {
        return $this->shipping_query;
    }

    /**
     * @param ShippingQuery|null $shipping_query
     *
     * @return Update
     */
    public function setShippingQuery(?ShippingQuery $shipping_query): Update
    {
        $this->shipping_query = $shipping_query;
        return $this;
    }

    /**
     * @return PaidMediaPurchased|null
     */
    public function getPurchasedPaidMedia(): ?PaidMediaPurchased
    {
        return $this->purchased_paid_media;
    }

    /**
     * @param PaidMediaPurchased|null $purchased_paid_media
     *
     * @return Update
     */
    public function setPurchasedPaidMedia(?PaidMediaPurchased $purchased_paid_media): Update
    {
        $this->purchased_paid_media = $purchased_paid_media;
        return $this;
    }

    public function getType(): ?UpdateTypeEnum
    {
        return match (true) {
            $this->getBusinessConnection() !== null => UpdateTypeEnum::BusinessConnection,
            $this->getBusinessMessage() !== null => UpdateTypeEnum::BusinessMessage,
            $this->getCallbackQuery() !== null => UpdateTypeEnum::CallbackQuery,
            $this->getChannelPost() !== null => UpdateTypeEnum::ChannelPost,
            $this->getChatBoost() !== null => UpdateTypeEnum::ChatBoost,
            $this->getChatJoinRequest() !== null => UpdateTypeEnum::ChatJoinRequest,
            $this->getChatMember() !== null => UpdateTypeEnum::ChatMember,
            $this->getChosenInlineResult() !== null => UpdateTypeEnum::ChosenInlineResult,
            $this->getDeletedBusinessMessages() !== null => UpdateTypeEnum::DeletedBusinessMessages,
            $this->getEditedBusinessMessage() !== null => UpdateTypeEnum::EditedBusinessMessage,
            $this->getEditedChannelPost() !== null => UpdateTypeEnum::EditedChannelPost,
            $this->getEditedMessage() !== null => UpdateTypeEnum::EditedMessage,
            $this->getInlineQuery() !== null => UpdateTypeEnum::InlineQuery,
            $this->getMessage() !== null => UpdateTypeEnum::Message,
            $this->getMessageReaction() !== null => UpdateTypeEnum::MessageReaction,
            $this->getMessageReactionCount() !== null => UpdateTypeEnum::MessageReactionCount,
            $this->getMyChatMember() !== null => UpdateTypeEnum::MyChatMember,
            $this->getPoll() !== null => UpdateTypeEnum::Poll,
            $this->getPollAnswer() !== null => UpdateTypeEnum::PollAnswer,
            $this->getPreCheckoutQuery() !== null => UpdateTypeEnum::PreCheckoutQuery,
            $this->getRemovedChatBoost() !== null => UpdateTypeEnum::RemovedChatBoost,
            $this->getShippingQuery() !== null => UpdateTypeEnum::ShippingQuery,
            $this->getPurchasedPaidmedia() !== null => UpdateTypeEnum::PurchasedPaidMedia,
            default => null,
        };
    }
}
