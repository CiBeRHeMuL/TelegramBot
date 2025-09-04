<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @link https://core.telegram.org/bots/api#chatpermissions
 */
final class ChatPermissions implements EntityInterface
{
    /**
     * @param bool|null $can_send_messages Optional. True, if the user is allowed to send text messages, contacts, giveaways, giveaway
     * winners, invoices, locations and venues
     * @param bool|null $can_send_audios Optional. True, if the user is allowed to send audios
     * @param bool|null $can_send_documents Optional. True, if the user is allowed to send documents
     * @param bool|null $can_send_photos Optional. True, if the user is allowed to send photos
     * @param bool|null $can_send_videos Optional. True, if the user is allowed to send videos
     * @param bool|null $can_send_video_notes Optional. True, if the user is allowed to send video notes
     * @param bool|null $can_send_voice_notes Optional. True, if the user is allowed to send voice notes
     * @param bool|null $can_send_polls Optional. True, if the user is allowed to send polls and checklists
     * @param bool|null $can_send_other_messages Optional. True, if the user is allowed to send animations, games, stickers and use
     * inline bots
     * @param bool|null $can_add_web_page_previews Optional. True, if the user is allowed to add web page previews to their messages
     * @param bool|null $can_change_info Optional. True, if the user is allowed to change the chat title, photo and other settings.
     * Ignored in public supergroups
     * @param bool|null $can_invite_users Optional. True, if the user is allowed to invite new users to the chat
     * @param bool|null $can_pin_messages Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
     * @param bool|null $can_manage_topics Optional. True, if the user is allowed to create forum topics. If omitted defaults to
     * the value of can_pin_messages
     */
    public function __construct(
        protected bool|null $can_send_messages = null,
        protected bool|null $can_send_audios = null,
        protected bool|null $can_send_documents = null,
        protected bool|null $can_send_photos = null,
        protected bool|null $can_send_videos = null,
        protected bool|null $can_send_video_notes = null,
        protected bool|null $can_send_voice_notes = null,
        protected bool|null $can_send_polls = null,
        protected bool|null $can_send_other_messages = null,
        protected bool|null $can_add_web_page_previews = null,
        protected bool|null $can_change_info = null,
        protected bool|null $can_invite_users = null,
        protected bool|null $can_pin_messages = null,
        protected bool|null $can_manage_topics = null,
    ) {
    }

    /**
     * @return bool|null
     */
    public function getCanSendMessages(): bool|null
    {
        return $this->can_send_messages;
    }

    /**
     * @param bool|null $can_send_messages
     *
     * @return ChatPermissions
     */
    public function setCanSendMessages(bool|null $can_send_messages): ChatPermissions
    {
        $this->can_send_messages = $can_send_messages;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendAudios(): bool|null
    {
        return $this->can_send_audios;
    }

    /**
     * @param bool|null $can_send_audios
     *
     * @return ChatPermissions
     */
    public function setCanSendAudios(bool|null $can_send_audios): ChatPermissions
    {
        $this->can_send_audios = $can_send_audios;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendDocuments(): bool|null
    {
        return $this->can_send_documents;
    }

    /**
     * @param bool|null $can_send_documents
     *
     * @return ChatPermissions
     */
    public function setCanSendDocuments(bool|null $can_send_documents): ChatPermissions
    {
        $this->can_send_documents = $can_send_documents;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendPhotos(): bool|null
    {
        return $this->can_send_photos;
    }

    /**
     * @param bool|null $can_send_photos
     *
     * @return ChatPermissions
     */
    public function setCanSendPhotos(bool|null $can_send_photos): ChatPermissions
    {
        $this->can_send_photos = $can_send_photos;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendVideos(): bool|null
    {
        return $this->can_send_videos;
    }

    /**
     * @param bool|null $can_send_videos
     *
     * @return ChatPermissions
     */
    public function setCanSendVideos(bool|null $can_send_videos): ChatPermissions
    {
        $this->can_send_videos = $can_send_videos;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendVideoNotes(): bool|null
    {
        return $this->can_send_video_notes;
    }

    /**
     * @param bool|null $can_send_video_notes
     *
     * @return ChatPermissions
     */
    public function setCanSendVideoNotes(bool|null $can_send_video_notes): ChatPermissions
    {
        $this->can_send_video_notes = $can_send_video_notes;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendVoiceNotes(): bool|null
    {
        return $this->can_send_voice_notes;
    }

    /**
     * @param bool|null $can_send_voice_notes
     *
     * @return ChatPermissions
     */
    public function setCanSendVoiceNotes(bool|null $can_send_voice_notes): ChatPermissions
    {
        $this->can_send_voice_notes = $can_send_voice_notes;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendPolls(): bool|null
    {
        return $this->can_send_polls;
    }

    /**
     * @param bool|null $can_send_polls
     *
     * @return ChatPermissions
     */
    public function setCanSendPolls(bool|null $can_send_polls): ChatPermissions
    {
        $this->can_send_polls = $can_send_polls;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendOtherMessages(): bool|null
    {
        return $this->can_send_other_messages;
    }

    /**
     * @param bool|null $can_send_other_messages
     *
     * @return ChatPermissions
     */
    public function setCanSendOtherMessages(bool|null $can_send_other_messages): ChatPermissions
    {
        $this->can_send_other_messages = $can_send_other_messages;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanAddWebPagePreviews(): bool|null
    {
        return $this->can_add_web_page_previews;
    }

    /**
     * @param bool|null $can_add_web_page_previews
     *
     * @return ChatPermissions
     */
    public function setCanAddWebPagePreviews(bool|null $can_add_web_page_previews): ChatPermissions
    {
        $this->can_add_web_page_previews = $can_add_web_page_previews;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanChangeInfo(): bool|null
    {
        return $this->can_change_info;
    }

    /**
     * @param bool|null $can_change_info
     *
     * @return ChatPermissions
     */
    public function setCanChangeInfo(bool|null $can_change_info): ChatPermissions
    {
        $this->can_change_info = $can_change_info;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanInviteUsers(): bool|null
    {
        return $this->can_invite_users;
    }

    /**
     * @param bool|null $can_invite_users
     *
     * @return ChatPermissions
     */
    public function setCanInviteUsers(bool|null $can_invite_users): ChatPermissions
    {
        $this->can_invite_users = $can_invite_users;
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
     * @return ChatPermissions
     */
    public function setCanPinMessages(bool|null $can_pin_messages): ChatPermissions
    {
        $this->can_pin_messages = $can_pin_messages;
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
     * @return ChatPermissions
     */
    public function setCanManageTopics(bool|null $can_manage_topics): ChatPermissions
    {
        $this->can_manage_topics = $can_manage_topics;
        return $this;
    }
}
