<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;
use stdClass;

/**
 * The reaction is paid.
 *
 * @link https://core.telegram.org/bots/api#reactiontypepaid
 */
#[BuildIf(new FieldIsChecker('type', ReactionTypeEnum::Paid->value))]
class ReactionTypePaid extends AbstractReactionType
{
    public function __construct()
    {
        parent::__construct(ReactionTypeEnum::Paid);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
