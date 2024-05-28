<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\RequestId;
use stdClass;

/**
 * This object defines the criteria used to request a suitable chat. Information about the selected chat will be shared with
 * the bot when the corresponding button is pressed. The bot will be granted requested rights in the chat if appropriate.
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 * @link https://core.telegram.org/bots/features#chat-and-user-selection More about requesting chats.
 */
class KeyboardButtonRequestChat extends AbstractEntity
{
    /**
     * @param RequestId $request_id Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must
     * be unique within the message
     * @param bool $chat_is_channel Pass True to request a channel chat, pass False to request a group or a supergroup chat.
     * @param ChatAdministratorRights|null $bot_administrator_rights Optional. A JSON-serialized object listing the required administrator
     * rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions
     * are applied.
     * @param bool|null $bot_is_member Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions
     * are applied.
     * @param bool|null $chat_has_username Optional. Pass True to request a supergroup or a channel with a username, pass False to
     * request a chat without a username. If not specified, no additional restrictions are applied.
     * @param bool|null $chat_is_created Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions
     * are applied.
     * @param bool|null $chat_is_forum Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat.
     * If not specified, no additional restrictions are applied.
     * @param bool|null $request_photo Optional. Pass True to request the chat's photo
     * @param bool|null $request_title Optional. Pass True to request the chat's title
     * @param bool|null $request_username Optional. Pass True to request the chat's username
     * @param ChatAdministratorRights|null $user_administrator_rights Optional. A JSON-serialized object listing the required administrator
     * rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional
     * restrictions are applied.
     */
    public function __construct(
        protected RequestId $request_id,
        protected bool $chat_is_channel,
        protected ChatAdministratorRights|null $bot_administrator_rights = null,
        protected bool|null $bot_is_member = null,
        protected bool|null $chat_has_username = null,
        protected bool|null $chat_is_created = null,
        protected bool|null $chat_is_forum = null,
        protected bool|null $request_photo = null,
        protected bool|null $request_title = null,
        protected bool|null $request_username = null,
        protected ChatAdministratorRights|null $user_administrator_rights = null,
    ) {
        parent::__construct();
    }

    public function getRequestId(): RequestId
    {
        return $this->request_id;
    }

    public function setRequestId(RequestId $request_id): KeyboardButtonRequestChat
    {
        $this->request_id = $request_id;
        return $this;
    }

    public function getChatIsChannel(): bool
    {
        return $this->chat_is_channel;
    }

    public function setChatIsChannel(bool $chat_is_channel): KeyboardButtonRequestChat
    {
        $this->chat_is_channel = $chat_is_channel;
        return $this;
    }

    public function getBotAdministratorRights(): ChatAdministratorRights|null
    {
        return $this->bot_administrator_rights;
    }

    public function setBotAdministratorRights(ChatAdministratorRights|null $bot_administrator_rights): KeyboardButtonRequestChat
    {
        $this->bot_administrator_rights = $bot_administrator_rights;
        return $this;
    }

    public function getBotIsMember(): bool|null
    {
        return $this->bot_is_member;
    }

    public function setBotIsMember(bool|null $bot_is_member): KeyboardButtonRequestChat
    {
        $this->bot_is_member = $bot_is_member;
        return $this;
    }

    public function getChatHasUsername(): bool|null
    {
        return $this->chat_has_username;
    }

    public function setChatHasUsername(bool|null $chat_has_username): KeyboardButtonRequestChat
    {
        $this->chat_has_username = $chat_has_username;
        return $this;
    }

    public function getChatIsCreated(): bool|null
    {
        return $this->chat_is_created;
    }

    public function setChatIsCreated(bool|null $chat_is_created): KeyboardButtonRequestChat
    {
        $this->chat_is_created = $chat_is_created;
        return $this;
    }

    public function getChatIsForum(): bool|null
    {
        return $this->chat_is_forum;
    }

    public function setChatIsForum(bool|null $chat_is_forum): KeyboardButtonRequestChat
    {
        $this->chat_is_forum = $chat_is_forum;
        return $this;
    }

    public function getRequestPhoto(): bool|null
    {
        return $this->request_photo;
    }

    public function setRequestPhoto(bool|null $request_photo): KeyboardButtonRequestChat
    {
        $this->request_photo = $request_photo;
        return $this;
    }

    public function getRequestTitle(): bool|null
    {
        return $this->request_title;
    }

    public function setRequestTitle(bool|null $request_title): KeyboardButtonRequestChat
    {
        $this->request_title = $request_title;
        return $this;
    }

    public function getRequestUsername(): bool|null
    {
        return $this->request_username;
    }

    public function setRequestUsername(bool|null $request_username): KeyboardButtonRequestChat
    {
        $this->request_username = $request_username;
        return $this;
    }

    public function getUserAdministratorRights(): ChatAdministratorRights|null
    {
        return $this->user_administrator_rights;
    }

    public function setUserAdministratorRights(ChatAdministratorRights|null $user_administrator_rights): KeyboardButtonRequestChat
    {
        $this->user_administrator_rights = $user_administrator_rights;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'request_id' => $this->request_id->getId(),
            'chat_is_channel' => $this->chat_is_channel,
            'bot_administrator_rights' => $this->bot_administrator_rights?->toArray(),
            'bot_is_member' => $this->bot_is_member,
            'chat_has_username' => $this->chat_has_username,
            'chat_is_created' => $this->chat_is_created,
            'chat_is_forum' => $this->chat_is_forum,
            'request_photo' => $this->request_photo,
            'request_title' => $this->request_title,
            'request_username' => $this->request_username,
            'user_administrator_rights' => $this->user_administrator_rights?->toArray(),
        ];
    }
}
