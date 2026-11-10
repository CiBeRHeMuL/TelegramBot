<?php

namespace AndrewGos\TelegramBot\Request;

// region CLASS_EditSharedWidgetDataRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#editsharedwidgetdata
 */
class EditSharedWidgetDataRequest implements RequestInterface
{
    /**
     * @param string   $public_data New public data of the widget, 0-1024 bytes; pass an empty string to remove the public data
     * @param string   $widget_id   Unique identifier of the shared widget
     * @param int|null $cache_time  The maximum amount of time in seconds that the public data of the widget may be cached client-side;
     *                              5-3600. If omitted, then the current value is kept, which is 30 by default.
     */
    public function __construct(
        private string $public_data,
        private string $widget_id,
        private ?int $cache_time = null,
    ) {}

    public function getPublicData(): string
    {
        return $this->public_data;
    }

    public function setPublicData(string $public_data): EditSharedWidgetDataRequest
    {
        $this->public_data = $public_data;

        return $this;
    }

    public function getWidgetId(): string
    {
        return $this->widget_id;
    }

    public function setWidgetId(string $widget_id): EditSharedWidgetDataRequest
    {
        $this->widget_id = $widget_id;

        return $this;
    }

    public function getCacheTime(): ?int
    {
        return $this->cache_time;
    }

    public function setCacheTime(?int $cache_time): EditSharedWidgetDataRequest
    {
        $this->cache_time = $cache_time;

        return $this;
    }
}
// endregion CLASS_EditSharedWidgetDataRequest
