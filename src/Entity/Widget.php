<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_Widget
/**
 * This object describes an HTML widget.
 *
 * @see https://core.telegram.org/bots/widgets HTML widget
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#widget
 */
final class Widget implements EntityInterface
{
    /**
     * @param string      $html        HTML code of the widget
     * @param string|null $chat_data   Optional. Data of the widget, which is specific to the message
     * @param int|null    $height      Optional. Height of the widget in logical pixels; omitted if the height of the widget isn't fixed
     * @param string|null $id          Optional. Unique identifier of the shared widget, which can be used to send the widget again using
     *                                 the method sendSharedWidget; omitted if the widget isn't shared
     * @param string|null $public_data Optional. Public data of the widget, which is available wherever the widget is shown. All
     *                                 messages with a shared widget have the same public data.
     * @param int|null    $width       Optional. Width of the widget in logical pixels; omitted if the widget must occupy the whole width
     *                                 of the message bubble
     *
     * @see https://core.telegram.org/bots/api#sendsharedwidget sendSharedWidget
     */
    public function __construct(
        protected string $html,
        protected ?string $chat_data = null,
        protected ?int $height = null,
        protected ?string $id = null,
        protected ?string $public_data = null,
        protected ?int $width = null,
    ) {}

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @param string $html
     *
     * @return Widget
     */
    public function setHtml(string $html): Widget
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChatData(): ?string
    {
        return $this->chat_data;
    }

    /**
     * @param string|null $chat_data
     *
     * @return Widget
     */
    public function setChatData(?string $chat_data): Widget
    {
        $this->chat_data = $chat_data;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     *
     * @return Widget
     */
    public function setHeight(?int $height): Widget
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return Widget
     */
    public function setId(?string $id): Widget
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPublicData(): ?string
    {
        return $this->public_data;
    }

    /**
     * @param string|null $public_data
     *
     * @return Widget
     */
    public function setPublicData(?string $public_data): Widget
    {
        $this->public_data = $public_data;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     *
     * @return Widget
     */
    public function setWidth(?int $width): Widget
    {
        $this->width = $width;

        return $this;
    }
}
// endregion CLASS_Widget
