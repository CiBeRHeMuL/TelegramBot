<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Represents the rights of an administrator in a chat.
 *
 * @link https://core.telegram.org/bots/api#chatadministratorrights
 */
final class ChatAdministratorRights implements EntityInterface
{
    /**
     * @param bool $is_anonymous True, if the user's presence in the chat is hidden
     * @param bool $can_manage_chat True, if the administrator can access the chat event log, get boost list, see hidden supergroup
     * and channel members, report spam messages, ignore slow mode, and send messages to the chat without paying Telegram Stars.
     * Implied by any other administrator privilege.
     * @param bool $can_delete_messages True, if the administrator can delete messages of other users
     * @param bool $can_manage_video_chats True, if the administrator can manage video chats
     * @param bool $can_restrict_members True, if the administrator can restrict, ban or unban chat members, or access supergroup
     * statistics
     * @param bool $can_promote_members True, if the administrator can add new administrators with a subset of their own privileges
     * or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by
     * the user)
     * @param bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
     * @param bool $can_invite_users True, if the user is allowed to invite new users to the chat
     * @param bool $can_post_stories True, if the administrator can post stories to the chat
     * @param bool $can_edit_stories True, if the administrator can edit stories posted by other users, post stories to the chat
     * page, pin chat stories, and access the chat's story archive
     * @param bool $can_delete_stories True, if the administrator can delete stories posted by other users
     * @param bool|null $can_edit_messages Optional. True, if the administrator can edit messages of other users and can pin messages;
     * for channels only
     * @param bool|null $can_manage_topics Optional. True, if the user is allowed to create, rename, close, and reopen forum topics;
     * for supergroups only
     * @param bool|null $can_pin_messages Optional. True, if the user is allowed to pin messages; for groups and supergroups only
     * @param bool|null $can_post_messages Optional. True, if the administrator can post messages in the channel, approve suggested
     * posts, or access channel statistics; for channels only
     * @param bool|null $can_manage_direct_messages Optional. True, if the administrator can manage direct messages of the channel
     * and decline suggested posts; for channels only
     */
    public function __construct(
        protected bool $is_anonymous,
        protected bool $can_manage_chat,
        protected bool $can_delete_messages,
        protected bool $can_manage_video_chats,
        protected bool $can_restrict_members,
        protected bool $can_promote_members,
        protected bool $can_change_info,
        protected bool $can_invite_users,
        protected bool $can_post_stories,
        protected bool $can_edit_stories,
        protected bool $can_delete_stories,
        protected bool|null $can_edit_messages = null,
        protected bool|null $can_manage_topics = null,
        protected bool|null $can_pin_messages = null,
        protected bool|null $can_post_messages = null,
        protected bool|null $can_manage_direct_messages = null,
    ) {
    }

