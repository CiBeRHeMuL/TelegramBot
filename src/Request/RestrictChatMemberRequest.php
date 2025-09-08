<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ChatPermissions;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#restrictchatmember
 */
class RestrictChatMemberRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername)
     * @param ChatPermissions $permissions A JSON-serialized object for new user permissions
     * @param int $user_id Unique identifier of the target user
     * @param int|null $until_date Date when restrictions will be lifted for the user; Unix time. If user is restricted for more
     * than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
     * @param bool|null $use_independent_chat_permissions Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages
     * and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos,
     * can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the
     * can_send_messages permission.
     *
     * @see https://core.telegram.org/bots/api#chatpermissions ChatPermissions
     */
    public function __construct(
        private ChatId $chat_id,
        private ChatPermissions $permissions,
        private int $user_id,
        private ?int $until_date = null,
        private ?bool $use_independent_chat_permissions = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): RestrictChatMemberRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getPermissions(): ChatPermissions
    {
        return $this->permissions;
    }

    public function setPermissions(ChatPermissions $permissions): RestrictChatMemberRequest
    {
        $this->permissions = $permissions;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): RestrictChatMemberRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getUntilDate(): ?int
    {
        return $this->until_date;
    }

    public function setUntilDate(?int $until_date): RestrictChatMemberRequest
    {
        $this->until_date = $until_date;
        return $this;
    }

    public function getUseIndependentChatPermissions(): ?bool
    {
        return $this->use_independent_chat_permissions;
    }

    public function setUseIndependentChatPermissions(?bool $use_independent_chat_permissions): RestrictChatMemberRequest
    {
        $this->use_independent_chat_permissions = $use_independent_chat_permissions;
        return $this;
    }
}
