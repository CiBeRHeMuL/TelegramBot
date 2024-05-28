<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ChatPermissions;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class SetChatPermissionsRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param ChatPermissions $permissions A JSON-serialized object for new default chat permissions
     * @param bool|null $use_independent_chat_permissions Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages
     * and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos,
     * can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the
     * can_send_messages permission.
     */
    public function __construct(
        private ChatId $chat_id,
        private ChatPermissions $permissions,
        private bool|null $use_independent_chat_permissions = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatPermissionsRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getPermissions(): ChatPermissions
    {
        return $this->permissions;
    }

    public function setPermissions(ChatPermissions $permissions): SetChatPermissionsRequest
    {
        $this->permissions = $permissions;
        return $this;
    }

    public function getUseIndependentChatPermissions(): bool|null
    {
        return $this->use_independent_chat_permissions;
    }

    public function setUseIndependentChatPermissions(bool|null $use_independent_chat_permissions): SetChatPermissionsRequest
    {
        $this->use_independent_chat_permissions = $use_independent_chat_permissions;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'permissions' => $this->permissions->toArray(),
            'use_independent_chat_permissions' => $this->use_independent_chat_permissions,
        ];
    }
}