    /**
     * @return bool
     */
    public function getIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    /**
     * @param bool $is_anonymous
     *
     * @return ChatAdministratorRights
     */
    public function setIsAnonymous(bool $is_anonymous): ChatAdministratorRights
    {
        $this->is_anonymous = $is_anonymous;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanManageChat(): bool
    {
        return $this->can_manage_chat;
    }

    /**
     * @param bool $can_manage_chat
     *
     * @return ChatAdministratorRights
     */
    public function setCanManageChat(bool $can_manage_chat): ChatAdministratorRights
    {
        $this->can_manage_chat = $can_manage_chat;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanDeleteMessages(): bool
    {
        return $this->can_delete_messages;
    }

    /**
     * @param bool $can_delete_messages
     *
     * @return ChatAdministratorRights
     */
    public function setCanDeleteMessages(bool $can_delete_messages): ChatAdministratorRights
    {
        $this->can_delete_messages = $can_delete_messages;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanManageVideoChats(): bool
    {
        return $this->can_manage_video_chats;
    }

    /**
     * @param bool $can_manage_video_chats
     *
     * @return ChatAdministratorRights
     */
    public function setCanManageVideoChats(bool $can_manage_video_chats): ChatAdministratorRights
    {
        $this->can_manage_video_chats = $can_manage_video_chats;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanRestrictMembers(): bool
    {
        return $this->can_restrict_members;
    }

    /**
     * @param bool $can_restrict_members
     *
     * @return ChatAdministratorRights
     */
    public function setCanRestrictMembers(bool $can_restrict_members): ChatAdministratorRights
    {
        $this->can_restrict_members = $can_restrict_members;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanPromoteMembers(): bool
    {
        return $this->can_promote_members;
    }

    /**
     * @param bool $can_promote_members
     *
     * @return ChatAdministratorRights
     */
    public function setCanPromoteMembers(bool $can_promote_members): ChatAdministratorRights
    {
        $this->can_promote_members = $can_promote_members;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanChangeInfo(): bool
    {
        return $this->can_change_info;
    }

    /**
     * @param bool $can_change_info
     *
     * @return ChatAdministratorRights
     */
    public function setCanChangeInfo(bool $can_change_info): ChatAdministratorRights
    {
        $this->can_change_info = $can_change_info;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanInviteUsers(): bool
    {
        return $this->can_invite_users;
    }

    /**
     * @param bool $can_invite_users
     *
     * @return ChatAdministratorRights
     */
    public function setCanInviteUsers(bool $can_invite_users): ChatAdministratorRights
    {
        $this->can_invite_users = $can_invite_users;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanPostStories(): bool
    {
        return $this->can_post_stories;
    }

    /**
     * @param bool $can_post_stories
     *
     * @return ChatAdministratorRights
     */
    public function setCanPostStories(bool $can_post_stories): ChatAdministratorRights
    {
        $this->can_post_stories = $can_post_stories;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanEditStories(): bool
    {
        return $this->can_edit_stories;
    }

    /**
     * @param bool $can_edit_stories
     *
     * @return ChatAdministratorRights
     */
    public function setCanEditStories(bool $can_edit_stories): ChatAdministratorRights
    {
        $this->can_edit_stories = $can_edit_stories;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanDeleteStories(): bool
    {
        return $this->can_delete_stories;
    }

    /**
     * @param bool $can_delete_stories
     *
     * @return ChatAdministratorRights
     */
    public function setCanDeleteStories(bool $can_delete_stories): ChatAdministratorRights
    {
        $this->can_delete_stories = $can_delete_stories;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanEditMessages(): bool|null
    {
        return $this->can_edit_messages;
    }

    /**
     * @param bool|null $can_edit_messages
     *
     * @return ChatAdministratorRights
     */
    public function setCanEditMessages(bool|null $can_edit_messages): ChatAdministratorRights
    {
        $this->can_edit_messages = $can_edit_messages;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanManageTopics(): bool|null
    {
        return $this->can_manage_topics;
    }

    /**
     * @param bool|null $can_manage_topics
     *
     * @return ChatAdministratorRights
     */
    public function setCanManageTopics(bool|null $can_manage_topics): ChatAdministratorRights
    {
        $this->can_manage_topics = $can_manage_topics;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanPinMessages(): bool|null
    {
        return $this->can_pin_messages;
    }

    /**
     * @param bool|null $can_pin_messages
     *
     * @return ChatAdministratorRights
     */
    public function setCanPinMessages(bool|null $can_pin_messages): ChatAdministratorRights
    {
        $this->can_pin_messages = $can_pin_messages;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanPostMessages(): bool|null
    {
        return $this->can_post_messages;
    }

    /**
     * @param bool|null $can_post_messages
     *
     * @return ChatAdministratorRights
     */
    public function setCanPostMessages(bool|null $can_post_messages): ChatAdministratorRights
    {
        $this->can_post_messages = $can_post_messages;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanManageDirectMessages(): bool|null
    {
        return $this->can_manage_direct_messages;
    }

    /**
     * @param bool|null $can_manage_direct_messages
     *
     * @return ChatAdministratorRights
     */
    public function setCanManageDirectMessages(bool|null $can_manage_direct_messages): ChatAdministratorRights
    {
        $this->can_manage_direct_messages = $can_manage_direct_messages;
        return $this;
    }
}
