<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_AbstractRichBlock
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
    RichBlockButtons::class,
    RichBlockExpandableBlockQuotation::class,
    RichBlockDocument::class,
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
