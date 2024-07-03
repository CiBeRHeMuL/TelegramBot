<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use stdClass;

/**
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 * @link https://core.telegram.org/bots/api#botcommandscopechatmemvre
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::ChatMember))]
class BotCommandScopeChatMember extends AbstractBotCommandScope
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $user_id Unique identifier of the target user
     */
    public function __construct(
        protected ChatId $chat_id,
        protected int $user_id,
    ) {
        parent::__construct(BotCommandScopeTypeEnum::ChatMember);
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): BotCommandScopeChatMember
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): BotCommandScopeChatMember
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'chat_id' => $this->chat_id->getId(),
        ];
    }
}
