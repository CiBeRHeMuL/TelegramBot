<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Enum\ChatJoinRequestResultEnum;

// region CLASS_AnswerChatJoinRequestQueryRequest
/**
 * Result of the query. Must be either “approve” to allow the user to join the chat, “decline” to disallow the user to join the chat, or “queue” to leave the decision to other administrators.
 *
 * @see https://core.telegram.org/bots/api#answerchatjoinrequestquery
 */
class AnswerChatJoinRequestQueryRequest implements RequestInterface
{
    /**
     * @param string                    $chat_join_request_query_id Unique identifier of the join request query
     * @param ChatJoinRequestResultEnum $result                     result of the query
     */
    public function __construct(
        private string $chat_join_request_query_id,
        private ChatJoinRequestResultEnum $result,
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
     * @return AnswerChatJoinRequestQueryRequest
     */
    public function setChatJoinRequestQueryId(string $chat_join_request_query_id): AnswerChatJoinRequestQueryRequest
    {
        $this->chat_join_request_query_id = $chat_join_request_query_id;

        return $this;
    }

    /**
     * @return ChatJoinRequestResultEnum
     */
    public function getResult(): ChatJoinRequestResultEnum
    {
        return $this->result;
    }

    /**
     * @param ChatJoinRequestResultEnum $result
     *
     * @return AnswerChatJoinRequestQueryRequest
     */
    public function setResult(ChatJoinRequestResultEnum $result): AnswerChatJoinRequestQueryRequest
    {
        $this->result = $result;

        return $this;
    }
}

// endregion CLASS_AnswerChatJoinRequestQueryRequest
