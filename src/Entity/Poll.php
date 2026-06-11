<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\CountryCodeEnum;
use AndrewGos\TelegramBot\Enum\PollTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about a poll.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#poll
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Poll, Telegram, Bot API, DTO, poll
// STRUCTURE: ▶ ┌id,question,options[],total_voter_count,is_closed,is_anonymous,type,allows_multiple_answers┐ → ◇ ... → ∑ Poll
// region CLASS_Poll

/**
 * This object contains information about a poll.
 *
 * @see https://core.telegram.org/bots/api#poll
 */
final class Poll implements EntityInterface
{
    /**
     * @param string                 $id                      Unique poll identifier
     * @param string                 $question                Poll question, 1-300 characters
     * @param PollOption[]           $options                 List of poll options
     * @param int                    $total_voter_count       Total number of users that voted in the poll
     * @param bool                   $is_closed               True, if the poll is closed
     * @param bool                   $is_anonymous            True, if the poll is anonymous
     * @param PollTypeEnum           $type                    Poll type, currently can be “regular” or “quiz”
     * @param bool                   $allows_multiple_answers True, if the poll allows multiple answers
     * @param bool                   $allows_revoting         True, if the poll allows to change the chosen answer options
     * @param bool                   $members_only            True if voting is limited to users who have been members of the chat where the poll was originally
     *                                                        sent for more than 24 hours
     * @param MessageEntity[]|null   $question_entities       Optional. Special entities that appear in the question. Currently, only custom
     *                                                        emoji entities are allowed in poll questions
     * @param string|null            $explanation             Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon
     *                                                        in a quiz-style poll, 0-200 characters
     * @param MessageEntity[]|null   $explanation_entities    Optional. Special entities like usernames, URLs, bot commands, etc. that
     *                                                        appear in the explanation
     * @param int|null               $open_period             Optional. Amount of time in seconds the poll will be active after creation
     * @param int|null               $close_date              Optional. Point in time (Unix timestamp) when the poll will be automatically closed
     * @param int[]|null             $correct_option_ids      Optional. Array of 0-based identifiers of the correct answer options. Available only
     *                                                        for polls in quiz mode which are closed or were sent (not forwarded) by the bot or to the private chat with the bot.
     * @param string|null            $description             Optional. Description of the poll; for polls inside the Message object only
     * @param MessageEntity[]|null   $description_entities    Optional. Special entities like usernames, URLs, bot commands, etc. that
     *                                                        appear in the description
     * @param CountryCodeEnum[]|null $country_codes           Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the
     *                                                        countries from which users can vote in the poll. If omitted, then users from any country can participate in the poll.
     * @param PollMedia|null         $explanation_media       Optional. Media added to the quiz explanation
     * @param PollMedia|null         $media                   Optional. Media added to the poll description; for polls inside the Message object only
     *
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#polloption PollOption
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 ISO 3166-1 alpha-2
     * @see https://core.telegram.org/bots/api#pollmedia PollMedia
     * @see https://core.telegram.org/bots/api#message Message
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
        protected bool $allows_revoting,
        protected bool $members_only,
        #[ArrayType(MessageEntity::class)]
        protected ?array $question_entities = null,
        protected ?string $explanation = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $explanation_entities = null,
        protected ?int $open_period = null,
        protected ?int $close_date = null,
        #[ArrayType('int')]
        protected ?array $correct_option_ids = null,
        protected ?string $description = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $description_entities = null,
        #[ArrayType(CountryCodeEnum::class)]
        protected ?array $country_codes = null,
        protected ?PollMedia $explanation_media = null,
        protected ?PollMedia $media = null,
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
     * @return bool
     */
    public function getAllowsRevoting(): bool
    {
        return $this->allows_revoting;
    }

    /**
     * @param bool $allows_revoting
     *
     * @return Poll
     */
    public function setAllowsRevoting(bool $allows_revoting): Poll
    {
        $this->allows_revoting = $allows_revoting;

        return $this;
    }

    /**
     * @return bool
     */
    public function getMembersOnly(): bool
    {
        return $this->members_only;
    }

    /**
     * @param bool $members_only
     *
     * @return Poll
     */
    public function setMembersOnly(bool $members_only): Poll
    {
        $this->members_only = $members_only;

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

    /**
     * @return int[]|null
     */
    public function getCorrectOptionIds(): ?array
    {
        return $this->correct_option_ids;
    }

    /**
     * @param int[]|null $correct_option_ids
     *
     * @return Poll
     */
    public function setCorrectOptionIds(?array $correct_option_ids): Poll
    {
        $this->correct_option_ids = $correct_option_ids;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return Poll
     */
    public function setDescription(?string $description): Poll
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getDescriptionEntities(): ?array
    {
        return $this->description_entities;
    }

    /**
     * @param MessageEntity[]|null $description_entities
     *
     * @return Poll
     */
    public function setDescriptionEntities(?array $description_entities): Poll
    {
        $this->description_entities = $description_entities;

        return $this;
    }

    /**
     * @return CountryCodeEnum[]|null
     */
    public function getCountryCodes(): ?array
    {
        return $this->country_codes;
    }

    /**
     * @param CountryCodeEnum[]|null $country_codes
     *
     * @return Poll
     */
    public function setCountryCodes(?array $country_codes): Poll
    {
        $this->country_codes = $country_codes;

        return $this;
    }

    /**
     * @return PollMedia|null
     */
    public function getExplanationMedia(): ?PollMedia
    {
        return $this->explanation_media;
    }

    /**
     * @param PollMedia|null $explanation_media
     *
     * @return Poll
     */
    public function setExplanationMedia(?PollMedia $explanation_media): Poll
    {
        $this->explanation_media = $explanation_media;

        return $this;
    }

    /**
     * @return PollMedia|null
     */
    public function getMedia(): ?PollMedia
    {
        return $this->media;
    }

    /**
     * @param PollMedia|null $media
     *
     * @return Poll
     */
    public function setMedia(?PollMedia $media): Poll
    {
        $this->media = $media;

        return $this;
    }
}

// endregion CLASS_Poll
