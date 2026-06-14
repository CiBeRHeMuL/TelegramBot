<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents a block in a rich formatted message.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblock
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 *
 * @modulemap
 * CLASS 5[RichBlock types] => AbstractRichBlock
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractRichBlock, Telegram Bot API, abstract, RichBlock, DTO
// STRUCTURE: ▶ ┌type: RichBlockTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractRichBlock [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object represents a block in a rich formatted message.
 *
 * @see https://core.telegram.org/bots/api#richblock
 */
#[AvailableInheritors([
    RichBlockParagraph::class,
    RichBlockSectionHeading::class,
    RichBlockPreformatted::class,
    RichBlockFooter::class,
    RichBlockDivider::class,
    RichBlockMathematicalExpression::class,
    RichBlockAnchor::class,
    RichBlockList::class,
    RichBlockBlockQuotation::class,
    RichBlockPullQuotation::class,
    RichBlockCollage::class,
    RichBlockSlideshow::class,
    RichBlockTable::class,
    RichBlockDetails::class,
    RichBlockMap::class,
    RichBlockAnimation::class,
    RichBlockAudio::class,
    RichBlockPhoto::class,
    RichBlockVideo::class,
    RichBlockVoiceNote::class,
    RichBlockThinking::class,
])]
abstract class AbstractRichBlock implements EntityInterface
{
    public function __construct(
        protected readonly RichBlockTypeEnum $type,
    ) {}

    public function getType(): RichBlockTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractRichBlock
