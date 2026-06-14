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
 * @purpose A text with a bank card number.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextbankcardnumber
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextBankCardNumber, Telegram, Bot API, DTO, Rich Text Bank Card Number
// STRUCTURE: ▶ ┌type,text,bank_card_number┐ → ∑ RichTextBankCardNumber
// region CLASS_RichTextBankCardNumber
/**
 * A text with a bank card number.
 *
 * @see https://core.telegram.org/bots/api#richtextbankcardnumber
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::BankCardNumber->value))]
final class RichTextBankCardNumber extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text             The text
     * @param string                        $bank_card_number The bank card number
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected string $bank_card_number,
    ) {
        parent::__construct(RichTextTypeEnum::BankCardNumber);
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
     * @return RichTextBankCardNumber
     */
    public function setText(AbstractRichText|string|array $text): RichTextBankCardNumber
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankCardNumber(): string
    {
        return $this->bank_card_number;
    }

    /**
     * @param string $bank_card_number
     *
     * @return RichTextBankCardNumber
     */
    public function setBankCardNumber(string $bank_card_number): RichTextBankCardNumber
    {
        $this->bank_card_number = $bank_card_number;

        return $this;
    }
}

// endregion CLASS_RichTextBankCardNumber
