<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;

// region CLASS_Link
/**
 * Represents an HTTP link.
 *
 * @see https://core.telegram.org/bots/api#link
 */
final class Link implements EntityInterface
{
    /**
     * @param Url $url URL of the link
     */
    public function __construct(
        protected Url $url,
    ) {}

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return Link
     */
    public function setUrl(Url $url): Link
    {
        $this->url = $url;

        return $this;
    }
}

// endregion CLASS_Link
