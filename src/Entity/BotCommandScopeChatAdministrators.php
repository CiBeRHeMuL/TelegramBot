<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use stdClass;

/**
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @link https://core.telegram.org/bots/api#botcommandscopechatadministrators
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::ChatAdministrators))]
final class BotCommandScopeChatAdministrators extends AbstractBotCommandScope
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername).
     * Channel direct messages chats and channel chats aren't supported.
     */
    public function __construct(
        protected ChatId $chat_id,
    ) {
        parent::__construct(BotCommandScopeTypeEnum::ChatAdministrators);
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
     * @return BotCommandScopeChatAdministrators
     */
    public function setChatId(ChatId $chat_id): BotCommandScopeChatAdministrators
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'type' => $this->type->value,
        ];
    }
}
