<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;

/**
 * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
 *
 * @see https://core.telegram.org/bots/api#chatmember chat member
 * @link https://core.telegram.org/bots/api#chatmemberrestricted
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Restricted->value))]
final class ChatMemberRestricted extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     * @param bool $is_member True, if the user is a member of the chat at the moment of the request
     * @param bool $can_send_messages True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners,
     * invoices, locations and venues
     * @param bool $can_send_audios True, if the user is allowed to send audios
     * @param bool $can_send_documents True, if the user is allowed to send documents
     * @param bool $can_send_photos True, if the user is allowed to send photos
     * @param bool $can_send_videos True, if the user is allowed to send videos
     * @param bool $can_send_video_notes True, if the user is allowed to send video notes
     * @param bool $can_send_voice_notes True, if the user is allowed to send voice notes
     * @param bool $can_send_polls True, if the user is allowed to send polls and checklists
     * @param bool $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
     * @param bool $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
     * @param bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
     * @param bool $can_invite_users True, if the user is allowed to invite new users to the chat
     * @param bool $can_pin_messages True, if the user is allowed to pin messages
     * @param bool $can_manage_topics True, if the user is allowed to create forum topics
     * @param int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever
     * @param bool $can_edit_tag True, if the user is allowed to edit their own tag
     * @param string|null $tag Optional. Tag of the member
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
        protected bool $is_member,
        protected bool $can_send_messages,
        protected bool $can_send_audios,
        protected bool $can_send_documents,
        protected bool $can_send_photos,
        protected bool $can_send_videos,
        protected bool $can_send_video_notes,
        protected bool $can_send_voice_notes,
        protected bool $can_send_polls,
        protected bool $can_send_other_messages,
        protected bool $can_add_web_page_previews,
        protected bool $can_change_info,
        protected bool $can_invite_users,
        protected bool $can_pin_messages,
        protected bool $can_manage_topics,
        protected int $until_date,
        protected bool $can_edit_tag,
        protected ?string $tag = null,
    ) {
        parent::__construct(ChatMemberStatusEnum::Restricted);
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
     * @return ChatMemberRestricted
     */
    public function setUser(User $user): ChatMemberRestricted
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsMember(): bool
    {
        return $this->is_member;
    }

    /**
     * @param bool $is_member
     *
     * @return ChatMemberRestricted
     */
    public function setIsMember(bool $is_member): ChatMemberRestricted
    {
        $this->is_member = $is_member;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendMessages(): bool
    {
        return $this->can_send_messages;
    }

    /**
     * @param bool $can_send_messages
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendMessages(bool $can_send_messages): ChatMemberRestricted
    {
        $this->can_send_messages = $can_send_messages;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendAudios(): bool
    {
        return $this->can_send_audios;
    }

    /**
     * @param bool $can_send_audios
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendAudios(bool $can_send_audios): ChatMemberRestricted
    {
        $this->can_send_audios = $can_send_audios;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendDocuments(): bool
    {
        return $this->can_send_documents;
    }

    /**
     * @param bool $can_send_documents
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendDocuments(bool $can_send_documents): ChatMemberRestricted
    {
        $this->can_send_documents = $can_send_documents;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendPhotos(): bool
    {
        return $this->can_send_photos;
    }

    /**
     * @param bool $can_send_photos
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendPhotos(bool $can_send_photos): ChatMemberRestricted
    {
        $this->can_send_photos = $can_send_photos;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendVideos(): bool
    {
        return $this->can_send_videos;
    }

    /**
     * @param bool $can_send_videos
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendVideos(bool $can_send_videos): ChatMemberRestricted
    {
        $this->can_send_videos = $can_send_videos;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendVideoNotes(): bool
    {
        return $this->can_send_video_notes;
    }

    /**
     * @param bool $can_send_video_notes
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendVideoNotes(bool $can_send_video_notes): ChatMemberRestricted
    {
        $this->can_send_video_notes = $can_send_video_notes;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendVoiceNotes(): bool
    {
        return $this->can_send_voice_notes;
    }

    /**
     * @param bool $can_send_voice_notes
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendVoiceNotes(bool $can_send_voice_notes): ChatMemberRestricted
    {
        $this->can_send_voice_notes = $can_send_voice_notes;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendPolls(): bool
    {
        return $this->can_send_polls;
    }

    /**
     * @param bool $can_send_polls
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendPolls(bool $can_send_polls): ChatMemberRestricted
    {
        $this->can_send_polls = $can_send_polls;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendOtherMessages(): bool
    {
        return $this->can_send_other_messages;
    }

    /**
     * @param bool $can_send_other_messages
     *
     * @return ChatMemberRestricted
     */
    public function setCanSendOtherMessages(bool $can_send_other_messages): ChatMemberRestricted
    {
        $this->can_send_other_messages = $can_send_other_messages;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanAddWebPagePreviews(): bool
    {
        return $this->can_add_web_page_previews;
    }

    /**
     * @param bool $can_add_web_page_previews
     *
     * @return ChatMemberRestricted
     */
    public function setCanAddWebPagePreviews(bool $can_add_web_page_previews): ChatMemberRestricted
    {
        $this->can_add_web_page_previews = $can_add_web_page_previews;
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
     * @return ChatMemberRestricted
     */
    public function setCanChangeInfo(bool $can_change_info): ChatMemberRestricted
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
     * @return ChatMemberRestricted
     */
    public function setCanInviteUsers(bool $can_invite_users): ChatMemberRestricted
    {
        $this->can_invite_users = $can_invite_users;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanPinMessages(): bool
    {
        return $this->can_pin_messages;
    }

    /**
     * @param bool $can_pin_messages
     *
     * @return ChatMemberRestricted
     */
    public function setCanPinMessages(bool $can_pin_messages): ChatMemberRestricted
    {
        $this->can_pin_messages = $can_pin_messages;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanManageTopics(): bool
    {
        return $this->can_manage_topics;
    }

    /**
     * @param bool $can_manage_topics
     *
     * @return ChatMemberRestricted
     */
    public function setCanManageTopics(bool $can_manage_topics): ChatMemberRestricted
    {
        $this->can_manage_topics = $can_manage_topics;
        return $this;
    }

    /**
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->until_date;
    }

    /**
     * @param int $until_date
     *
     * @return ChatMemberRestricted
     */
    public function setUntilDate(int $until_date): ChatMemberRestricted
    {
        $this->until_date = $until_date;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanEditTag(): bool
    {
        return $this->can_edit_tag;
    }

    /**
     * @param bool $can_edit_tag
     *
     * @return ChatMemberRestricted
     */
    public function setCanEditTag(bool $can_edit_tag): ChatMemberRestricted
    {
        $this->can_edit_tag = $can_edit_tag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @param string|null $tag
     *
     * @return ChatMemberRestricted
     */
    public function setTag(?string $tag): ChatMemberRestricted
    {
        $this->tag = $tag;
        return $this;
    }
}
