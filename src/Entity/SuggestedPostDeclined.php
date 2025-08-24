<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a service message about the rejection of a suggested post.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostdeclined
 */
class SuggestedPostDeclined extends AbstractEntity
{
    /**
     * @param string|null $comment Optional. Comment with which the post was declined
     * @param Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object
     * in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        protected string|null $comment = null,
        protected Message|null $suggested_post_message = null,
    ) {
        parent::__construct();
    }

    /**
     * @return string|null
     */
    public function getComment(): string|null
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     *
     * @return SuggestedPostDeclined
     */
    public function setComment(string|null $comment): SuggestedPostDeclined
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getSuggestedPostMessage(): Message|null
    {
        return $this->suggested_post_message;
    }

    /**
     * @param Message|null $suggested_post_message
     *
     * @return SuggestedPostDeclined
     */
    public function setSuggestedPostMessage(Message|null $suggested_post_message): SuggestedPostDeclined
    {
        $this->suggested_post_message = $suggested_post_message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'comment' => $this->comment,
            'suggested_post_message' => $this->suggested_post_message?->toArray(),
        ];
    }
}
