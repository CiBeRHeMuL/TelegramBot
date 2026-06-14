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
 * @purpose A mention of a Telegram user by their identifier.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtexttextmention
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextTextMention, Telegram, Bot API, DTO, Rich Text Text Mention
// STRUCTURE: ▶ ┌type,text,user┐ → ∑ RichTextTextMention
// region CLASS_RichTextTextMention
/**
 * A mention of a Telegram user by their identifier.
 *
 * @see https://core.telegram.org/bots/api#richtexttextmention
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::TextMention->value))]
final class RichTextTextMention extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text The text
     * @param User                          $user The mentioned user
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected User $user,
    ) {
        parent::__construct(RichTextTypeEnum::TextMention);
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
     * @return RichTextTextMention
     */
    public function setText(AbstractRichText|string|array $text): RichTextTextMention
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return RichTextTextMention
     */
    public function setUser(User $user): RichTextTextMention
    {
        $this->user = $user;

        return $this;
    }
}

// endregion CLASS_RichTextTextMention
