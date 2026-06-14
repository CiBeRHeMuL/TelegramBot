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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockdivider
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockDivider, Telegram, Bot API, DTO, Rich Block Divider
// STRUCTURE: ▶ ┌type┐ → ∑ RichBlockDivider
// region CLASS_RichBlockDivider
/**
 * A divider, corresponding to the HTML tag <hr/>.
 *
 * @see https://core.telegram.org/bots/api#richblockdivider
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Divider->value))]
final class RichBlockDivider extends AbstractRichBlock
{
    public function __construct(
    ) {
        parent::__construct(RichBlockTypeEnum::Divider);
    }
}

// endregion CLASS_RichBlockDivider
