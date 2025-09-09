<?php

namespace AndrewGos\TelegramBot\Tests\Factory\Entity;

use AndrewGos\TelegramBot\Entity as Ent;
use AndrewGos\TelegramBot\Enum as Enums;

class EntityFactory
{
    public static function createUser1(): Ent\User
    {
        return new Ent\User(
            id: 123456789,
            is_bot: false,
            first_name: 'John',
            last_name: 'Doe',
        );
    }

    public static function createChat1(): Ent\Chat
    {
        return new Ent\Chat(
            id: 1,
            type: Enums\ChatTypeEnum::Private,
        );
    }

    public static function createMessage(?string $text = null): Ent\Message
    {
        return new Ent\Message(
            message_id: 1,
            date: time(),
            chat: self::createChat1(),
            from: self::createUser1(),
            text: $text ?? 'Hello, world!',
        );
    }

    public static function createMessageUpdate(?string $text = null): Ent\Update
    {
        return new Ent\Update(
            update_id: 1,
            message: self::createMessage($text),
        );
    }

    public static function createCallbackQuery(): Ent\CallbackQuery
    {
        return new Ent\CallbackQuery(
            id: '1',
            from: self::createUser1(),
            chat_instance: '1',
        );
    }

    public static function createCallbackQueryUpdate(): Ent\Update
    {
        return new Ent\Update(
            update_id: 2,
            callback_query: self::createCallbackQuery(),
        );
    }
}
