<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\TelegramBot\Filesystem\Filesystem;
use AndrewGos\TelegramBot\Http\Client\HttpClient;
use AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactory;
use AndrewGos\TelegramBot\UpdateHandler\UpdateHandler;
use AndrewGos\TelegramBot\UpdateHandler\UpdateSource\GetUpdatesUpdateSource;
use AndrewGos\TelegramBot\UpdateHandler\UpdateSource\PhpInputUpdateSource;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\Log\NullLogger;

class TelegramFactory
{
    /**
     * Create telegram instance with default webhook client (client with PhpInputUpdateSource)
     *
     * @param BotToken $token
     * @param bool $throwOnErrorResponse Will the api throw an exception if the request does not return 2xx response
     *
     * @return Telegram
     * @see PhpInputUpdateSource
     */
    public static function getDefaultTelegram(BotToken $token, bool $throwOnErrorResponse = false): Telegram
    {
        $logger = new NullLogger();
        $classBuilder = new ClassBuilder();
        $api = new Api(
            $token,
            $classBuilder,
            new TelegramRequestFactory(),
            new HttpClient(),
            $logger,
            new Filesystem(),
            $throwOnErrorResponse,
        );
        return new Telegram(
            $token,
            $api,
            new UpdateHandler(new PhpInputUpdateSource($classBuilder), $api, $logger),
        );
    }

    /**
     * Create telegram instance with listening client (client with GetUpdatesUpdateSource)
     *
     * @param BotToken $token
     * @param bool $throwOnErrorResponse Will the api throw an exception if the request does not return 2xx response
     *
     * @return Telegram
     * @see GetUpdatesUpdateSource
     */
    public static function getGetUpdatesTelegram(BotToken $token, bool $throwOnErrorResponse = false): Telegram
    {
        $logger = new NullLogger();
        $classBuilder = new ClassBuilder();
        $api = new Api(
            $token,
            $classBuilder,
            new TelegramRequestFactory(),
            new HttpClient(),
            $logger,
            new Filesystem(),
            $throwOnErrorResponse,
        );
        return new Telegram(
            $token,
            $api,
            new UpdateHandler(new GetUpdatesUpdateSource($api), $api, $logger),
        );
    }
}
