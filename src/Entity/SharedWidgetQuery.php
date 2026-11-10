<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_SharedWidgetQuery
/**
 * This object represents an incoming query from a forwarded message with a shared widget created by the bot. Use answerWidgetQuery
 * to answer the query. Each user can send at most 5 queries per 5 seconds to the bot from all its widgets.
 *
 * @see https://core.telegram.org/bots/api#answerwidgetquery answerWidgetQuery
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#sharedwidgetquery
 */
final class SharedWidgetQuery implements EntityInterface
{
    /**
     * @param string                  $id        Unique identifier for this query
     * @param User                    $from      Sender
     * @param AbstractWidgetQueryType $type      Type of the query
     * @param string                  $data      Data of the query, 1-64 bytes
     * @param string                  $widget_id Unique identifier of the shared widget, which sent the query
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#widgetquerytype WidgetQueryType
     */
    public function __construct(
        protected string $id,
        protected User $from,
        protected AbstractWidgetQueryType $type,
        protected string $data,
        protected string $widget_id,
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
     * @return SharedWidgetQuery
     */
    public function setId(string $id): SharedWidgetQuery
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
     * @return SharedWidgetQuery
     */
    public function setFrom(User $from): SharedWidgetQuery
    {
        $this->from = $from;

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
     * @return SharedWidgetQuery
     */
    public function setType(AbstractWidgetQueryType $type): SharedWidgetQuery
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
     * @return SharedWidgetQuery
     */
    public function setData(string $data): SharedWidgetQuery
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getWidgetId(): string
    {
        return $this->widget_id;
    }

    /**
     * @param string $widget_id
     *
     * @return SharedWidgetQuery
     */
    public function setWidgetId(string $widget_id): SharedWidgetQuery
    {
        $this->widget_id = $widget_id;

        return $this;
    }
}
// endregion CLASS_SharedWidgetQuery
