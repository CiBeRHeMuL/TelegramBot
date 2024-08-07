<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 * @link https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswer extends AbstractEntity
{
    /**
     * @param string $poll_id Unique poll identifier
     * @param int[] $option_ids 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
     * @param User|null $user Optional. The user that changed the answer to the poll, if the voter isn't anonymous
     * @param Chat|null $voter_chat Optional. The chat that changed the answer to the poll, if the voter is anonymous
     */
    public function __construct(
        protected string $poll_id,
        #[ArrayType('int')] protected array $option_ids,
        protected User|null $user = null,
        protected Chat|null $voter_chat = null,
    ) {
        parent::__construct();
    }

    public function getPollId(): string
    {
        return $this->poll_id;
    }

    public function setPollId(string $poll_id): PollAnswer
    {
        $this->poll_id = $poll_id;
        return $this;
    }

    public function getOptionIds(): array
    {
        return $this->option_ids;
    }

    public function setOptionIds(array $option_ids): PollAnswer
    {
        $this->option_ids = $option_ids;
        return $this;
    }

    public function getUser(): User|null
    {
        return $this->user;
    }

    public function setUser(User|null $user): PollAnswer
    {
        $this->user = $user;
        return $this;
    }

    public function getVoterChat(): Chat|null
    {
        return $this->voter_chat;
    }

    public function setVoterChat(Chat|null $voter_chat): PollAnswer
    {
        $this->voter_chat = $voter_chat;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'poll_id' => $this->poll_id,
            'option_ids' => $this->option_ids,
            'user' => $this->user?->toArray(),
            'voter_chat' => $this->voter_chat?->toArray(),
        ];
    }
}
