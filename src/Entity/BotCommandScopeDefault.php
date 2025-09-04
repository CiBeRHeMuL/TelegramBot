<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

/**
 * Represents the default scope of bot commands. Default commands are used if no commands with a narrower scope are specified
 * for the user.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @see https://core.telegram.org/bots/api#determining-list-of-commands narrower scope
 * @link https://core.telegram.org/bots/api#botcommandscopedefault
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::Default))]
final class BotCommandScopeDefault extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::Default);
    }
}
