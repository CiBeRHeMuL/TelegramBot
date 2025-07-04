<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\InputPollOption;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Enum\PollTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class SendPollRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param InputPollOption[] $options A JSON-serialized list of 2-10 answer options
     * @param string $question Poll question, 1-300 characters
     * @param bool|null $allows_multiple_answers True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults
     * to False
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param int|null $close_date Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5
     * and no more than 600 seconds in the future. Can't be used together with open_period.
     * @param int|null $correct_option_id 0-based identifier of the correct answer option, required for polls in quiz mode
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param string|null $explanation Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style
     * poll, 0-200 characters with at most 2 line feeds after entities parsing
     * @param MessageEntity[]|null $explanation_entities A JSON-serialized list of special entities that appear in the poll explanation.
     * It can be specified instead of explanation_parse_mode
     * @param TelegramParseModeEnum|null $explanation_parse_mode Mode for parsing entities in the explanation.
     * See formatting options for more details.
     * @param bool|null $is_anonymous True, if the poll needs to be anonymous, defaults to True
     * @param bool|null $is_closed Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param int|null $open_period Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together
     * with close_date.
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param MessageEntity[]|null $question_entities A JSON-serialized list of special entities that appear in the poll question.
     * It can be specified instead of question_parse_mode
     * @param TelegramParseModeEnum|null $question_parse_mode Mode for parsing entities in the question. See formatting options for more details.
     * Currently, only custom emoji entities are allowed
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     * a reply from the user
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     * @param PollTypeEnum|null $type Poll type, “quiz” or “regular”, defaults to “regular”
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second,
     * ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     *
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     */
    public function __construct(
        private ChatId $chat_id,
        private array $options,
        private string $question,
        private bool|null $allows_multiple_answers = null,
        private string|null $business_connection_id = null,
        private int|null $close_date = null,
        private int|null $correct_option_id = null,
        private bool|null $disable_notification = null,
        private string|null $explanation = null,
        private array|null $explanation_entities = null,
        private TelegramParseModeEnum|null $explanation_parse_mode = null,
        private bool|null $is_anonymous = null,
        private bool|null $is_closed = null,
        private int|null $message_thread_id = null,
        private int|null $open_period = null,
        private bool|null $protect_content = null,
        private array|null $question_entities = null,
        private TelegramParseModeEnum|null $question_parse_mode = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ReplyParameters|null $reply_parameters = null,
        private PollTypeEnum|null $type = null,
        private string|null $message_effect_id = null,
        private bool|null $allow_paid_broadcast = null,
    ) {
    }

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

    public function getAllowsMultipleAnswers(): bool|null
    {
        return $this->allows_multiple_answers;
    }

    public function setAllowsMultipleAnswers(bool|null $allows_multiple_answers): SendPollRequest
    {
        $this->allows_multiple_answers = $allows_multiple_answers;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendPollRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getCloseDate(): int|null
    {
        return $this->close_date;
    }

    public function setCloseDate(int|null $close_date): SendPollRequest
    {
        $this->close_date = $close_date;
        return $this;
    }

    public function getCorrectOptionId(): int|null
    {
        return $this->correct_option_id;
    }

    public function setCorrectOptionId(int|null $correct_option_id): SendPollRequest
    {
        $this->correct_option_id = $correct_option_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendPollRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getExplanation(): string|null
    {
        return $this->explanation;
    }

    public function setExplanation(string|null $explanation): SendPollRequest
    {
        $this->explanation = $explanation;
        return $this;
    }

    public function getExplanationEntities(): array|null
    {
        return $this->explanation_entities;
    }

    public function setExplanationEntities(array|null $explanation_entities): SendPollRequest
    {
        $this->explanation_entities = $explanation_entities;
        return $this;
    }

    public function getExplanationParseMode(): TelegramParseModeEnum|null
    {
        return $this->explanation_parse_mode;
    }

    public function setExplanationParseMode(TelegramParseModeEnum|null $explanation_parse_mode): SendPollRequest
    {
        $this->explanation_parse_mode = $explanation_parse_mode;
        return $this;
    }

    public function getIsAnonymous(): bool|null
    {
        return $this->is_anonymous;
    }

    public function setIsAnonymous(bool|null $is_anonymous): SendPollRequest
    {
        $this->is_anonymous = $is_anonymous;
        return $this;
    }

    public function getIsClosed(): bool|null
    {
        return $this->is_closed;
    }

    public function setIsClosed(bool|null $is_closed): SendPollRequest
    {
        $this->is_closed = $is_closed;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendPollRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getOpenPeriod(): int|null
    {
        return $this->open_period;
    }

    public function setOpenPeriod(int|null $open_period): SendPollRequest
    {
        $this->open_period = $open_period;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendPollRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getQuestionEntities(): array|null
    {
        return $this->question_entities;
    }

    public function setQuestionEntities(array|null $question_entities): SendPollRequest
    {
        $this->question_entities = $question_entities;
        return $this;
    }

    public function getQuestionParseMode(): TelegramParseModeEnum|null
    {
        return $this->question_parse_mode;
    }

    public function setQuestionParseMode(TelegramParseModeEnum|null $question_parse_mode): SendPollRequest
    {
        $this->question_parse_mode = $question_parse_mode;
        return $this;
    }

    public function getReplyMarkup(): ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup): SendPollRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendPollRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getType(): PollTypeEnum|null
    {
        return $this->type;
    }

    public function setType(PollTypeEnum|null $type): SendPollRequest
    {
        $this->type = $type;
        return $this;
    }

    public function getMessageEffectId(): string|null
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(string|null $message_effect_id): SendPollRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): SendPollRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'options' => array_map(fn(InputPollOption $e) => $e->toArray(), $this->options),
            'question' => $this->question,
            'allows_multiple_answers' => $this->allows_multiple_answers,
            'business_connection_id' => $this->business_connection_id,
            'close_date' => $this->close_date,
            'correct_option_id' => $this->correct_option_id,
            'disable_notification' => $this->disable_notification,
            'explanation' => $this->explanation,
            'explanation_entities' => $this->explanation_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->explanation_entities)
                : null,
            'explanation_parse_mode' => $this->explanation_parse_mode?->value,
            'is_anonymous' => $this->is_anonymous,
            'is_closed' => $this->is_closed,
            'message_thread_id' => $this->message_thread_id,
            'open_period' => $this->open_period,
            'protect_content' => $this->protect_content,
            'question_entities' => $this->question_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->question_entities)
                : null,
            'question_parse_mode' => $this->question_parse_mode?->value,
            'reply_markup' => $this->reply_markup?->toArray(),
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'type' => $this->type?->value,
            'message_effect_id' => $this->message_effect_id,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
        ];
    }
}
