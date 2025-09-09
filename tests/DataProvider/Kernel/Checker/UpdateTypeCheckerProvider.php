<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\Kernel\Checker;

use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\Tests\Factory\Entity\EntityFactory;

class UpdateTypeCheckerProvider
{
    public static function checkProvider(): array
    {
        $factory = new EntityFactory();

        return [
            'message' => [
                $factory->createMessageUpdate(),
                UpdateTypeEnum::Message,
                true,
            ],
            'callback_query' => [
                $factory->createCallbackQueryUpdate(),
                UpdateTypeEnum::CallbackQuery,
                true,
            ],
            'message_vs_callback' => [
                $factory->createMessageUpdate(),
                UpdateTypeEnum::CallbackQuery,
                false,
            ],
            'callback_vs_message' => [
                $factory->createCallbackQueryUpdate(),
                UpdateTypeEnum::Message,
                false,
            ],
        ];
    }
}
