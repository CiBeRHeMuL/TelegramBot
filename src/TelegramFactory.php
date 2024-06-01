<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\TelegramBot\Builder\ClassBuilder;
use AndrewGos\TelegramBot\UpdateHandler\UpdateHandler;
use AndrewGos\TelegramBot\UpdateHandler\UpdateSource\GetUpdatesUpdateSource;
use AndrewGos\TelegramBot\UpdateHandler\UpdateSource\PhpInputUpdateSource;
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
        $logger = new NullLogger();
        $classBuilder = new ClassBuilder();
        $api = new Api(
            $token,
            $classBuilder,
            new TelegramRequestFactory(),
            new HttpClient(),
            $logger,
        );
        return new Telegram(
            $token,
            $api,
            new UpdateHandler(new PhpInputUpdateSource($classBuilder), $api, $logger),
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
        $logger = new NullLogger();
        $classBuilder = new ClassBuilder();
        $api = new Api(
            $token,
            $classBuilder,
            new TelegramRequestFactory(),
            new HttpClient(),
            $logger,
        );
        return new Telegram(
            $token,
            $api,
            new UpdateHandler(new GetUpdatesUpdateSource($api), $api, $logger),
        );
    }
}
