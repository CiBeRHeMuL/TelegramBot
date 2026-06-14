<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose An anchor.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextanchor
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextAnchor, Telegram, Bot API, DTO, Rich Text Anchor
// STRUCTURE: ▶ ┌type,name┐ → ∑ RichTextAnchor
// region CLASS_RichTextAnchor
/**
 * An anchor.
 *
 * @see https://core.telegram.org/bots/api#richtextanchor
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Anchor->value))]
final class RichTextAnchor extends AbstractRichText
{
    /**
     * @param string $name The name of the anchor
     */
    public function __construct(
        protected string $name,
    ) {
        parent::__construct(RichTextTypeEnum::Anchor);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return RichTextAnchor
     */
    public function setName(string $name): RichTextAnchor
    {
        $this->name = $name;

        return $this;
    }
}

// endregion CLASS_RichTextAnchor
