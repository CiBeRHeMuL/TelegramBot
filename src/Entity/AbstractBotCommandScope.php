<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents the scope to which bot commands are applied.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#botcommandscope
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Default scope] => BotCommandScopeDefault
 * CLASS 5[All private chats scope] => BotCommandScopeAllPrivateChats
 * CLASS 5[All group chats scope] => BotCommandScopeAllGroupChats
 * CLASS 5[All chat administrators scope] => BotCommandScopeAllChatAdministrators
 * CLASS 5[Specific chat scope] => BotCommandScopeChat
 * CLASS 5[Chat administrators scope] => BotCommandScopeChatAdministrators
 * CLASS 5[Chat member scope] => BotCommandScopeChatMember
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractBotCommandScope, Telegram Bot API, abstract, bot, command, scope, DTO
// STRUCTURE: ▶ ┌type: BotCommandScopeTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractBotCommandScope [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
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
