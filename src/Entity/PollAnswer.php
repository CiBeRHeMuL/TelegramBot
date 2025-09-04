<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @link https://core.telegram.org/bots/api#pollanswer
 */
final class PollAnswer implements EntityInterface
{
    /**
     * @param string $poll_id Unique poll identifier
     * @param int[] $option_ids 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
     * @param User|null $user Optional. The user that changed the answer to the poll, if the voter isn't anonymous
     * @param Chat|null $voter_chat Optional. The chat that changed the answer to the poll, if the voter is anonymous
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected string $poll_id,
        #[ArrayType('int')]
        protected array $option_ids,
        protected User|null $user = null,
        protected Chat|null $voter_chat = null,
    ) {
    }

    /**
     * @return string
     */
    public function getPollId(): string
    {
        return $this->poll_id;
    }

    /**
     * @param string $poll_id
     *
     * @return PollAnswer
     */
    public function setPollId(string $poll_id): PollAnswer
    {
        $this->poll_id = $poll_id;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getOptionIds(): array
    {
        return $this->option_ids;
    }

    /**
     * @param int[] $option_ids
     *
     * @return PollAnswer
     */
    public function setOptionIds(array $option_ids): PollAnswer
    {
        $this->option_ids = $option_ids;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): User|null
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return PollAnswer
     */
    public function setUser(User|null $user): PollAnswer
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getVoterChat(): Chat|null
    {
        return $this->voter_chat;
    }

    /**
     * @param Chat|null $voter_chat
     *
     * @return PollAnswer
     */
    public function setVoterChat(Chat|null $voter_chat): PollAnswer
    {
        $this->voter_chat = $voter_chat;
        return $this;
    }
}
