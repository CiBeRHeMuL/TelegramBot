<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @link https://core.telegram.org/bots/api#botcommandscopechatmember
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::ChatMember))]
final class BotCommandScopeChatMember extends AbstractBotCommandScope
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername).
     * Channel direct messages chats and channel chats aren't supported.
     * @param int $user_id Unique identifier of the target user
     */
    public function __construct(
        protected ChatId $chat_id,
        protected int $user_id,
    ) {
        parent::__construct(BotCommandScopeTypeEnum::ChatMember);
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
     * @return BotCommandScopeChatMember
     */
    public function setChatId(ChatId $chat_id): BotCommandScopeChatMember
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     *
     * @return BotCommandScopeChatMember
     */
    public function setUserId(int $user_id): BotCommandScopeChatMember
    {
        $this->user_id = $user_id;
        return $this;
    }
}
