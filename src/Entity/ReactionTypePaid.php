<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;

// region CLASS_ReactionTypePaid
/**
 * The reaction is paid.
 *
 * @see https://core.telegram.org/bots/api#reactiontypepaid
 */
#[BuildIf(new FieldIsChecker('type', ReactionTypeEnum::Paid->value))]
final class ReactionTypePaid extends AbstractReactionType
{
    public function __construct()
    {
        parent::__construct(ReactionTypeEnum::Paid);
    }
}

// endregion CLASS_ReactionTypePaid
