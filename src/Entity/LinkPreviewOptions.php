<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Describes the options used for link preview generation.
 * @link https://core.telegram.org/bots/api#linkpreviewoptions
 */
class LinkPreviewOptions extends AbstractEntity
{
    /**
     * @param bool|null $is_disabled Optional. True, if the link preview is disabled
     * @param Url|null $url Optional. URL to use for the link preview.
     * If empty, then the first URL found in the message text will be used
     * @param bool|null $prefer_small_media Optional. True, if the media in the link preview is supposed to be shrunk;
     * ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     * @param bool|null $prefer_large_media Optional. True, if the media in the link preview is supposed to be enlarged;
     * ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     * @param bool|null $show_above_text Optional. True, if the link preview must be shown above the message text;
     * otherwise, the link preview will be shown below the message text
     */
    public function __construct(
        protected bool|null $is_disabled = null,
        protected Url|null $url = null,
        protected bool|null $prefer_small_media = null,
        protected bool|null $prefer_large_media = null,
        protected bool|null $show_above_text = null,
    ) {
        parent::__construct();
    }

    public function getIsDisabled(): bool|null
    {
        return $this->is_disabled;
    }

    public function setIsDisabled(bool|null $is_disabled): LinkPreviewOptions
    {
        $this->is_disabled = $is_disabled;
        return $this;
    }

    public function getUrl(): Url|null
    {
        return $this->url;
    }

    public function setUrl(Url|null $url): LinkPreviewOptions
    {
        $this->url = $url;
        return $this;
    }

    public function getPreferSmallMedia(): bool|null
    {
        return $this->prefer_small_media;
    }

    public function setPreferSmallMedia(bool|null $prefer_small_media): LinkPreviewOptions
    {
        $this->prefer_small_media = $prefer_small_media;
        return $this;
    }

    public function getPreferLargeMedia(): bool|null
    {
        return $this->prefer_large_media;
    }

    public function setPreferLargeMedia(bool|null $prefer_large_media): LinkPreviewOptions
    {
        $this->prefer_large_media = $prefer_large_media;
        return $this;
    }

    public function getShowAboveText(): bool|null
    {
        return $this->show_above_text;
    }

    public function setShowAboveText(bool|null $show_above_text): LinkPreviewOptions
    {
        $this->show_above_text = $show_above_text;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'is_disabled' => $this->is_disabled,
            'url' => $this->url?->getUrl(),
            'prefer_small_media' => $this->prefer_small_media,
            'prefer_large_media' => $this->prefer_large_media,
            'show_above_text' => $this->show_above_text,
        ];
    }
}
