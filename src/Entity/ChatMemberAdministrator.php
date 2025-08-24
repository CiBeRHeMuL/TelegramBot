<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that has some additional privileges.
 *
 * @see https://core.telegram.org/bots/api#chatmember chat member
 * @link https://core.telegram.org/bots/api#chatmemberadministrator
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Administrator->value))]
class ChatMemberAdministrator extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     * @param bool $can_be_edited True, if the bot is allowed to edit administrator privileges of that user
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
     * @param string|null $custom_title Optional. Custom title for this user
     * @param bool|null $can_manage_direct_messages Optional. True, if the administrator can manage direct messages of the channel
     * and decline suggested posts; for channels only
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
        protected bool $can_be_edited,
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
        protected string|null $custom_title = null,
        protected bool|null $can_manage_direct_messages = null,
    ) {
        parent::__construct(ChatMemberStatusEnum::Administrator);
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return ChatMemberAdministrator
     */
    public function setUser(User $user): ChatMemberAdministrator
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanBeEdited(): bool
    {
        return $this->can_be_edited;
    }

    /**
     * @param bool $can_be_edited
     *
     * @return ChatMemberAdministrator
     */
    public function setCanBeEdited(bool $can_be_edited): ChatMemberAdministrator
    {
        $this->can_be_edited = $can_be_edited;
        return $this;
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
     * @return ChatMemberAdministrator
     */
    public function setIsAnonymous(bool $is_anonymous): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanManageChat(bool $can_manage_chat): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanDeleteMessages(bool $can_delete_messages): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanManageVideoChats(bool $can_manage_video_chats): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanRestrictMembers(bool $can_restrict_members): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanPromoteMembers(bool $can_promote_members): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanChangeInfo(bool $can_change_info): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanInviteUsers(bool $can_invite_users): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanPostStories(bool $can_post_stories): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanEditStories(bool $can_edit_stories): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanDeleteStories(bool $can_delete_stories): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanEditMessages(bool|null $can_edit_messages): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanManageTopics(bool|null $can_manage_topics): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanPinMessages(bool|null $can_pin_messages): ChatMemberAdministrator
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
     * @return ChatMemberAdministrator
     */
    public function setCanPostMessages(bool|null $can_post_messages): ChatMemberAdministrator
    {
        $this->can_post_messages = $can_post_messages;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle(): string|null
    {
        return $this->custom_title;
    }

    /**
     * @param string|null $custom_title
     *
     * @return ChatMemberAdministrator
     */
    public function setCustomTitle(string|null $custom_title): ChatMemberAdministrator
    {
        $this->custom_title = $custom_title;
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
     * @return ChatMemberAdministrator
     */
    public function setCanManageDirectMessages(bool|null $can_manage_direct_messages): ChatMemberAdministrator
    {
        $this->can_manage_direct_messages = $can_manage_direct_messages;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'status' => $this->status->value,
            'user' => $this->user->toArray(),
            'can_be_edited' => $this->can_be_edited,
            'is_anonymous' => $this->is_anonymous,
            'can_manage_chat' => $this->can_manage_chat,
            'can_delete_messages' => $this->can_delete_messages,
            'can_manage_video_chats' => $this->can_manage_video_chats,
            'can_restrict_members' => $this->can_restrict_members,
            'can_promote_members' => $this->can_promote_members,
            'can_change_info' => $this->can_change_info,
            'can_invite_users' => $this->can_invite_users,
            'can_post_stories' => $this->can_post_stories,
            'can_edit_stories' => $this->can_edit_stories,
            'can_delete_stories' => $this->can_delete_stories,
            'can_edit_messages' => $this->can_edit_messages,
            'can_manage_topics' => $this->can_manage_topics,
            'can_pin_messages' => $this->can_pin_messages,
            'can_post_messages' => $this->can_post_messages,
            'custom_title' => $this->custom_title,
            'can_manage_direct_messages' => $this->can_manage_direct_messages,
        ];
    }
}
