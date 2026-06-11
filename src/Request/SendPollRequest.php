<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\InputPollMediaInterface;
use AndrewGos\TelegramBot\Entity\InputPollOption;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Enum\CountryCodeEnum;
use AndrewGos\TelegramBot\Enum\PollTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API sendPoll method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#sendpoll
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Send, Poll
// STRUCTURE: ▶ ┌chat_id + options + question + allows_multiple_answers + business_connection_id┐ → ◇ construct → ⊕ → ∑ ⟦SendPollRequest⟧

// region CLASS_SendPollRequest
/**
 * @see https://core.telegram.org/bots/api#sendpoll
 */
class SendPollRequest implements RequestInterface
{
    /**
     * @param ChatId                                                                       $chat_id                   Unique identifier for the target chat or username of the target bot, supergroup or channel in the format
     *                                                                                                                \@username. Polls can't be sent to channel direct messages chats.
     * @param InputPollOption[]                                                            $options                   A JSON-serialized list of 1-12 answer options
     * @param string                                                                       $question                  Poll question, 1-300 characters
     * @param bool|null                                                                    $allows_multiple_answers   Pass True, if the poll allows multiple answers, defaults to False
     * @param string|null                                                                  $business_connection_id    Unique identifier of the business connection on behalf of which the message will
     *                                                                                                                be sent
     * @param int|null                                                                     $close_date                Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5
     *                                                                                                                and no more than 2628000 seconds in the future. Can't be used together with open_period.
     * @param bool|null                                                                    $disable_notification      Sends the message silently. Users will receive a notification with no sound.
     * @param string|null                                                                  $explanation               Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style
     *                                                                                                                poll, 0-200 characters with at most 2 line feeds after entities parsing
     * @param MessageEntity[]|null                                                         $explanation_entities      A JSON-serialized list of special entities that appear in the poll explanation.
     *                                                                                                                It can be specified instead of explanation_parse_mode
     * @param TelegramParseModeEnum|null                                                   $explanation_parse_mode    Mode for parsing entities in the explanation. See formatting options
     *                                                                                                                for more details.
     * @param bool|null                                                                    $is_anonymous              True, if the poll needs to be anonymous, defaults to True
     * @param bool|null                                                                    $is_closed                 Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
     * @param int|null                                                                     $message_thread_id         Unique identifier for the target message thread (topic) of a forum; for forum supergroups
     *                                                                                                                and private chats of bots with forum topic mode enabled only
     * @param int|null                                                                     $open_period               Amount of time in seconds the poll will be active after creation, 5-2628000. Can't be used together
     *                                                                                                                with close_date.
     * @param bool|null                                                                    $protect_content           Protects the contents of the sent message from forwarding and saving
     * @param MessageEntity[]|null                                                         $question_entities         A JSON-serialized list of special entities that appear in the poll question.
     *                                                                                                                It can be specified instead of question_parse_mode
     * @param TelegramParseModeEnum|null                                                   $question_parse_mode       Mode for parsing entities in the question. See formatting options for
     *                                                                                                                more details. Currently, only custom emoji entities are allowed
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup              Additional interface options.
     *                                                                                                                A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     *                                                                                                                a reply from the user
     * @param ReplyParameters|null                                                         $reply_parameters          Description of the message to reply to
     * @param PollTypeEnum|null                                                            $type                      Poll type, “quiz” or “regular”, defaults to “regular”
     * @param string|null                                                                  $message_effect_id         Unique identifier of the message effect to be added to the message; for private chats
     *                                                                                                                only
     * @param bool|null                                                                    $allow_paid_broadcast      Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for
     *                                                                                                                a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance.
     * @param bool|null                                                                    $allows_revoting           Pass True, if the poll allows to change chosen answer options, defaults to False for quizzes
     *                                                                                                                and to True for regular polls
     * @param bool|null                                                                    $shuffle_options           Pass True, if the poll options must be shown in random order
     * @param bool|null                                                                    $allow_adding_options      Pass True, if answer options can be added to the poll after creation; not supported
     *                                                                                                                for anonymous polls and quizzes
     * @param bool|null                                                                    $hide_results_until_closes Pass True, if poll results must be shown only after the poll closes
     * @param int[]|null                                                                   $correct_option_ids        A JSON-serialized list of monotonically increasing 0-based identifiers of the correct
     *                                                                                                                answer options, required for polls in quiz mode
     * @param string|null                                                                  $description               Description of the poll to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null                                                   $description_parse_mode    Mode for parsing entities in the poll description. See formatting
     *                                                                                                                options for more details.
     * @param MessageEntity[]|null                                                         $description_entities      A JSON-serialized list of special entities that appear in the poll description,
     *                                                                                                                which can be specified instead of description_parse_mode
     * @param bool|null                                                                    $members_only              Pass True, if voting is limited to users who have been members of the chat where the poll is
     *                                                                                                                being sent for more than 24 hours; for channel chats only
     * @param CountryCodeEnum[]|null                                                       $country_codes             A JSON-serialized list of 0-12 two-letter ISO 3166-1 alpha-2 country codes indicating
     *                                                                                                                the countries from which users can vote in the poll; for channel chats only. If omitted or empty, then users from any country
     *                                                                                                                can participate in the poll.
     * @param InputPollMediaInterface|null                                                 $explanation_media         Media added to the quiz explanation
     * @param InputPollMediaInterface|null                                                 $media                     Media added to the poll description
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inputpolloption InputPollOption
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 ISO 3166-1 alpha-2
     * @see https://core.telegram.org/bots/api#inputpollmedia InputPollMediaInterface
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardmarkup ReplyKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardremove ReplyKeyboardRemove
     * @see https://core.telegram.org/bots/api#forcereply ForceReply
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     * @see https://core.telegram.org/bots/features#keyboards custom reply keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private array $options,
        private string $question,
        private ?bool $allows_multiple_answers = null,
        private ?string $business_connection_id = null,
        private ?int $close_date = null,
        private ?bool $disable_notification = null,
        private ?string $explanation = null,
        private ?array $explanation_entities = null,
        private ?TelegramParseModeEnum $explanation_parse_mode = null,
        private ?bool $is_anonymous = null,
        private ?bool $is_closed = null,
        private ?int $message_thread_id = null,
        private ?int $open_period = null,
        private ?bool $protect_content = null,
        private ?array $question_entities = null,
        private ?TelegramParseModeEnum $question_parse_mode = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ?ReplyParameters $reply_parameters = null,
        private ?PollTypeEnum $type = null,
        private ?string $message_effect_id = null,
        private ?bool $allow_paid_broadcast = null,
        private ?bool $allows_revoting = null,
        private ?bool $shuffle_options = null,
        private ?bool $allow_adding_options = null,
        private ?bool $hide_results_until_closes = null,
        private ?array $correct_option_ids = null,
        private ?string $description = null,
        private ?TelegramParseModeEnum $description_parse_mode = null,
        private ?array $description_entities = null,
        private ?bool $members_only = null,
        private ?array $country_codes = null,
        private ?InputPollMediaInterface $explanation_media = null,
        private ?InputPollMediaInterface $media = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendPollRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): SendPollRequest
    {
        $this->options = $options;

        return $this;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): SendPollRequest
    {
        $this->question = $question;

        return $this;
    }

    public function getAllowsMultipleAnswers(): ?bool
    {
        return $this->allows_multiple_answers;
    }

    public function setAllowsMultipleAnswers(?bool $allows_multiple_answers): SendPollRequest
    {
        $this->allows_multiple_answers = $allows_multiple_answers;

        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): SendPollRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    public function getCloseDate(): ?int
    {
        return $this->close_date;
    }

    public function setCloseDate(?int $close_date): SendPollRequest
    {
        $this->close_date = $close_date;

        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): SendPollRequest
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    public function setExplanation(?string $explanation): SendPollRequest
    {
        $this->explanation = $explanation;

        return $this;
    }

    public function getExplanationEntities(): ?array
    {
        return $this->explanation_entities;
    }

    public function setExplanationEntities(?array $explanation_entities): SendPollRequest
    {
        $this->explanation_entities = $explanation_entities;

        return $this;
    }

    public function getExplanationParseMode(): ?TelegramParseModeEnum
    {
        return $this->explanation_parse_mode;
    }

    public function setExplanationParseMode(?TelegramParseModeEnum $explanation_parse_mode): SendPollRequest
    {
        $this->explanation_parse_mode = $explanation_parse_mode;

        return $this;
    }

    public function getIsAnonymous(): ?bool
    {
        return $this->is_anonymous;
    }

    public function setIsAnonymous(?bool $is_anonymous): SendPollRequest
    {
        $this->is_anonymous = $is_anonymous;

        return $this;
    }

    public function getIsClosed(): ?bool
    {
        return $this->is_closed;
    }

    public function setIsClosed(?bool $is_closed): SendPollRequest
    {
        $this->is_closed = $is_closed;

        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendPollRequest
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    public function getOpenPeriod(): ?int
    {
        return $this->open_period;
    }

    public function setOpenPeriod(?int $open_period): SendPollRequest
    {
        $this->open_period = $open_period;

        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): SendPollRequest
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    public function getQuestionEntities(): ?array
    {
        return $this->question_entities;
    }

    public function setQuestionEntities(?array $question_entities): SendPollRequest
    {
        $this->question_entities = $question_entities;

        return $this;
    }

    public function getQuestionParseMode(): ?TelegramParseModeEnum
    {
        return $this->question_parse_mode;
    }

    public function setQuestionParseMode(?TelegramParseModeEnum $question_parse_mode): SendPollRequest
    {
        $this->question_parse_mode = $question_parse_mode;

        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup): SendPollRequest
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }

    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): SendPollRequest
    {
        $this->reply_parameters = $reply_parameters;

        return $this;
    }

    public function getType(): ?PollTypeEnum
    {
        return $this->type;
    }

    public function setType(?PollTypeEnum $type): SendPollRequest
    {
        $this->type = $type;

        return $this;
    }

    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(?string $message_effect_id): SendPollRequest
    {
        $this->message_effect_id = $message_effect_id;

        return $this;
    }

    public function getAllowPaidBroadcast(): ?bool
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(?bool $allow_paid_broadcast): SendPollRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;

        return $this;
    }

    public function getAllowsRevoting(): ?bool
    {
        return $this->allows_revoting;
    }

    public function setAllowsRevoting(?bool $allows_revoting): SendPollRequest
    {
        $this->allows_revoting = $allows_revoting;

        return $this;
    }

    public function getShuffleOptions(): ?bool
    {
        return $this->shuffle_options;
    }

    public function setShuffleOptions(?bool $shuffle_options): SendPollRequest
    {
        $this->shuffle_options = $shuffle_options;

        return $this;
    }

    public function getAllowAddingOptions(): ?bool
    {
        return $this->allow_adding_options;
    }

    public function setAllowAddingOptions(?bool $allow_adding_options): SendPollRequest
    {
        $this->allow_adding_options = $allow_adding_options;

        return $this;
    }

    public function getHideResultsUntilCloses(): ?bool
    {
        return $this->hide_results_until_closes;
    }

    public function setHideResultsUntilCloses(?bool $hide_results_until_closes): SendPollRequest
    {
        $this->hide_results_until_closes = $hide_results_until_closes;

        return $this;
    }

    public function getCorrectOptionIds(): ?array
    {
        return $this->correct_option_ids;
    }

    public function setCorrectOptionIds(?array $correct_option_ids): SendPollRequest
    {
        $this->correct_option_ids = $correct_option_ids;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): SendPollRequest
    {
        $this->description = $description;

        return $this;
    }

    public function getDescriptionParseMode(): ?TelegramParseModeEnum
    {
        return $this->description_parse_mode;
    }

    public function setDescriptionParseMode(?TelegramParseModeEnum $description_parse_mode): SendPollRequest
    {
        $this->description_parse_mode = $description_parse_mode;

        return $this;
    }

    public function getDescriptionEntities(): ?array
    {
        return $this->description_entities;
    }

    public function setDescriptionEntities(?array $description_entities): SendPollRequest
    {
        $this->description_entities = $description_entities;

        return $this;
    }

    public function getMembersOnly(): ?bool
    {
        return $this->members_only;
    }

    public function setMembersOnly(?bool $members_only): SendPollRequest
    {
        $this->members_only = $members_only;

        return $this;
    }

    public function getCountryCodes(): ?array
    {
        return $this->country_codes;
    }

    public function setCountryCodes(?array $country_codes): SendPollRequest
    {
        $this->country_codes = $country_codes;

        return $this;
    }

    public function getExplanationMedia(): ?InputPollMediaInterface
    {
        return $this->explanation_media;
    }

    public function setExplanationMedia(?InputPollMediaInterface $explanation_media): SendPollRequest
    {
        $this->explanation_media = $explanation_media;

        return $this;
    }

    public function getMedia(): ?InputPollMediaInterface
    {
        return $this->media;
    }

    public function setMedia(?InputPollMediaInterface $media): SendPollRequest
    {
        $this->media = $media;

        return $this;
    }
}
// endregion CLASS_SendPollRequest
