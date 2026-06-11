<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the scope of bot commands, covering a specific chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_command_scope_chat
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotCommandScopeChat, Telegram, Bot API, DTO, bot_command_scope_chat
// STRUCTURE: ▶ ┌chat_id┐ → ∑ BotCommandScopeChat
// region CLASS_BotCommandScopeChat

/**
 * Represents the scope of bot commands, covering a specific chat.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @see https://core.telegram.org/bots/api#botcommandscopechat
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::Chat))]
final class BotCommandScopeChat extends AbstractBotCommandScope
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup in the format \@username.
     *                        Channel direct messages chats and channel chats aren't supported.
     */
    public function __construct(
        protected ChatId $chat_id,
    ) {
        parent::__construct(BotCommandScopeTypeEnum::Chat);
    }

    /**
     * @return ChatId
     */
    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    /**
     * @param ChatId $chat_id
     *
     * @return BotCommandScopeChat
     */
    public function setChatId(ChatId $chat_id): BotCommandScopeChat
    {
        $this->chat_id = $chat_id;

        return $this;
    }
}
// endregion CLASS_BotCommandScopeChat
