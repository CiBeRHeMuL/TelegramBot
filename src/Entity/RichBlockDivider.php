<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

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
