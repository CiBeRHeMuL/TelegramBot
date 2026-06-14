<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Phone;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A text with a phone number.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextphonenumber
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextPhoneNumber, Telegram, Bot API, DTO, Rich Text Phone Number
// STRUCTURE: ▶ ┌type,text,phone_number┐ → ∑ RichTextPhoneNumber
// region CLASS_RichTextPhoneNumber
/**
 * A text with a phone number.
 *
 * @see https://core.telegram.org/bots/api#richtextphonenumber
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::PhoneNumber->value))]
final class RichTextPhoneNumber extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text         The text
     * @param Phone                         $phone_number The phone number
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected Phone $phone_number,
    ) {
        parent::__construct(RichTextTypeEnum::PhoneNumber);
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
     * @return RichTextPhoneNumber
     */
    public function setText(AbstractRichText|string|array $text): RichTextPhoneNumber
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Phone
     */
    public function getPhoneNumber(): Phone
    {
        return $this->phone_number;
    }

    /**
     * @param Phone $phone_number
     *
     * @return RichTextPhoneNumber
     */
    public function setPhoneNumber(Phone $phone_number): RichTextPhoneNumber
    {
        $this->phone_number = $phone_number;

        return $this;
    }
}

// endregion CLASS_RichTextPhoneNumber
