<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use stdClass;

/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @link https://core.telegram.org/bots/api#botcommandscopeallgroupchats
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllGroupChats))]
final class BotCommandScopeAllGroupChats extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllGroupChats);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
