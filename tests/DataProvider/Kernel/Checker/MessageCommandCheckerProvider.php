<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\Kernel\Checker;

use AndrewGos\TelegramBot\Tests\Factory\Entity\EntityFactory;

class MessageCommandCheckerProvider
{
    public static function checkProvider(): array
    {
        $factory = new EntityFactory();

        return [
            'exact_command' => [
                $factory->createMessageUpdate('/start'),
                'start',
                true,
            ],
            'command_with_payload' => [
                $factory->createMessageUpdate('/start payload123'),
                'start',
                true,
            ],
            'different_command' => [
                $factory->createMessageUpdate('/help'),
                'start',
                false,
            ],
            'no_slash' => [
                $factory->createMessageUpdate('start'),
                'start',
                false,
            ],
            'slash_in_middle' => [
                $factory->createMessageUpdate('please /start'),
                'start',
                false,
            ],
            'not_a_message_update' => [
                $factory->createCallbackQueryUpdate(),
                'start',
                false,
            ],
            'empty_text' => [
                $factory->createMessageUpdate(''),
                'start',
                false,
            ],
        ];
    }
}
