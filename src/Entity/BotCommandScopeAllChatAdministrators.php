<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use stdClass;

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @link https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllChatAdministrators))]
final class BotCommandScopeAllChatAdministrators extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllChatAdministrators);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
