<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Describes the options used for link preview generation.
 *
 * @link https://core.telegram.org/bots/api#linkpreviewoptions
 */
final class LinkPreviewOptions implements EntityInterface
{
    /**
     * @param bool|null $is_disabled Optional. True, if the link preview is disabled
     * @param Url|null $url Optional. URL to use for the link preview. If empty, then the first URL found in the message text will
     * be used
     * @param bool|null $prefer_small_media Optional. True, if the media in the link preview is supposed to be shrunk; ignored if
     * the URL isn't explicitly specified or media size change isn't supported for the preview
     * @param bool|null $prefer_large_media Optional. True, if the media in the link preview is supposed to be enlarged; ignored
     * if the URL isn't explicitly specified or media size change isn't supported for the preview
     * @param bool|null $show_above_text Optional. True, if the link preview must be shown above the message text; otherwise, the
     * link preview will be shown below the message text
     */
    public function __construct(
        protected ?bool $is_disabled = null,
        protected ?Url $url = null,
        protected ?bool $prefer_small_media = null,
        protected ?bool $prefer_large_media = null,
        protected ?bool $show_above_text = null,
    ) {}

    /**
     * @return bool|null
     */
    public function getIsDisabled(): ?bool
    {
        return $this->is_disabled;
    }

    /**
     * @param bool|null $is_disabled
     *
     * @return LinkPreviewOptions
     */
    public function setIsDisabled(?bool $is_disabled): LinkPreviewOptions
    {
        $this->is_disabled = $is_disabled;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getUrl(): ?Url
    {
        return $this->url;
    }

    /**
     * @param Url|null $url
     *
     * @return LinkPreviewOptions
     */
    public function setUrl(?Url $url): LinkPreviewOptions
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPreferSmallMedia(): ?bool
    {
        return $this->prefer_small_media;
    }

    /**
     * @param bool|null $prefer_small_media
     *
     * @return LinkPreviewOptions
     */
    public function setPreferSmallMedia(?bool $prefer_small_media): LinkPreviewOptions
    {
        $this->prefer_small_media = $prefer_small_media;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPreferLargeMedia(): ?bool
    {
        return $this->prefer_large_media;
    }

    /**
     * @param bool|null $prefer_large_media
     *
     * @return LinkPreviewOptions
     */
    public function setPreferLargeMedia(?bool $prefer_large_media): LinkPreviewOptions
    {
        $this->prefer_large_media = $prefer_large_media;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowAboveText(): ?bool
    {
        return $this->show_above_text;
    }

    /**
     * @param bool|null $show_above_text
     *
     * @return LinkPreviewOptions
     */
    public function setShowAboveText(?bool $show_above_text): LinkPreviewOptions
    {
        $this->show_above_text = $show_above_text;
        return $this;
    }
}
