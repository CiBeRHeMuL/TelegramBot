<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * Describes a service message about an option added to a poll.
 *
 * @link https://core.telegram.org/bots/api#polloptionadded
 */
final class PollOptionAdded implements EntityInterface
{
    /**
     * @param string $option_persistent_id Unique identifier of the added option
     * @param string $option_text Option text
     * @param MessageEntity[]|null $option_text_entities Optional. Special entities that appear in the option_text
     * @param AbstractMaybeInaccessibleMessage|null $poll_message Optional. Message containing the poll to which the option was added,
     * if known. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#maybeinaccessiblemessage MaybeInaccessibleMessage
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected string $option_persistent_id,
        protected string $option_text,
        #[ArrayType(MessageEntity::class)]
        protected ?array $option_text_entities = null,
        protected ?AbstractMaybeInaccessibleMessage $poll_message = null,
    ) {}

    /**
     * @return string
     */
    public function getOptionPersistentId(): string
    {
        return $this->option_persistent_id;
    }

    /**
     * @param string $option_persistent_id
     *
     * @return PollOptionAdded
     */
    public function setOptionPersistentId(string $option_persistent_id): PollOptionAdded
    {
        $this->option_persistent_id = $option_persistent_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOptionText(): string
    {
        return $this->option_text;
    }

    /**
     * @param string $option_text
     *
     * @return PollOptionAdded
     */
    public function setOptionText(string $option_text): PollOptionAdded
    {
        $this->option_text = $option_text;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getOptionTextEntities(): ?array
    {
        return $this->option_text_entities;
    }

    /**
     * @param MessageEntity[]|null $option_text_entities
     *
     * @return PollOptionAdded
     */
    public function setOptionTextEntities(?array $option_text_entities): PollOptionAdded
    {
        $this->option_text_entities = $option_text_entities;
        return $this;
    }

    /**
     * @return AbstractMaybeInaccessibleMessage|null
     */
    public function getPollMessage(): ?AbstractMaybeInaccessibleMessage
    {
        return $this->poll_message;
    }

    /**
     * @param AbstractMaybeInaccessibleMessage|null $poll_message
     *
     * @return PollOptionAdded
     */
    public function setPollMessage(?AbstractMaybeInaccessibleMessage $poll_message): PollOptionAdded
    {
        $this->poll_message = $poll_message;
        return $this;
    }
}
