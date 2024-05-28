<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\PollTypeEnum;
use stdClass;

/**
 * This object contains information about a poll.
 * @link https://core.telegram.org/bots/api#poll
 */
class Poll implements EntityInterface
{
    /**
     * @param string $id Unique poll identifier.
     * @param string $question Poll question, 1-300 characters.
     * @param PollOption[] $options List of poll options.
     * @param int $total_voter_count Total number of users that voted in the poll.
     * @param bool $is_closed True, if the poll is closed.
     * @param bool $is_anonymous True, if the poll is anonymous.
     * @param PollTypeEnum $type Poll type, currently can be “regular” or “quiz”.
     * @param bool $allows_multiple_answers True, if the poll allows multiple answers.
     * @param array|null $question_entities Optional. Special entities that appear in the question.
     * Currently, only custom emoji entities are allowed in poll questions
     * @param int|null $correct_option_id Optional. 0-based identifier of the correct answer option.
     * Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
     * @param string|null $explanation Optional.
     * Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters.
     * @param MessageEntity[]|null $explanation_entities Optional.
     * Special entities like usernames, URLs, bot commands, etc. that appear in the explanation.
     * @param int|null $open_period Optional. Amount of time in seconds the poll will be active after creation.
     * @param int|null $close_date Optional. Point in time (Unix timestamp) when the poll will be automatically closed.
     */
    public function __construct(
        private string $id,
        private string $question,
        #[ArrayType(PollOption::class)] private array $options,
        private int $total_voter_count,
        private bool $is_closed,
        private bool $is_anonymous,
        private PollTypeEnum $type,
        private bool $allows_multiple_answers,
        #[ArrayType(MessageEntity::class)] private array|null $question_entities = null,
        private int|null $correct_option_id = null,
        private string|null $explanation = null,
        #[ArrayType(MessageEntity::class)] private array|null $explanation_entities = null,
        private int|null $open_period = null,
        private int|null $close_date = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Poll
    {
        $this->id = $id;
        return $this;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): Poll
    {
        $this->question = $question;
        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): Poll
    {
        $this->options = $options;
        return $this;
    }

    public function getTotalVoterCount(): int
    {
        return $this->total_voter_count;
    }

    public function setTotalVoterCount(int $total_voter_count): Poll
    {
        $this->total_voter_count = $total_voter_count;
        return $this;
    }

    public function isIsClosed(): bool
    {
        return $this->is_closed;
    }

    public function setIsClosed(bool $is_closed): Poll
    {
        $this->is_closed = $is_closed;
        return $this;
    }

    public function isIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    public function setIsAnonymous(bool $is_anonymous): Poll
    {
        $this->is_anonymous = $is_anonymous;
        return $this;
    }

    public function getType(): PollTypeEnum
    {
        return $this->type;
    }

    public function setType(PollTypeEnum $type): Poll
    {
        $this->type = $type;
        return $this;
    }

    public function isAllowsMultipleAnswers(): bool
    {
        return $this->allows_multiple_answers;
    }

    public function setAllowsMultipleAnswers(bool $allows_multiple_answers): Poll
    {
        $this->allows_multiple_answers = $allows_multiple_answers;
        return $this;
    }

    public function getQuestionEntities(): array|null
    {
        return $this->question_entities;
    }

    public function setQuestionEntities(array|null $question_entities): Poll
    {
        $this->question_entities = $question_entities;
        return $this;
    }

    public function getCorrectOptionId(): int|null
    {
        return $this->correct_option_id;
    }

    public function setCorrectOptionId(int|null $correct_option_id): Poll
    {
        $this->correct_option_id = $correct_option_id;
        return $this;
    }

    public function getExplanation(): string|null
    {
        return $this->explanation;
    }

    public function setExplanation(string|null $explanation): Poll
    {
        $this->explanation = $explanation;
        return $this;
    }

    public function getExplanationEntities(): array|null
    {
        return $this->explanation_entities;
    }

    public function setExplanationEntities(array|null $explanation_entities): Poll
    {
        $this->explanation_entities = $explanation_entities;
        return $this;
    }

    public function getOpenPeriod(): int|null
    {
        return $this->open_period;
    }

    public function setOpenPeriod(int|null $open_period): Poll
    {
        $this->open_period = $open_period;
        return $this;
    }

    public function getCloseDate(): int|null
    {
        return $this->close_date;
    }

    public function setCloseDate(int|null $close_date): Poll
    {
        $this->close_date = $close_date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'options' => array_map(
                fn(PollOption $option) => $option->toArray(),
                $this->options,
            ),
            'total_voter_count' => $this->total_voter_count,
            'is_closed' => $this->is_closed,
            'is_anonymous' => $this->is_anonymous,
            'type' => $this->type->value,
            'allows_multiple_answers' => $this->allows_multiple_answers,
            'correct_option_id' => $this->correct_option_id,
            'explanation' => $this->explanation,
            'explanation_entities' => $this->explanation_entities !== null
                ? array_map(
                    fn(MessageEntity $entity) => $entity->toArray(),
                    $this->explanation_entities,
                )
                : null,
            'question_entities' => $this->question_entities !== null
                ? array_map(
                    fn(MessageEntity $entity) => $entity->toArray(),
                    $this->question_entities,
                )
                : null,
            'open_period' => $this->open_period,
            'close_date' => $this->close_date,
        ];
    }
}
