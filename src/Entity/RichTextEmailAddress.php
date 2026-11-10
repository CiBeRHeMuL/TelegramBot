<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Email;

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
