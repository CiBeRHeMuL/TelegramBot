<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use stdClass;

/**
 *
 * Represents the scope of bot commands, covering all private chats.
 * @link https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllPrivateChats))]
class BotCommandScopeAllPrivateChats extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllPrivateChats);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type,
        ];
    }
}
