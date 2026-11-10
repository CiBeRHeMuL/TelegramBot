<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region CLASS_ReplyParameters
/**
 * Describes reply parameters for the message that is being sent.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#replyparameters
 */
final class ReplyParameters implements EntityInterface
{
    /**
     * @param int|null                   $message_id                  Optional. Identifier of the message that will be replied to in the current chat, or in the chat
     *                                                                chat_id if it is specified. Required if ephemeral_message_id isn't specified.
     * @param ChatId|null                $chat_id                     Optional. If the message to be replied to is from a different chat, unique identifier for the
     *                                                                chat or username of the bot, supergroup, or channel in the format \@username. Not supported for messages sent on behalf of
     *                                                                a business account, messages from channel direct messages chats and ephemeral messages.
     * @param bool|null                  $allow_sending_without_reply Optional. Pass True if the message should be sent even if the specified message
     *                                                                to be replied to is not found. Always False for replies in another chat or forum topic, and sent ephemeral messages. Always
     *                                                                True for messages sent on behalf of a business account.
     * @param string|null                $quote                       Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing.
     *                                                                The quote must be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler,
     *                                                                custom_emoji, and date_time entities. The message will fail to send if the quote isn't found in the original message. Ignored
     *                                                                for ephemeral messages.
     * @param TelegramParseModeEnum|null $quote_parse_mode            Optional. Mode for parsing entities in the quote. See formatting options
     *                                                                for more details.
     * @param MessageEntity[]|null       $quote_entities              Optional. A JSON-serialized list of special entities that appear in the quote.
     *                                                                It can be specified instead of quote_parse_mode.
     * @param int|null                   $quote_position              Optional. Position of the quote in the original message in UTF-16 code units. For quotes from
     *                                                                rich messages, it is the position in the text formed by joining plain texts of all quotable texts of the message, separated
     *                                                                by line feeds.
     * @param int|null                   $checklist_task_id           Optional. Identifier of the specific checklist task to be replied to
     * @param string|null                $poll_option_id              Optional. Persistent identifier of the specific poll option to be replied to
     * @param int|null                   $ephemeral_message_id        Optional. Identifier of the incoming ephemeral message that will be replied to in the
     *                                                                current chat. A reply to an ephemeral message must itself be an ephemeral message. An ephemeral message may only be replied
     *                                                                to within 15 seconds of being sent. Required if message_id isn't specified.
     * @param AbstractRichText[]|null    $quote_rich_texts            Optional. A JSON-serialized list of quoted parts of the rich message to be
     *                                                                replied to. Must contain one element for each quoted text of the message in the order of their appearance. Each of the following
     *                                                                is a separate quoted text: the text of a paragraph, a heading, a preformatted block, a footer, or a mathematical expression;
     *                                                                the text and the credit of a block quotation or a pull quotation; the summary of a details block; the caption and each cell
     *                                                                of a table; the text and the credit of a caption of a media block, a collage, a slideshow, or a map. Texts of blocks nested
     *                                                                in lists, block quotations, details, collages, and slideshows are separate quoted texts too. The first and the last elements
     *                                                                can contain only a part of the corresponding text; all other elements must contain the whole text. Formatting of the quoted
     *                                                                parts must be kept, and rich texts must be nested in the same way as in the message received from the server. Mathematical
     *                                                                expressions must be quoted entirely. Buttons in RichBlockButtons, anchors and dividers can't be quoted. Up to 32 quoted texts
     *                                                                with total length up to 1024 characters can be specified. Only plain text, RichTextBold, RichTextItalic, RichTextUnderline,
     *                                                                RichTextStrikethrough, RichTextSpoiler, RichTextSubscript, RichTextSuperscript, RichTextDateTime, RichTextCustomEmoji, RichTextMathematicalExpression,
     *                                                                and arrays of them are kept in the quote; other rich text types are replaced with their text. If non-empty, then quote, quote_parse_mode
     *                                                                and quote_entities are ignored.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#richtext RichText
     * @see https://core.telegram.org/bots/api#richmessage rich message
     * @see https://core.telegram.org/bots/api#richblockbuttons RichBlockButtons
     * @see https://core.telegram.org/bots/api#richtextbold RichTextBold
     * @see https://core.telegram.org/bots/api#richtextitalic RichTextItalic
     * @see https://core.telegram.org/bots/api#richtextunderline RichTextUnderline
     * @see https://core.telegram.org/bots/api#richtextstrikethrough RichTextStrikethrough
     * @see https://core.telegram.org/bots/api#richtextspoiler RichTextSpoiler
     * @see https://core.telegram.org/bots/api#richtextsubscript RichTextSubscript
     * @see https://core.telegram.org/bots/api#richtextsuperscript RichTextSuperscript
     * @see https://core.telegram.org/bots/api#richtextdatetime RichTextDateTime
     * @see https://core.telegram.org/bots/api#richtextcustomemoji RichTextCustomEmoji
     * @see https://core.telegram.org/bots/api#richtextmathematicalexpression RichTextMathematicalExpression
     */
    public function __construct(
        protected ?int $message_id = null,
        protected ?ChatId $chat_id = null,
        protected ?bool $allow_sending_without_reply = null,
        protected ?string $quote = null,
        protected ?TelegramParseModeEnum $quote_parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $quote_entities = null,
        protected ?int $quote_position = null,
        protected ?int $checklist_task_id = null,
        protected ?string $poll_option_id = null,
        protected ?int $ephemeral_message_id = null,
        #[ArrayType(AbstractRichText::class)]
        protected ?array $quote_rich_texts = null,
    ) {}

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    /**
     * @param int|null $message_id
     *
     * @return ReplyParameters
     */
    public function setMessageId(?int $message_id): ReplyParameters
    {
        $this->message_id = $message_id;

        return $this;
    }

