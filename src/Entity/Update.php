<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents an incoming update.At most one of the optional parameters can be present in any given update.
 * @link https://core.telegram.org/bots/api#update
 */
class Update implements EntityInterface
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
     */
    public function __construct(
        private int $update_id,
        private BusinessConnection|null $business_connection = null,
        private Message|null $business_message = null,
        private CallbackQuery|null $callback_query = null,
        private Message|null $channel_post = null,
        private ChatBoostUpdated|null $chat_boost = null,
        private ChatJoinRequest|null $chat_join_request = null,
        private ChatMemberUpdated|null $chat_member = null,
        private ChosenInlineResult|null $chosen_inline_result = null,
        private BusinessMessagesDeleted|null $deleted_business_messages = null,
        private Message|null $edited_business_message = null,
        private Message|null $edited_channel_post = null,
        private Message|null $edited_message = null,
        private InlineQuery|null $inline_query = null,
        private Message|null $message = null,
        private MessageReactionUpdated|null $message_reaction = null,
        private MessageReactionCountUpdated|null $message_reaction_count = null,
        private ChatMemberUpdated|null $my_chat_member = null,
        private Poll|null $poll = null,
        private PollAnswer|null $poll_answer = null,
        private PreCheckoutQuery|null $pre_checkout_query = null,
        private ChatBoostRemoved|null $removed_chat_boost = null,
        private ShippingQuery|null $shipping_query = null,
    ) {
    }

    public function getUpdateId(): int
    {
        return $this->update_id;
    }

    public function setUpdateId(int $update_id): Update
    {
        $this->update_id = $update_id;
        return $this;
    }

    public function getBusinessConnection(): BusinessConnection|null
    {
        return $this->business_connection;
    }

    public function setBusinessConnection(BusinessConnection|null $business_connection): Update
    {
        $this->business_connection = $business_connection;
        return $this;
    }

    public function getBusinessMessage(): Message|null
    {
        return $this->business_message;
    }

    public function setBusinessMessage(Message|null $business_message): Update
    {
        $this->business_message = $business_message;
        return $this;
    }

    public function getCallbackQuery(): CallbackQuery|null
    {
        return $this->callback_query;
    }

    public function setCallbackQuery(CallbackQuery|null $callback_query): Update
    {
        $this->callback_query = $callback_query;
        return $this;
    }

    public function getChannelPost(): Message|null
    {
        return $this->channel_post;
    }

    public function setChannelPost(Message|null $channel_post): Update
    {
        $this->channel_post = $channel_post;
        return $this;
    }

    public function getChatBoost(): ChatBoostUpdated|null
    {
        return $this->chat_boost;
    }

    public function setChatBoost(ChatBoostUpdated|null $chat_boost): Update
    {
        $this->chat_boost = $chat_boost;
        return $this;
    }

    public function getChatJoinRequest(): ChatJoinRequest|null
    {
        return $this->chat_join_request;
    }

    public function setChatJoinRequest(ChatJoinRequest|null $chat_join_request): Update
    {
        $this->chat_join_request = $chat_join_request;
        return $this;
    }

    public function getChatMember(): ChatMemberUpdated|null
    {
        return $this->chat_member;
    }

    public function setChatMember(ChatMemberUpdated|null $chat_member): Update
    {
        $this->chat_member = $chat_member;
        return $this;
    }

    public function getChosenInlineResult(): ChosenInlineResult|null
    {
        return $this->chosen_inline_result;
    }

    public function setChosenInlineResult(ChosenInlineResult|null $chosen_inline_result): Update
    {
        $this->chosen_inline_result = $chosen_inline_result;
        return $this;
    }

    public function getDeletedBusinessMessages(): BusinessMessagesDeleted|null
    {
        return $this->deleted_business_messages;
    }

    public function setDeletedBusinessMessages(BusinessMessagesDeleted|null $deleted_business_messages): Update
    {
        $this->deleted_business_messages = $deleted_business_messages;
        return $this;
    }

    public function getEditedBusinessMessage(): Message|null
    {
        return $this->edited_business_message;
    }

    public function setEditedBusinessMessage(Message|null $edited_business_message): Update
    {
        $this->edited_business_message = $edited_business_message;
        return $this;
    }

    public function getEditedChannelPost(): Message|null
    {
        return $this->edited_channel_post;
    }

    public function setEditedChannelPost(Message|null $edited_channel_post): Update
    {
        $this->edited_channel_post = $edited_channel_post;
        return $this;
    }

    public function getEditedMessage(): Message|null
    {
        return $this->edited_message;
    }

    public function setEditedMessage(Message|null $edited_message): Update
    {
        $this->edited_message = $edited_message;
        return $this;
    }

    public function getInlineQuery(): InlineQuery|null
    {
        return $this->inline_query;
    }

    public function setInlineQuery(InlineQuery|null $inline_query): Update
    {
        $this->inline_query = $inline_query;
        return $this;
    }

    public function getMessage(): Message|null
    {
        return $this->message;
    }

    public function setMessage(Message|null $message): Update
    {
        $this->message = $message;
        return $this;
    }

    public function getMessageReaction(): MessageReactionUpdated|null
    {
        return $this->message_reaction;
    }

    public function setMessageReaction(MessageReactionUpdated|null $message_reaction): Update
    {
        $this->message_reaction = $message_reaction;
        return $this;
    }

    public function getMessageReactionCount(): MessageReactionCountUpdated|null
    {
        return $this->message_reaction_count;
    }

    public function setMessageReactionCount(MessageReactionCountUpdated|null $message_reaction_count): Update
    {
        $this->message_reaction_count = $message_reaction_count;
        return $this;
    }

    public function getMyChatMember(): ChatMemberUpdated|null
    {
        return $this->my_chat_member;
    }

    public function setMyChatMember(ChatMemberUpdated|null $my_chat_member): Update
    {
        $this->my_chat_member = $my_chat_member;
        return $this;
    }

    public function getPoll(): Poll|null
    {
        return $this->poll;
    }

    public function setPoll(Poll|null $poll): Update
    {
        $this->poll = $poll;
        return $this;
    }

    public function getPollAnswer(): PollAnswer|null
    {
        return $this->poll_answer;
    }

    public function setPollAnswer(PollAnswer|null $poll_answer): Update
    {
        $this->poll_answer = $poll_answer;
        return $this;
    }

    public function getPreCheckoutQuery(): PreCheckoutQuery|null
    {
        return $this->pre_checkout_query;
    }

    public function setPreCheckoutQuery(PreCheckoutQuery|null $pre_checkout_query): Update
    {
        $this->pre_checkout_query = $pre_checkout_query;
        return $this;
    }

    public function getRemovedChatBoost(): ChatBoostRemoved|null
    {
        return $this->removed_chat_boost;
    }

    public function setRemovedChatBoost(ChatBoostRemoved|null $removed_chat_boost): Update
    {
        $this->removed_chat_boost = $removed_chat_boost;
        return $this;
    }

    public function getShippingQuery(): ShippingQuery|null
    {
        return $this->shipping_query;
    }

    public function setShippingQuery(ShippingQuery|null $shipping_query): Update
    {
        $this->shipping_query = $shipping_query;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'update_id' => $this->update_id,
            'business_connection' => $this->business_connection?->toArray(),
            'business_message' => $this->business_message?->toArray(),
            'callback_query' => $this->callback_query?->toArray(),
            'channel_post' => $this->channel_post?->toArray(),
            'chat_boost' => $this->chat_boost?->toArray(),
            'chat_join_request' => $this->chat_join_request?->toArray(),
            'chat_member' => $this->chat_member?->toArray(),
            'chosen_inline_result' => $this->chosen_inline_result?->toArray(),
            'deleted_business_messages' => $this->deleted_business_messages?->toArray(),
            'edited_business_message' => $this->edited_business_message?->toArray(),
            'edited_channel_post' => $this->edited_channel_post?->toArray(),
            'edited_message' => $this->edited_message?->toArray(),
            'inline_query' => $this->inline_query?->toArray(),
            'message' => $this->message?->toArray(),
            'message_reaction' => $this->message_reaction?->toArray(),
            'message_reaction_count' => $this->message_reaction_count?->toArray(),
            'my_chat_member' => $this->my_chat_member?->toArray(),
            'poll' => $this->poll?->toArray(),
            'poll_answer' => $this->poll_answer?->toArray(),
            'pre_checkout_query' => $this->pre_checkout_query?->toArray(),
            'removed_chat_boost' => $this->removed_chat_boost?->toArray(),
            'shipping_query' => $this->shipping_query?->toArray(),
        ];
    }
}
