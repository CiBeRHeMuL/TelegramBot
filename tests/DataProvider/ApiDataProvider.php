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
        return [
            [
                'token' => new BotToken('5925977458:AAEiTMSI_sgZT5MZp73T8p-EiB_eeHjd6ys'),
                'method' => 'sendMessage',
                'responseClass' => SendMessageResponse::class,
                'request' => new SendMessageRequest(
                    new ChatId(529534536),
                    'Hello World!',
                    entities: [
                        new MessageEntity(MessageEntityTypeEnum::Bold, 0, 1),
                        new MessageEntity(MessageEntityTypeEnum::Italic, 0, 5),
                        new MessageEntity(MessageEntityTypeEnum::TextLink, 6, 5, url: new Url('https://google.com')),
                    ],
                ),
            ],
        ];
    }

    public static function generateFile(): array
    {
        return [
            [
                'token' => new BotToken('5925977458:AAEiTMSI_sgZT5MZp73T8p-EiB_eeHjd6ys'),
                'file' => '../files/1.jpg',
                'chatId' => new ChatId(529534536),
            ]
        ];
    }
}
