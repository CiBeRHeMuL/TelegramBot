<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block with an anchor, corresponding to the HTML tag <a> with the attribute name.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockanchor
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockAnchor, Telegram, Bot API, DTO, Input Rich Block Anchor
// STRUCTURE: ▶ ┌type,name┐ → ∑ InputRichBlockAnchor
// region CLASS_InputRichBlockAnchor
/**
 * A block with an anchor, corresponding to the HTML tag <a> with the attribute name.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockanchor
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Anchor->value))]
final class InputRichBlockAnchor extends AbstractInputRichBlock
{
    /**
     * @param string $name The name of the anchor
     */
    public function __construct(
        protected string $name,
    ) {
        parent::__construct(RichBlockTypeEnum::Anchor);
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
     * @return InputRichBlockAnchor
     */
    public function setName(string $name): InputRichBlockAnchor
    {
        $this->name = $name;

        return $this;
    }
}

// endregion CLASS_InputRichBlockAnchor
