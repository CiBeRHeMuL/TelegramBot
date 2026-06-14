<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose The URL of the Mini App to be opened
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#sendchatjoinrequestwebapp
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SendChatJoinRequestWebAppRequest, Telegram, Bot API, DTO, send Chat Join Request Web App
// STRUCTURE: ▶ ┌fields┐ → ∑ SendChatJoinRequestWebAppRequest
// region CLASS_SendChatJoinRequestWebAppRequest

/**
 * The URL of the Mini App to be opened.
 *
 * @see https://core.telegram.org/bots/api#sendchatjoinrequestwebapp
 */
class SendChatJoinRequestWebAppRequest implements RequestInterface
{
    /**
     * @param string $chat_join_request_query_id Unique identifier of the join request query
     * @param Url    $web_app_url                The URL of the Mini App to be opened
     */
    public function __construct(
        private string $chat_join_request_query_id,
        private Url $web_app_url,
    ) {}

    /**
     * @return string
     */
    public function getChatJoinRequestQueryId(): string
    {
        return $this->chat_join_request_query_id;
    }

    /**
     * @param string $chat_join_request_query_id
     *
     * @return SendChatJoinRequestWebAppRequest
     */
    public function setChatJoinRequestQueryId(string $chat_join_request_query_id): SendChatJoinRequestWebAppRequest
    {
        $this->chat_join_request_query_id = $chat_join_request_query_id;

        return $this;
    }

    /**
     * @return Url
     */
    public function getWebAppUrl(): Url
    {
        return $this->web_app_url;
    }

    /**
     * @param Url $web_app_url
     *
     * @return SendChatJoinRequestWebAppRequest
     */
    public function setWebAppUrl(Url $web_app_url): SendChatJoinRequestWebAppRequest
    {
        $this->web_app_url = $web_app_url;

        return $this;
    }
}

// endregion CLASS_SendChatJoinRequestWebAppRequest
