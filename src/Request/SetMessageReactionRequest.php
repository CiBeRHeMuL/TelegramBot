<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractReactionType;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#setmessagereaction
 */
class SetMessageReactionRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param int $message_id Identifier of the target message. If the message belongs to a media group, the reaction is set to the
     * first non-deleted message in the group instead.
     * @param bool|null $is_big Pass True to set the reaction with a big animation
     * @param AbstractReactionType[]|null $reaction A JSON-serialized list of reaction types to set on the message. Currently, as
     * non-premium users, bots can set up to one reaction per message. A custom emoji reaction can be used if it is either already
     * present on the message or explicitly allowed by chat administrators. Paid reactions can't be used by bots.
     *
     * @see https://core.telegram.org/bots/api#reactiontype ReactionType
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
        private bool|null $is_big = null,
        private array|null $reaction = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetMessageReactionRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): SetMessageReactionRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getIsBig(): bool|null
    {
        return $this->is_big;
    }

    public function setIsBig(bool|null $is_big): SetMessageReactionRequest
    {
        $this->is_big = $is_big;
        return $this;
    }

    public function getReaction(): array|null
    {
        return $this->reaction;
    }

    public function setReaction(array|null $reaction): SetMessageReactionRequest
    {
        $this->reaction = $reaction;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_id' => $this->message_id,
            'is_big' => $this->is_big,
            'reaction' => $this->reaction !== null
                ? array_map(
                    fn(AbstractReactionType $e) => $e->toArray(),
                    $this->reaction,
                )
                : null,
        ];
    }
}
