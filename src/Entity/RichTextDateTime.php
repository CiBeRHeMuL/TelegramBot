<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Formatted date and time.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextdatetime
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextDateTime, Telegram, Bot API, DTO, Rich Text Date Time
// STRUCTURE: ▶ ┌type,text,unix_time,date_time_format┐ → ∑ RichTextDateTime
// region CLASS_RichTextDateTime
/**
 * Formatted date and time.
 *
 * @see https://core.telegram.org/bots/api#richtextdatetime
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::DateTime->value))]
final class RichTextDateTime extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text             The text
     * @param int                           $unix_time        The Unix time associated with the entity
     * @param string                        $date_time_format The string that defines the formatting of the date and time. See date-time entity formatting for more details.
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     * @see https://core.telegram.org/bots/api#date-time-entity-formatting date-time entity formatting
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected int $unix_time,
        protected string $date_time_format,
    ) {
        parent::__construct(RichTextTypeEnum::DateTime);
    }

    /**
     * @return AbstractRichText|string|array
     */
    public function getText(): AbstractRichText|string|array
    {
        return $this->text;
    }

    /**
     * @param AbstractRichText|string|array $text
     *
     * @return RichTextDateTime
     */
    public function setText(AbstractRichText|string|array $text): RichTextDateTime
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return int
     */
    public function getUnixTime(): int
    {
        return $this->unix_time;
    }

    /**
     * @param int $unix_time
     *
     * @return RichTextDateTime
     */
    public function setUnixTime(int $unix_time): RichTextDateTime
    {
        $this->unix_time = $unix_time;

        return $this;
    }

    /**
     * @return string
     */
    public function getDateTimeFormat(): string
    {
        return $this->date_time_format;
    }

    /**
     * @param string $date_time_format
     *
     * @return RichTextDateTime
     */
    public function setDateTimeFormat(string $date_time_format): RichTextDateTime
    {
        $this->date_time_format = $date_time_format;

        return $this;
    }
}

// endregion CLASS_RichTextDateTime
