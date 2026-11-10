<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region CLASS_TextQuote
/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#textquote
 */
final class TextQuote implements EntityInterface
{
    /**
     * @param string                  $text       Text of the quoted part of a message that is replied to by the given message; may be empty if the quote
     *                                            was chosen from a rich message
     * @param int                     $position   Approximate quote position in the original message in UTF-16 code units as specified by the sender. For
     *                                            quotes from rich messages, it is the position in the text formed by joining plain texts of all quotable texts of the message,
     *                                            separated by line feeds.
     * @param MessageEntity[]|null    $entities   Optional. Special entities that appear in the quote. Currently, only bold, italic, underline,
     *                                            strikethrough, spoiler, custom_emoji, and date_time entities are kept in quotes.
     * @param bool|null               $is_manual  Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was
     *                                            added automatically by the server.
     * @param AbstractRichText[]|null $rich_texts Optional. Rich text of the quote if it was chosen from a rich message. May contain
     *                                            only plain text, RichTextBold, RichTextItalic, RichTextUnderline, RichTextStrikethrough, RichTextSpoiler, RichTextSubscript,
     *                                            RichTextSuperscript, RichTextDateTime, RichTextCustomEmoji, RichTextMathematicalExpression, and arrays of them.
     *
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#richtext RichText
     * @see https://core.telegram.org/bots/api#richmessage rich message
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
        protected string $text,
        protected int $position,
        #[ArrayType(MessageEntity::class)]
        protected ?array $entities = null,
        protected ?bool $is_manual = null,
        #[ArrayType(AbstractRichText::class)]
        protected ?array $rich_texts = null,
    ) {}

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return TextQuote
     */
    public function setText(string $text): TextQuote
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     *
     * @return TextQuote
     */
    public function setPosition(int $position): TextQuote
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     *
     * @return TextQuote
     */
    public function setEntities(?array $entities): TextQuote
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsManual(): ?bool
    {
        return $this->is_manual;
    }

    /**
     * @param bool|null $is_manual
     *
     * @return TextQuote
     */
    public function setIsManual(?bool $is_manual): TextQuote
    {
        $this->is_manual = $is_manual;

        return $this;
    }

    /**
     * @return AbstractRichText[]|null
     */
    public function getRichTexts(): ?array
    {
        return $this->rich_texts;
    }

    /**
     * @param AbstractRichText[]|null $rich_texts
     *
     * @return TextQuote
     */
    public function setRichTexts(?array $rich_texts): TextQuote
    {
        $this->rich_texts = $rich_texts;

        return $this;
    }
}
// endregion CLASS_TextQuote
