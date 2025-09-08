<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider;

use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\MessageEntityTypeEnum;
use AndrewGos\TelegramBot\Request\SendMessageRequest;
use AndrewGos\TelegramBot\Response\SendMessageResponse;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Url;

class ApiDataProvider
{
    public static function generate(): array
    {
        $chatId = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_CHAT_ID');
        $chatId = ctype_digit($chatId) ? (int) $chatId : $chatId;
        return [
            [
                'token' => new BotToken(getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN')),
                'method' => 'sendMessage',
                'responseClass' => SendMessageResponse::class,
                'request' => new SendMessageRequest(
                    new ChatId($chatId),
                    'Hello World!',
                    entities: [
                        new MessageEntity(MessageEntityTypeEnum::Bold, 0, 1),
                        new MessageEntity(MessageEntityTypeEnum::Italic, 0, 5),
                        new MessageEntity(
                            MessageEntityTypeEnum::TextLink,
                            6,
                            5,
                            url: new Url('https://google.com'),
                        ),
                    ],
                ),
            ],
        ];
    }

    public static function generateFile(): array
    {
        $chatId = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_CHAT_ID');
        $chatId = ctype_digit($chatId) ? (int) $chatId : $chatId;
        return [
            [
                'token' => new BotToken(getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN')),
                'file' => '../files/.gitignore',
                'chatId' => new ChatId($chatId),
            ],
        ];
    }
}
