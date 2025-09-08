<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\CallbackData;

/**
 * This object represents an incoming callback query from a callback button in an inline keyboard. If the button that originated
 * the query was attached to a message sent by the bot, the field message will be present. If the button was attached to a message
 * sent via the bot (in inline mode), the field inline_message_id will be present. Exactly one of the fields data or game_short_name
 * will be present.
 *
 * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
 * @see https://core.telegram.org/bots/api#inline-mode inline mode
 * @link https://core.telegram.org/bots/api#callbackquery
 */
final class CallbackQuery implements EntityInterface
{
    /**
     * @param string $id Unique identifier for this query
     * @param User $from Sender
     * @param string $chat_instance Global identifier, uniquely corresponding to the chat to which the message with the callback
     * button was sent. Useful for high scores in games.
     * @param CallbackData|null $data Optional. Data associated with the callback button. Be aware that the message originated the
     * query can contain no callback buttons with this data.
     * @param string|null $game_short_name Optional. Short name of a Game to be returned, serves as the unique identifier for the
     * game
     * @param string|null $inline_message_id Optional. Identifier of the message sent via the bot in inline mode, that originated
     * the query.
     * @param AbstractMaybeInaccessibleMessage|null $message Optional. Message sent by the bot with the callback button that originated
     * the query
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#maybeinaccessiblemessage MaybeInaccessibleMessage
     * @see https://core.telegram.org/bots/api#games games
     * @see https://core.telegram.org/bots/api#games Game
     */
    public function __construct(
        protected string $id,
        protected User $from,
        protected string $chat_instance,
        protected ?CallbackData $data = null,
        protected ?string $game_short_name = null,
        protected ?string $inline_message_id = null,
        protected ?AbstractMaybeInaccessibleMessage $message = null,
    ) {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return CallbackQuery
     */
    public function setId(string $id): CallbackQuery
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     *
     * @return CallbackQuery
     */
    public function setFrom(User $from): CallbackQuery
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getChatInstance(): string
    {
        return $this->chat_instance;
    }

    /**
     * @param string $chat_instance
     *
     * @return CallbackQuery
     */
    public function setChatInstance(string $chat_instance): CallbackQuery
    {
        $this->chat_instance = $chat_instance;
        return $this;
    }

    /**
     * @return CallbackData|null
     */
    public function getData(): ?CallbackData
    {
        return $this->data;
    }

    /**
     * @param CallbackData|null $data
     *
     * @return CallbackQuery
     */
    public function setData(?CallbackData $data): CallbackQuery
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGameShortName(): ?string
    {
        return $this->game_short_name;
    }

    /**
     * @param string|null $game_short_name
     *
     * @return CallbackQuery
     */
    public function setGameShortName(?string $game_short_name): CallbackQuery
    {
        $this->game_short_name = $game_short_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    /**
     * @param string|null $inline_message_id
     *
     * @return CallbackQuery
     */
    public function setInlineMessageId(?string $inline_message_id): CallbackQuery
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    /**
     * @return AbstractMaybeInaccessibleMessage|null
     */
    public function getMessage(): ?AbstractMaybeInaccessibleMessage
    {
        return $this->message;
    }

    /**
     * @param AbstractMaybeInaccessibleMessage|null $message
     *
     * @return CallbackQuery
     */
    public function setMessage(?AbstractMaybeInaccessibleMessage $message): CallbackQuery
    {
        $this->message = $message;
        return $this;
    }
}
