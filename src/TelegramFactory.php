<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\TelegramBot\Builder\ClassBuilder;
use AndrewGos\TelegramBot\Client\Client;
use AndrewGos\TelegramBot\Client\UpdateSource\GetUpdatesUpdateSource;
use AndrewGos\TelegramBot\Client\UpdateSource\PhpInputUpdateSource;
use AndrewGos\TelegramBot\Http\Client\HttpClient;
use AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactory;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\Log\NullLogger;

class TelegramFactory
{
    /**
     * Create telegram instance with default webhook client (client with PhpInputUpdateSource)
     * @see PhpInputUpdateSource
     * @param BotToken $token
     *
     * @return Telegram
     */
    public static function getDefaultTelegram(BotToken $token): Telegram
    {
        $classBuilder = new ClassBuilder();
        $api = new Api(
            $token,
            $classBuilder,
            new TelegramRequestFactory(),
            new HttpClient(),
            new NullLogger(),
        );
        return new Telegram(
            $token,
            $api,
            new Client(new PhpInputUpdateSource($classBuilder), $api)
        );
    }

    /**
     * Create telegram instance with listening client (client with GetUpdatesUpdateSource)
     * @see GetUpdatesUpdateSource
     * @param BotToken $token
     *
     * @return Telegram
     */
    public static function getGetUpdatesTelegram(BotToken $token): Telegram
    {
        $classBuilder = new ClassBuilder();
        $api = new Api(
            $token,
            $classBuilder,
            new TelegramRequestFactory(),
            new HttpClient(),
            new NullLogger(),
        );
        return new Telegram(
            $token,
            $api,
            new Client(new GetUpdatesUpdateSource($api), $api)
        );
    }
}
