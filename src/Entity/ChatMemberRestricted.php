<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
 * @link https://core.telegram.org/bots/api#chatmemberrestricted
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Restricted->value))]
class ChatMemberRestricted extends AbstractChatMember
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
     * @param bool $can_send_polls True, if the user is allowed to send polls
     * @param bool $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
     * @param bool $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
     * @param bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
     * @param bool $can_invite_users True, if the user is allowed to invite new users to the chat
     * @param bool $can_pin_messages True, if the user is allowed to pin messages
     * @param bool $can_manage_topics True, if the user is allowed to create forum topics
     * @param int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever
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
    ) {
        parent::__construct(ChatMemberStatusEnum::Restricted);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): ChatMemberRestricted
    {
        $this->user = $user;
        return $this;
    }

    public function getIsMember(): bool
    {
        return $this->is_member;
    }

    public function setIsMember(bool $is_member): ChatMemberRestricted
    {
        $this->is_member = $is_member;
        return $this;
    }

    public function getCanSendMessages(): bool
    {
        return $this->can_send_messages;
    }

    public function setCanSendMessages(bool $can_send_messages): ChatMemberRestricted
    {
        $this->can_send_messages = $can_send_messages;
        return $this;
    }

    public function getCanSendAudios(): bool
    {
        return $this->can_send_audios;
    }

    public function setCanSendAudios(bool $can_send_audios): ChatMemberRestricted
    {
        $this->can_send_audios = $can_send_audios;
        return $this;
    }

    public function getCanSendDocuments(): bool
    {
        return $this->can_send_documents;
    }

    public function setCanSendDocuments(bool $can_send_documents): ChatMemberRestricted
    {
        $this->can_send_documents = $can_send_documents;
        return $this;
    }

    public function getCanSendPhotos(): bool
    {
        return $this->can_send_photos;
    }

    public function setCanSendPhotos(bool $can_send_photos): ChatMemberRestricted
    {
        $this->can_send_photos = $can_send_photos;
        return $this;
    }

    public function getCanSendVideos(): bool
    {
        return $this->can_send_videos;
    }

    public function setCanSendVideos(bool $can_send_videos): ChatMemberRestricted
    {
        $this->can_send_videos = $can_send_videos;
        return $this;
    }

    public function getCanSendVideoNotes(): bool
    {
        return $this->can_send_video_notes;
    }

    public function setCanSendVideoNotes(bool $can_send_video_notes): ChatMemberRestricted
    {
        $this->can_send_video_notes = $can_send_video_notes;
        return $this;
    }

    public function getCanSendVoiceNotes(): bool
    {
        return $this->can_send_voice_notes;
    }

    public function setCanSendVoiceNotes(bool $can_send_voice_notes): ChatMemberRestricted
    {
        $this->can_send_voice_notes = $can_send_voice_notes;
        return $this;
    }

    public function getCanSendPolls(): bool
    {
        return $this->can_send_polls;
    }

    public function setCanSendPolls(bool $can_send_polls): ChatMemberRestricted
    {
        $this->can_send_polls = $can_send_polls;
        return $this;
    }

    public function getCanSendOtherMessages(): bool
    {
        return $this->can_send_other_messages;
    }

    public function setCanSendOtherMessages(bool $can_send_other_messages): ChatMemberRestricted
    {
        $this->can_send_other_messages = $can_send_other_messages;
        return $this;
    }

    public function getCanAddWebPagePreviews(): bool
    {
        return $this->can_add_web_page_previews;
    }

    public function setCanAddWebPagePreviews(bool $can_add_web_page_previews): ChatMemberRestricted
    {
        $this->can_add_web_page_previews = $can_add_web_page_previews;
        return $this;
    }

    public function getCanChangeInfo(): bool
    {
        return $this->can_change_info;
    }

    public function setCanChangeInfo(bool $can_change_info): ChatMemberRestricted
    {
        $this->can_change_info = $can_change_info;
        return $this;
    }

    public function getCanInviteUsers(): bool
    {
        return $this->can_invite_users;
    }

    public function setCanInviteUsers(bool $can_invite_users): ChatMemberRestricted
    {
        $this->can_invite_users = $can_invite_users;
        return $this;
    }

    public function getCanPinMessages(): bool
    {
        return $this->can_pin_messages;
    }

    public function setCanPinMessages(bool $can_pin_messages): ChatMemberRestricted
    {
        $this->can_pin_messages = $can_pin_messages;
        return $this;
    }

    public function getCanManageTopics(): bool
    {
        return $this->can_manage_topics;
    }

    public function setCanManageTopics(bool $can_manage_topics): ChatMemberRestricted
    {
        $this->can_manage_topics = $can_manage_topics;
        return $this;
    }

    public function getUntilDate(): int
    {
        return $this->until_date;
    }

    public function setUntilDate(int $until_date): ChatMemberRestricted
    {
        $this->until_date = $until_date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'status' => $this->status,
            'user' => $this->user->toArray(),
            'is_member' => $this->is_member,
            'can_send_messages' => $this->can_send_messages,
            'can_send_audios' => $this->can_send_audios,
            'can_send_documents' => $this->can_send_documents,
            'can_send_photos' => $this->can_send_photos,
            'can_send_videos' => $this->can_send_videos,
            'can_send_video_notes' => $this->can_send_video_notes,
            'can_send_voice_notes' => $this->can_send_voice_notes,
            'can_send_polls' => $this->can_send_polls,
            'can_send_other_messages' => $this->can_send_other_messages,
            'can_add_web_page_previews' => $this->can_add_web_page_previews,
            'can_change_info' => $this->can_change_info,
            'can_invite_users' => $this->can_invite_users,
            'can_pin_messages' => $this->can_pin_messages,
            'can_manage_topics' => $this->can_manage_topics,
            'until_date' => $this->until_date,
        ];
    }
}
