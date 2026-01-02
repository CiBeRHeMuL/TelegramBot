<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes a service message about the rejection of a suggested post.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostdeclined
 */
final class SuggestedPostDeclined implements EntityInterface
{
    /**
     * @param string|null $comment Optional. Comment with which the post was declined
     * @param Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object
     * in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        protected ?string $comment = null,
        protected ?Message $suggested_post_message = null,
    ) {}

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     *
     * @return SuggestedPostDeclined
     */
    public function setComment(?string $comment): SuggestedPostDeclined
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getSuggestedPostMessage(): ?Message
    {
        return $this->suggested_post_message;
    }

    /**
     * @param Message|null $suggested_post_message
     *
     * @return SuggestedPostDeclined
     */
    public function setSuggestedPostMessage(?Message $suggested_post_message): SuggestedPostDeclined
    {
        $this->suggested_post_message = $suggested_post_message;
        return $this;
    }
}
