<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use stdClass;

/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 * @link https://core.telegram.org/bots/api#botcommandscopeallgroupchats
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllGroupChats))]
class BotCommandScopeAllGroupChats extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllGroupChats);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type,
        ];
    }
}
