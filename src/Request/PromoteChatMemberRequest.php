<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#promotechatmember
 */
class PromoteChatMemberRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param int $user_id Unique identifier of the target user
     * @param bool|null $can_change_info Pass True if the administrator can change chat title, photo and other settings
     * @param bool|null $can_delete_messages Pass True if the administrator can delete messages of other users
     * @param bool|null $can_delete_stories Pass True if the administrator can delete stories posted by other users
     * @param bool|null $can_edit_messages Pass True if the administrator can edit messages of other users and can pin messages;
     * for channels only
     * @param bool|null $can_edit_stories Pass True if the administrator can edit stories posted by other users, post stories to
     * the chat page, pin chat stories, and access the chat's story archive
     * @param bool|null $can_invite_users Pass True if the administrator can invite new users to the chat
     * @param bool|null $can_manage_chat Pass True if the administrator can access the chat event log, get boost list, see hidden
     * supergroup and channel members, report spam messages, ignore slow mode, and send messages to the chat without paying Telegram
     * Stars. Implied by any other administrator privilege.
     * @param bool|null $can_manage_topics Pass True if the user is allowed to create, rename, close, and reopen forum topics; for
     * supergroups only
     * @param bool|null $can_manage_video_chats Pass True if the administrator can manage video chats
     * @param bool|null $can_pin_messages Pass True if the administrator can pin messages; for supergroups only
     * @param bool|null $can_post_messages Pass True if the administrator can post messages in the channel, approve suggested posts,
     * or access channel statistics; for channels only
     * @param bool|null $can_post_stories Pass True if the administrator can post stories to the chat
     * @param bool|null $can_promote_members Pass True if the administrator can add new administrators with a subset of their own
     * privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were
     * appointed by him)
     * @param bool|null $can_restrict_members Pass True if the administrator can restrict, ban or unban chat members, or access supergroup
     * statistics
     * @param bool|null $is_anonymous Pass True if the administrator's presence in the chat is hidden
     * @param bool|null $can_manage_direct_messages Pass True if the administrator can manage direct messages within the channel
     * and decline suggested posts; for channels only
     */
    public function __construct(
        private ChatId $chat_id,
        private int $user_id,
        private bool|null $can_change_info = null,
        private bool|null $can_delete_messages = null,
        private bool|null $can_delete_stories = null,
        private bool|null $can_edit_messages = null,
        private bool|null $can_edit_stories = null,
        private bool|null $can_invite_users = null,
        private bool|null $can_manage_chat = null,
        private bool|null $can_manage_topics = null,
        private bool|null $can_manage_video_chats = null,
        private bool|null $can_pin_messages = null,
        private bool|null $can_post_messages = null,
        private bool|null $can_post_stories = null,
        private bool|null $can_promote_members = null,
        private bool|null $can_restrict_members = null,
        private bool|null $is_anonymous = null,
        private bool|null $can_manage_direct_messages = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): PromoteChatMemberRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): PromoteChatMemberRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getCanChangeInfo(): bool|null
    {
        return $this->can_change_info;
    }

    public function setCanChangeInfo(bool|null $can_change_info): PromoteChatMemberRequest
    {
        $this->can_change_info = $can_change_info;
        return $this;
    }

    public function getCanDeleteMessages(): bool|null
    {
        return $this->can_delete_messages;
    }

    public function setCanDeleteMessages(bool|null $can_delete_messages): PromoteChatMemberRequest
    {
        $this->can_delete_messages = $can_delete_messages;
        return $this;
    }

    public function getCanDeleteStories(): bool|null
    {
        return $this->can_delete_stories;
    }

    public function setCanDeleteStories(bool|null $can_delete_stories): PromoteChatMemberRequest
    {
        $this->can_delete_stories = $can_delete_stories;
        return $this;
    }

    public function getCanEditMessages(): bool|null
    {
        return $this->can_edit_messages;
    }

    public function setCanEditMessages(bool|null $can_edit_messages): PromoteChatMemberRequest
    {
        $this->can_edit_messages = $can_edit_messages;
        return $this;
    }

    public function getCanEditStories(): bool|null
    {
        return $this->can_edit_stories;
    }

    public function setCanEditStories(bool|null $can_edit_stories): PromoteChatMemberRequest
    {
        $this->can_edit_stories = $can_edit_stories;
        return $this;
    }

    public function getCanInviteUsers(): bool|null
    {
        return $this->can_invite_users;
    }

    public function setCanInviteUsers(bool|null $can_invite_users): PromoteChatMemberRequest
    {
        $this->can_invite_users = $can_invite_users;
        return $this;
    }

    public function getCanManageChat(): bool|null
    {
        return $this->can_manage_chat;
    }

    public function setCanManageChat(bool|null $can_manage_chat): PromoteChatMemberRequest
    {
        $this->can_manage_chat = $can_manage_chat;
        return $this;
    }

    public function getCanManageTopics(): bool|null
    {
        return $this->can_manage_topics;
    }

    public function setCanManageTopics(bool|null $can_manage_topics): PromoteChatMemberRequest
    {
        $this->can_manage_topics = $can_manage_topics;
        return $this;
    }

    public function getCanManageVideoChats(): bool|null
    {
        return $this->can_manage_video_chats;
    }

    public function setCanManageVideoChats(bool|null $can_manage_video_chats): PromoteChatMemberRequest
    {
        $this->can_manage_video_chats = $can_manage_video_chats;
        return $this;
    }

    public function getCanPinMessages(): bool|null
    {
        return $this->can_pin_messages;
    }

    public function setCanPinMessages(bool|null $can_pin_messages): PromoteChatMemberRequest
    {
        $this->can_pin_messages = $can_pin_messages;
        return $this;
    }

    public function getCanPostMessages(): bool|null
    {
        return $this->can_post_messages;
    }

    public function setCanPostMessages(bool|null $can_post_messages): PromoteChatMemberRequest
    {
        $this->can_post_messages = $can_post_messages;
        return $this;
    }

    public function getCanPostStories(): bool|null
    {
        return $this->can_post_stories;
    }

    public function setCanPostStories(bool|null $can_post_stories): PromoteChatMemberRequest
    {
        $this->can_post_stories = $can_post_stories;
        return $this;
    }

    public function getCanPromoteMembers(): bool|null
    {
        return $this->can_promote_members;
    }

    public function setCanPromoteMembers(bool|null $can_promote_members): PromoteChatMemberRequest
    {
        $this->can_promote_members = $can_promote_members;
        return $this;
    }

    public function getCanRestrictMembers(): bool|null
    {
        return $this->can_restrict_members;
    }

    public function setCanRestrictMembers(bool|null $can_restrict_members): PromoteChatMemberRequest
    {
        $this->can_restrict_members = $can_restrict_members;
        return $this;
    }

    public function getIsAnonymous(): bool|null
    {
        return $this->is_anonymous;
    }

    public function setIsAnonymous(bool|null $is_anonymous): PromoteChatMemberRequest
    {
        $this->is_anonymous = $is_anonymous;
        return $this;
    }

    public function getCanManageDirectMessages(): bool|null
    {
        return $this->can_manage_direct_messages;
    }

    public function setCanManageDirectMessages(bool|null $can_manage_direct_messages): PromoteChatMemberRequest
    {
        $this->can_manage_direct_messages = $can_manage_direct_messages;
        return $this;
    }
}
