<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents a block in a rich formatted message used as input.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblock
 *
 * @changes LAST_CHANGE: Updated for Bot API 10.3 - added InputRichBlockButtons, InputRichBlockExpandableBlockQuotation, InputRichBlockDocument
 *
 * @modulemap
 * CLASS 5[InputRichBlock types] => AbstractInputRichBlock
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractInputRichBlock, Telegram Bot API, abstract, InputRichBlock, DTO
// STRUCTURE: ▶ ┌type: RichBlockTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractInputRichBlock [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object represents a block in a rich formatted message used as input.
 *
 * @see https://core.telegram.org/bots/api#richblock
 */
#[AvailableInheritors([
    InputRichBlockParagraph::class,
    InputRichBlockSectionHeading::class,
    InputRichBlockPreformatted::class,
    InputRichBlockFooter::class,
    InputRichBlockDivider::class,
    InputRichBlockMathematicalExpression::class,
    InputRichBlockAnchor::class,
    InputRichBlockList::class,
    InputRichBlockBlockQuotation::class,
    InputRichBlockPullQuotation::class,
    InputRichBlockCollage::class,
    InputRichBlockSlideshow::class,
    InputRichBlockTable::class,
    InputRichBlockDetails::class,
    InputRichBlockMap::class,
    InputRichBlockAnimation::class,
    InputRichBlockAudio::class,
    InputRichBlockPhoto::class,
    InputRichBlockVideo::class,
    InputRichBlockVoiceNote::class,
    InputRichBlockThinking::class,
    InputRichBlockButtons::class,
    InputRichBlockExpandableBlockQuotation::class,
    InputRichBlockDocument::class,
])]
abstract class AbstractInputRichBlock implements EntityInterface
{
    public function __construct(
        protected readonly RichBlockTypeEnum $type,
    ) {}

    public function getType(): RichBlockTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractInputRichBlock
