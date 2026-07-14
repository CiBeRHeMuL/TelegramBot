<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A divider, corresponding to the HTML tag <hr/>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockdivider
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockDivider, Telegram, Bot API, DTO, Input Rich Block Divider
// STRUCTURE: ▶ ┌type┐ → ∑ InputRichBlockDivider
// region CLASS_InputRichBlockDivider
/**
 * A divider, corresponding to the HTML tag <hr/>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdivider
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Divider->value))]
final class InputRichBlockDivider extends AbstractInputRichBlock
{
    public function __construct(
    ) {
        parent::__construct(RichBlockTypeEnum::Divider);
    }
}

// endregion CLASS_InputRichBlockDivider
