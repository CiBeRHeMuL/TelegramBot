<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 * @link https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions implements EntityInterface
{
    /**
     * ChatPermissions constructor.
     *
     * @param bool|null $can_send_messages True, if the user is allowed to send text messages, contacts,
     * giveaways, giveaway winners, invoices, locations and venues
     * @param bool|null $can_send_audios True, if the user is allowed to send audios
     * @param bool|null $can_send_documents True, if the user is allowed to send documents
     * @param bool|null $can_send_photos True, if the user is allowed to send photos
     * @param bool|null $can_send_videos True, if the user is allowed to send videos
     * @param bool|null $can_send_video_notes True, if the user is allowed to send video notes
     * @param bool|null $can_send_voice_notes True, if the user is allowed to send voice notes
     * @param bool|null $can_send_polls True, if the user is allowed to send polls
     * @param bool|null $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
     * @param bool|null $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
     * @param bool|null $can_change_info True, if the user is allowed to change the chat title, photo and other settings.
     * Ignored in public supergroups
     * @param bool|null $can_invite_users True, if the user is allowed to invite new users to the chat
     * @param bool|null $can_pin_messages True, if the user is allowed to pin messages. Ignored in public supergroups
     * @param bool|null $can_manage_topics True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
     */
    public function __construct(
        private bool|null $can_send_messages = null,
        private bool|null $can_send_audios = null,
        private bool|null $can_send_documents = null,
        private bool|null $can_send_photos = null,
        private bool|null $can_send_videos = null,
        private bool|null $can_send_video_notes = null,
        private bool|null $can_send_voice_notes = null,
        private bool|null $can_send_polls = null,
        private bool|null $can_send_other_messages = null,
        private bool|null $can_add_web_page_previews = null,
        private bool|null $can_change_info = null,
        private bool|null $can_invite_users = null,
        private bool|null $can_pin_messages = null,
        private bool|null $can_manage_topics = null,
    ) {
    }

    public function getCanSendMessages(): bool|null
    {
        return $this->can_send_messages;
    }

    public function setCanSendMessages(bool|null $can_send_messages): ChatPermissions
    {
        $this->can_send_messages = $can_send_messages;
        return $this;
    }

    public function getCanSendAudios(): bool|null
    {
        return $this->can_send_audios;
    }

    public function setCanSendAudios(bool|null $can_send_audios): ChatPermissions
    {
        $this->can_send_audios = $can_send_audios;
        return $this;
    }

    public function getCanSendDocuments(): bool|null
    {
        return $this->can_send_documents;
    }

    public function setCanSendDocuments(bool|null $can_send_documents): ChatPermissions
    {
        $this->can_send_documents = $can_send_documents;
        return $this;
    }

    public function getCanSendPhotos(): bool|null
    {
        return $this->can_send_photos;
    }

    public function setCanSendPhotos(bool|null $can_send_photos): ChatPermissions
    {
        $this->can_send_photos = $can_send_photos;
        return $this;
    }

    public function getCanSendVideos(): bool|null
    {
        return $this->can_send_videos;
    }

    public function setCanSendVideos(bool|null $can_send_videos): ChatPermissions
    {
        $this->can_send_videos = $can_send_videos;
        return $this;
    }

    public function getCanSendVideoNotes(): bool|null
    {
        return $this->can_send_video_notes;
    }

    public function setCanSendVideoNotes(bool|null $can_send_video_notes): ChatPermissions
    {
        $this->can_send_video_notes = $can_send_video_notes;
        return $this;
    }

    public function getCanSendVoiceNotes(): bool|null
    {
        return $this->can_send_voice_notes;
    }

    public function setCanSendVoiceNotes(bool|null $can_send_voice_notes): ChatPermissions
    {
        $this->can_send_voice_notes = $can_send_voice_notes;
        return $this;
    }

    public function getCanSendPolls(): bool|null
    {
        return $this->can_send_polls;
    }

    public function setCanSendPolls(bool|null $can_send_polls): ChatPermissions
    {
        $this->can_send_polls = $can_send_polls;
        return $this;
    }

    public function getCanSendOtherMessages(): bool|null
    {
        return $this->can_send_other_messages;
    }

    public function setCanSendOtherMessages(bool|null $can_send_other_messages): ChatPermissions
    {
        $this->can_send_other_messages = $can_send_other_messages;
        return $this;
    }

    public function getCanAddWebPagePreviews(): bool|null
    {
        return $this->can_add_web_page_previews;
    }

    public function setCanAddWebPagePreviews(bool|null $can_add_web_page_previews): ChatPermissions
    {
        $this->can_add_web_page_previews = $can_add_web_page_previews;
        return $this;
    }

    public function getCanChangeInfo(): bool|null
    {
        return $this->can_change_info;
    }

    public function setCanChangeInfo(bool|null $can_change_info): ChatPermissions
    {
        $this->can_change_info = $can_change_info;
        return $this;
    }

    public function getCanInviteUsers(): bool|null
    {
        return $this->can_invite_users;
    }

    public function setCanInviteUsers(bool|null $can_invite_users): ChatPermissions
    {
        $this->can_invite_users = $can_invite_users;
        return $this;
    }

    public function getCanPinMessages(): bool|null
    {
        return $this->can_pin_messages;
    }

    public function setCanPinMessages(bool|null $can_pin_messages): ChatPermissions
    {
        $this->can_pin_messages = $can_pin_messages;
        return $this;
    }

    public function getCanManageTopics(): bool|null
    {
        return $this->can_manage_topics;
    }

    public function setCanManageTopics(bool|null $can_manage_topics): ChatPermissions
    {
        $this->can_manage_topics = $can_manage_topics;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
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
        ];
    }
}
