<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents an HTTP link.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#link
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Link, Telegram, Bot API, DTO, Link
// STRUCTURE: ▶ ┌url┐ → ∑ Link
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
