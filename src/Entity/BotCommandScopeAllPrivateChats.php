<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Builder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use stdClass;

/**
 *
 * Represents the scope of bot commands, covering all protected chats.
 * @link https://core.telegram.org/bots/api#botcommandscopeallprotectedchats
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
            'type' => $this->type->value,
        ];
    }
}
