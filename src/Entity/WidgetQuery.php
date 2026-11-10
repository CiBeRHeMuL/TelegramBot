<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_WidgetQuery
/**
 * This object represents an incoming query from a widget in a message sent by the bot or via the bot. Use answerWidgetQuery
 * to answer the query. Each user can send at most 5 queries per 5 seconds to the bot from all its widgets.
 *
 * @see https://core.telegram.org/bots/api#answerwidgetquery answerWidgetQuery
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#widgetquery
 */
final class WidgetQuery implements EntityInterface
{
    /**
     * @param string                  $id                Unique identifier for this query
     * @param User                    $from              Sender
     * @param string                  $chat_instance     Global identifier, uniquely corresponding to the chat to which the message with the widget was
     *                                                   sent
     * @param AbstractWidgetQueryType $type              Type of the query
     * @param string                  $data              Data of the query, 1-64 bytes
     * @param Chat|null               $chat              Optional. Chat with the message containing the widget; omitted if the widget is in an inline message
     * @param string|null             $chat_type         Optional. For widgets in inline messages, type of the chat to which the message was sent. Can
     *                                                   be either “sender” for a private chat with the inline query sender, “private”, “group”, “supergroup”, or “channel”.
     * @param string|null             $inline_message_id Optional. Identifier of the inline message containing the widget
     * @param int|null                $message_id        Optional. Identifier of the message containing the widget; omitted if the widget is in an inline
     *                                                   message
     * @param string|null             $widget_id         Optional. Unique identifier of the shared widget, which sent the query; omitted if the widget
     *                                                   isn't shared
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#widgetquerytype WidgetQueryType
     */
    public function __construct(
        protected string $id,
        protected User $from,
        protected string $chat_instance,
        protected AbstractWidgetQueryType $type,
        protected string $data,
        protected ?Chat $chat = null,
        protected ?string $chat_type = null,
        protected ?string $inline_message_id = null,
        protected ?int $message_id = null,
        protected ?string $widget_id = null,
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
     * @return WidgetQuery
     */
    public function setId(string $id): WidgetQuery
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
     * @return WidgetQuery
     */
    public function setFrom(User $from): WidgetQuery
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
     * @return WidgetQuery
     */
    public function setChatInstance(string $chat_instance): WidgetQuery
    {
        $this->chat_instance = $chat_instance;

        return $this;
    }

    /**
     * @return AbstractWidgetQueryType
     */
    public function getType(): AbstractWidgetQueryType
    {
        return $this->type;
    }

    /**
     * @param AbstractWidgetQueryType $type
     *
     * @return WidgetQuery
     */
    public function setType(AbstractWidgetQueryType $type): WidgetQuery
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     *
     * @return WidgetQuery
     */
    public function setData(string $data): WidgetQuery
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat|null $chat
     *
     * @return WidgetQuery
     */
    public function setChat(?Chat $chat): WidgetQuery
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChatType(): ?string
    {
        return $this->chat_type;
    }

    /**
     * @param string|null $chat_type
     *
     * @return WidgetQuery
     */
    public function setChatType(?string $chat_type): WidgetQuery
    {
        $this->chat_type = $chat_type;

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
     * @return WidgetQuery
     */
    public function setInlineMessageId(?string $inline_message_id): WidgetQuery
    {
        $this->inline_message_id = $inline_message_id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    /**
     * @param int|null $message_id
     *
     * @return WidgetQuery
     */
    public function setMessageId(?int $message_id): WidgetQuery
    {
        $this->message_id = $message_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWidgetId(): ?string
    {
        return $this->widget_id;
    }

    /**
     * @param string|null $widget_id
     *
     * @return WidgetQuery
     */
    public function setWidgetId(?string $widget_id): WidgetQuery
    {
        $this->widget_id = $widget_id;

        return $this;
    }
}
// endregion CLASS_WidgetQuery
