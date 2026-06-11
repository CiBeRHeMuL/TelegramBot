<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about a Web App.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#webappinfo
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: WebAppInfo, Telegram, Bot API, DTO, webappinfo
// STRUCTURE: ▶ ┌url┐ → ∑ WebAppInfo
// region CLASS_WebAppInfo

/**
 * Describes a Web App.
 *
 * @see https://core.telegram.org/bots/webapps Web App
 * @see https://core.telegram.org/bots/api#webappinfo
 */
final class WebAppInfo implements EntityInterface
{
    /**
     * @param Url $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     *
     * @see https://core.telegram.org/bots/webapps#initializing-mini-apps Initializing Web Apps
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
     * @return WebAppInfo
     */
    public function setUrl(Url $url): WebAppInfo
    {
        $this->url = $url;

        return $this;
    }
}

// endregion CLASS_WebAppInfo
