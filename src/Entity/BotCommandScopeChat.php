<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * Represents the scope of bot commands, covering a specific chat.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @link https://core.telegram.org/bots/api#botcommandscopechat
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::Chat))]
final class BotCommandScopeChat extends AbstractBotCommandScope
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername).
     * Channel direct messages chats and channel chats aren't supported.
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