    /**
     * @return ChatId|null
     */
    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    /**
     * @param ChatId|null $chat_id
     *
     * @return ReplyParameters
     */
    public function setChatId(?ChatId $chat_id): ReplyParameters
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowSendingWithoutReply(): ?bool
    {
        return $this->allow_sending_without_reply;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     *
     * @return ReplyParameters
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): ReplyParameters
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuote(): ?string
    {
        return $this->quote;
    }

    /**
     * @param string|null $quote
     *
     * @return ReplyParameters
     */
    public function setQuote(?string $quote): ReplyParameters
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getQuoteParseMode(): ?TelegramParseModeEnum
    {
        return $this->quote_parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $quote_parse_mode
     *
     * @return ReplyParameters
     */
    public function setQuoteParseMode(?TelegramParseModeEnum $quote_parse_mode): ReplyParameters
    {
        $this->quote_parse_mode = $quote_parse_mode;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getQuoteEntities(): ?array
    {
        return $this->quote_entities;
    }

    /**
     * @param MessageEntity[]|null $quote_entities
     *
     * @return ReplyParameters
     */
    public function setQuoteEntities(?array $quote_entities): ReplyParameters
    {
        $this->quote_entities = $quote_entities;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuotePosition(): ?int
    {
        return $this->quote_position;
    }

    /**
     * @param int|null $quote_position
     *
     * @return ReplyParameters
     */
    public function setQuotePosition(?int $quote_position): ReplyParameters
    {
        $this->quote_position = $quote_position;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getChecklistTaskId(): ?int
    {
        return $this->checklist_task_id;
    }

    /**
     * @param int|null $checklist_task_id
     *
     * @return ReplyParameters
     */
    public function setChecklistTaskId(?int $checklist_task_id): ReplyParameters
    {
        $this->checklist_task_id = $checklist_task_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPollOptionId(): ?string
    {
        return $this->poll_option_id;
    }

    /**
     * @param string|null $poll_option_id
     *
     * @return ReplyParameters
     */
    public function setPollOptionId(?string $poll_option_id): ReplyParameters
    {
        $this->poll_option_id = $poll_option_id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEphemeralMessageId(): ?int
    {
        return $this->ephemeral_message_id;
    }

    /**
     * @param int|null $ephemeral_message_id
     *
     * @return ReplyParameters
     */
    public function setEphemeralMessageId(?int $ephemeral_message_id): ReplyParameters
    {
        $this->ephemeral_message_id = $ephemeral_message_id;

        return $this;
    }

    /**
     * @return AbstractRichText[]|null
     */
    public function getQuoteRichTexts(): ?array
    {
        return $this->quote_rich_texts;
    }

    /**
     * @param AbstractRichText[]|null $quote_rich_texts
     *
     * @return ReplyParameters
     */
    public function setQuoteRichTexts(?array $quote_rich_texts): ReplyParameters
    {
        $this->quote_rich_texts = $quote_rich_texts;

        return $this;
    }
}
// endregion CLASS_ReplyParameters
