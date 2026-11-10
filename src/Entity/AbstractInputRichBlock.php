<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_AbstractInputRichBlock
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
