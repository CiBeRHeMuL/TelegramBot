<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object defines the criteria used to request a suitable chat. Information about the selected chat will be shared with
 * the bot when the corresponding button is pressed. The bot will be granted requested rights in the chat if appropriate. More
 * about requesting chats ».
 *
 * @see https://core.telegram.org/bots/features#chat-and-user-selection More about requesting chats »
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 */
final class KeyboardButtonRequestChat implements EntityInterface
{
    /**
     * @param int $request_id Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must
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
     *
     * @see https://core.telegram.org/bots/api#chatshared ChatShared
     * @see https://core.telegram.org/bots/api#chatadministratorrights ChatAdministratorRights
     * @see https://core.telegram.org/bots/api#chatadministratorrights ChatAdministratorRights
     */
    public function __construct(
        protected int $request_id,
        protected bool $chat_is_channel,
        protected ?ChatAdministratorRights $bot_administrator_rights = null,
        protected ?bool $bot_is_member = null,
        protected ?bool $chat_has_username = null,
        protected ?bool $chat_is_created = null,
        protected ?bool $chat_is_forum = null,
        protected ?bool $request_photo = null,
        protected ?bool $request_title = null,
        protected ?bool $request_username = null,
        protected ?ChatAdministratorRights $user_administrator_rights = null,
    ) {}

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->request_id;
    }

    /**
     * @param int $request_id
     *
     * @return KeyboardButtonRequestChat
     */
    public function setRequestId(int $request_id): KeyboardButtonRequestChat
    {
        $this->request_id = $request_id;
        return $this;
    }

    /**
     * @return bool
     */
    public function getChatIsChannel(): bool
    {
        return $this->chat_is_channel;
    }

    /**
     * @param bool $chat_is_channel
     *
     * @return KeyboardButtonRequestChat
     */
    public function setChatIsChannel(bool $chat_is_channel): KeyboardButtonRequestChat
    {
        $this->chat_is_channel = $chat_is_channel;
        return $this;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getBotAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->bot_administrator_rights;
    }

    /**
     * @param ChatAdministratorRights|null $bot_administrator_rights
     *
     * @return KeyboardButtonRequestChat
     */
    public function setBotAdministratorRights(?ChatAdministratorRights $bot_administrator_rights): KeyboardButtonRequestChat
    {
        $this->bot_administrator_rights = $bot_administrator_rights;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBotIsMember(): ?bool
    {
        return $this->bot_is_member;
    }

    /**
     * @param bool|null $bot_is_member
     *
     * @return KeyboardButtonRequestChat
     */
    public function setBotIsMember(?bool $bot_is_member): KeyboardButtonRequestChat
    {
        $this->bot_is_member = $bot_is_member;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChatHasUsername(): ?bool
    {
        return $this->chat_has_username;
    }

    /**
     * @param bool|null $chat_has_username
     *
     * @return KeyboardButtonRequestChat
     */
    public function setChatHasUsername(?bool $chat_has_username): KeyboardButtonRequestChat
    {
        $this->chat_has_username = $chat_has_username;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChatIsCreated(): ?bool
    {
        return $this->chat_is_created;
    }

    /**
     * @param bool|null $chat_is_created
     *
     * @return KeyboardButtonRequestChat
     */
    public function setChatIsCreated(?bool $chat_is_created): KeyboardButtonRequestChat
    {
        $this->chat_is_created = $chat_is_created;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChatIsForum(): ?bool
    {
        return $this->chat_is_forum;
    }

    /**
     * @param bool|null $chat_is_forum
     *
     * @return KeyboardButtonRequestChat
     */
    public function setChatIsForum(?bool $chat_is_forum): KeyboardButtonRequestChat
    {
        $this->chat_is_forum = $chat_is_forum;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestPhoto(): ?bool
    {
        return $this->request_photo;
    }

    /**
     * @param bool|null $request_photo
     *
     * @return KeyboardButtonRequestChat
     */
    public function setRequestPhoto(?bool $request_photo): KeyboardButtonRequestChat
    {
        $this->request_photo = $request_photo;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestTitle(): ?bool
    {
        return $this->request_title;
    }

    /**
     * @param bool|null $request_title
     *
     * @return KeyboardButtonRequestChat
     */
    public function setRequestTitle(?bool $request_title): KeyboardButtonRequestChat
    {
        $this->request_title = $request_title;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestUsername(): ?bool
    {
        return $this->request_username;
    }

    /**
     * @param bool|null $request_username
     *
     * @return KeyboardButtonRequestChat
     */
    public function setRequestUsername(?bool $request_username): KeyboardButtonRequestChat
    {
        $this->request_username = $request_username;
        return $this;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getUserAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->user_administrator_rights;
    }

    /**
     * @param ChatAdministratorRights|null $user_administrator_rights
     *
     * @return KeyboardButtonRequestChat
     */
    public function setUserAdministratorRights(?ChatAdministratorRights $user_administrator_rights): KeyboardButtonRequestChat
    {
        $this->user_administrator_rights = $user_administrator_rights;
        return $this;
    }
}
