<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;

/**
 * The reaction is paid.
 *
 * @link https://core.telegram.org/bots/api#reactiontypepaid
 */
#[BuildIf(new FieldIsChecker('type', ReactionTypeEnum::Paid->value))]
final class ReactionTypePaid extends AbstractReactionType
{
    public function __construct()
    {
        parent::__construct(ReactionTypeEnum::Paid);
    }
}
