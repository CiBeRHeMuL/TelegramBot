<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

// region CLASS_AbstractBotCommandScope
/**
 * This object represents the scope to which bot commands are applied.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope
 */
#[AvailableInheritors([
    BotCommandScopeDefault::class,
    BotCommandScopeAllPrivateChats::class,
    BotCommandScopeAllGroupChats::class,
    BotCommandScopeAllChatAdministrators::class,
    BotCommandScopeChat::class,
    BotCommandScopeChatAdministrators::class,
    BotCommandScopeChatMember::class,
])]
abstract class AbstractBotCommandScope implements EntityInterface
{
    public function __construct(
        protected readonly BotCommandScopeTypeEnum $type,
    ) {}

    public function getType(): BotCommandScopeTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractBotCommandScope
