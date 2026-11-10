<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

// region CLASS_BotCommandScopeAllPrivateChats
/**
 * Represents the scope of bot commands, covering all private chats.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @see https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllPrivateChats))]
final class BotCommandScopeAllPrivateChats extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllPrivateChats);
    }
}
// endregion CLASS_BotCommandScopeAllPrivateChats
