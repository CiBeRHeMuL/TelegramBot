<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\TelegramBot\Filesystem\Filesystem;
use AndrewGos\TelegramBot\Http\Client\HttpClient;
use AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactory;
use AndrewGos\TelegramBot\Kernel\UpdateHandler;
use AndrewGos\TelegramBot\Kernel\UpdateSource\GetUpdatesUpdateSource;
use AndrewGos\TelegramBot\Kernel\UpdateSource\PhpInputUpdateSource;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class TelegramFactory
{
    /**
     * Create telegram instance with default webhook client (client with PhpInputUpdateSource)
     *
     * @param BotToken $token
     * @param bool $throwOnErrorResponse Will the api throw an exception if the request does not return 2xx response
     * @param EventDispatcherInterface|null $eventDispatcher
     * @param LoggerInterface $logger
     *
     * @return Telegram
     * @see PhpInputUpdateSource
     */
    public static function getDefaultTelegram(
        BotToken $token,
        bool $throwOnErrorResponse = false,
        ?EventDispatcherInterface $eventDispatcher = null,
        LoggerInterface $logger = new NullLogger(),
    ): Telegram {
        $classBuilder = new ClassBuilder();
        $api = new Api(
            $token,
            $classBuilder,
            new TelegramRequestFactory(),
            new HttpClient(),
            $logger,
            new Filesystem(),
            $throwOnErrorResponse,
            SerializerFactory::getDefaultApiSerializer(),
        );
        return new Telegram(
            $token,
            $api,
            new UpdateHandler(
                new PhpInputUpdateSource($classBuilder),
                $api,
                $logger,
                $eventDispatcher,
            ),
        );
    }

    /**
     * Create telegram instance with listening client (client with GetUpdatesUpdateSource)
     *
     * @param BotToken $token
     * @param bool $throwOnErrorResponse Will the api throw an exception if the request does not return 2xx response
     * @param EventDispatcherInterface|null $eventDispatcher
     * @param LoggerInterface $logger
     * @param int|null $limit limit for getUpdates API method (count of updates getting in one time)
     * @param int|null $timeout timeout for getUpdates API method
     *
     * @return Telegram
     * @see GetUpdatesUpdateSource
     */
    public static function getGetUpdatesTelegram(
        BotToken $token,
        bool $throwOnErrorResponse = false,
        ?EventDispatcherInterface $eventDispatcher = null,
        LoggerInterface $logger = new NullLogger(),
        ?int $limit = null,
        ?int $timeout = null,
    ): Telegram {
        $classBuilder = new ClassBuilder();
        $api = new Api(
            $token,
            $classBuilder,
            new TelegramRequestFactory(),
            new HttpClient(),
            $logger,
            new Filesystem(),
            $throwOnErrorResponse,
            SerializerFactory::getDefaultApiSerializer(),
        );
        return new Telegram(
            $token,
            $api,
            new UpdateHandler(
                new GetUpdatesUpdateSource(
                    $api,
                    $limit,
                    $timeout,
                ),
                $api,
                $logger,
                $eventDispatcher,
            ),
        );
    }
}
