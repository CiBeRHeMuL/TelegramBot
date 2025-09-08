<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\PollTypeEnum;

/**
 * This object contains information about a poll.
 *
 * @link https://core.telegram.org/bots/api#poll
 */
final class Poll implements EntityInterface
{
    /**
     * @param string $id Unique poll identifier
     * @param string $question Poll question, 1-300 characters
     * @param PollOption[] $options List of poll options
     * @param int $total_voter_count Total number of users that voted in the poll
     * @param bool $is_closed True, if the poll is closed
     * @param bool $is_anonymous True, if the poll is anonymous
     * @param PollTypeEnum $type Poll type, currently can be “regular” or “quiz”
     * @param bool $allows_multiple_answers True, if the poll allows multiple answers
     * @param MessageEntity[]|null $question_entities Optional. Special entities that appear in the question. Currently, only custom
     * emoji entities are allowed in poll questions
     * @param int|null $correct_option_id Optional. 0-based identifier of the correct answer option. Available only for polls in
     * the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
     * @param string|null $explanation Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon
     * in a quiz-style poll, 0-200 characters
     * @param MessageEntity[]|null $explanation_entities Optional. Special entities like usernames, URLs, bot commands, etc. that
     * appear in the explanation
     * @param int|null $open_period Optional. Amount of time in seconds the poll will be active after creation
     * @param int|null $close_date Optional. Point in time (Unix timestamp) when the poll will be automatically closed
     *
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#polloption PollOption
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected string $id,
        protected string $question,
        #[ArrayType(PollOption::class)]
        protected array $options,
        protected int $total_voter_count,
        protected bool $is_closed,
        protected bool $is_anonymous,
        protected PollTypeEnum $type,
        protected bool $allows_multiple_answers,
        #[ArrayType(MessageEntity::class)]
        protected ?array $question_entities = null,
        protected ?int $correct_option_id = null,
        protected ?string $explanation = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $explanation_entities = null,
        protected ?int $open_period = null,
        protected ?int $close_date = null,
    ) {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Poll
     */
    public function setId(string $id): Poll
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     *
     * @return Poll
     */
    public function setQuestion(string $question): Poll
    {
        $this->question = $question;
        return $this;
    }

    /**
     * @return PollOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param PollOption[] $options
     *
     * @return Poll
     */
    public function setOptions(array $options): Poll
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalVoterCount(): int
    {
        return $this->total_voter_count;
    }

    /**
     * @param int $total_voter_count
     *
     * @return Poll
     */
    public function setTotalVoterCount(int $total_voter_count): Poll
    {
        $this->total_voter_count = $total_voter_count;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsClosed(): bool
    {
        return $this->is_closed;
    }

    /**
     * @param bool $is_closed
     *
     * @return Poll
     */
    public function setIsClosed(bool $is_closed): Poll
    {
        $this->is_closed = $is_closed;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    /**
     * @param bool $is_anonymous
     *
     * @return Poll
     */
    public function setIsAnonymous(bool $is_anonymous): Poll
    {
        $this->is_anonymous = $is_anonymous;
        return $this;
    }

    /**
     * @return PollTypeEnum
     */
    public function getType(): PollTypeEnum
    {
        return $this->type;
    }

    /**
     * @param PollTypeEnum $type
     *
     * @return Poll
     */
    public function setType(PollTypeEnum $type): Poll
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAllowsMultipleAnswers(): bool
    {
        return $this->allows_multiple_answers;
    }

    /**
     * @param bool $allows_multiple_answers
     *
     * @return Poll
     */
    public function setAllowsMultipleAnswers(bool $allows_multiple_answers): Poll
    {
        $this->allows_multiple_answers = $allows_multiple_answers;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getQuestionEntities(): ?array
    {
        return $this->question_entities;
    }

    /**
     * @param MessageEntity[]|null $question_entities
     *
     * @return Poll
     */
    public function setQuestionEntities(?array $question_entities): Poll
    {
        $this->question_entities = $question_entities;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCorrectOptionId(): ?int
    {
        return $this->correct_option_id;
    }

    /**
     * @param int|null $correct_option_id
     *
     * @return Poll
     */
    public function setCorrectOptionId(?int $correct_option_id): Poll
    {
        $this->correct_option_id = $correct_option_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    /**
     * @param string|null $explanation
     *
     * @return Poll
     */
    public function setExplanation(?string $explanation): Poll
    {
        $this->explanation = $explanation;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getExplanationEntities(): ?array
    {
        return $this->explanation_entities;
    }

    /**
     * @param MessageEntity[]|null $explanation_entities
     *
     * @return Poll
     */
    public function setExplanationEntities(?array $explanation_entities): Poll
    {
        $this->explanation_entities = $explanation_entities;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOpenPeriod(): ?int
    {
        return $this->open_period;
    }

    /**
     * @param int|null $open_period
     *
     * @return Poll
     */
    public function setOpenPeriod(?int $open_period): Poll
    {
        $this->open_period = $open_period;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCloseDate(): ?int
    {
        return $this->close_date;
    }

    /**
     * @param int|null $close_date
     *
     * @return Poll
     */
    public function setCloseDate(?int $close_date): Poll
    {
        $this->close_date = $close_date;
        return $this;
    }
}
