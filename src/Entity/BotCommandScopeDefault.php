<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use stdClass;

/**
 * Represents the default scope of bot commands. Default commands are used if no commands with a narrower scope are specified
 * for the user.
 * @link https://core.telegram.org/bots/api#botcommandscopedefault
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::Default))]
class BotCommandScopeDefault extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::Default);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
