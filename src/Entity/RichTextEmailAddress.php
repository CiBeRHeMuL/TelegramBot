<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Email;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A text with an email address.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextemailaddress
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextEmailAddress, Telegram, Bot API, DTO, Rich Text Email Address
// STRUCTURE: ▶ ┌type,text,email_address┐ → ∑ RichTextEmailAddress
// region CLASS_RichTextEmailAddress
/**
 * A text with an email address.
 *
 * @see https://core.telegram.org/bots/api#richtextemailaddress
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::EmailAddress->value))]
final class RichTextEmailAddress extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text          The text
     * @param Email                         $email_address The email address
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected Email $email_address,
    ) {
        parent::__construct(RichTextTypeEnum::EmailAddress);
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
     * @return RichTextEmailAddress
     */
    public function setText(AbstractRichText|string|array $text): RichTextEmailAddress
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Email
     */
    public function getEmailAddress(): Email
    {
        return $this->email_address;
    }

    /**
     * @param Email $email_address
     *
     * @return RichTextEmailAddress
     */
    public function setEmailAddress(Email $email_address): RichTextEmailAddress
    {
        $this->email_address = $email_address;

        return $this;
    }
}

// endregion CLASS_RichTextEmailAddress
