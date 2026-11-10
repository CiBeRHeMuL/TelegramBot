<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

// region CLASS_BotCommandScopeAllGroupChats
/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @see https://core.telegram.org/bots/api#botcommandscopeallgroupchats
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllGroupChats))]
final class BotCommandScopeAllGroupChats extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllGroupChats);
    }
}
// endregion CLASS_BotCommandScopeAllGroupChats
