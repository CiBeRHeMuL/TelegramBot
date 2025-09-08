<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\Serializer\Serializer;
use AndrewGos\Serializer\SerializerFactory;
use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\TelegramBot\Entity\EntityInterface;
use AndrewGos\TelegramBot\Filesystem\Filesystem;
use AndrewGos\TelegramBot\Http\Client\HttpClient;
use AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactory;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use AndrewGos\TelegramBot\Kernel\UpdateHandler;
use AndrewGos\TelegramBot\Kernel\UpdateSource\GetUpdatesUpdateSource;
use AndrewGos\TelegramBot\Kernel\UpdateSource\PhpInputUpdateSource;
use AndrewGos\TelegramBot\Request\RequestInterface;
use AndrewGos\TelegramBot\Serializer\Normalizer\EntityNormalizer;
use AndrewGos\TelegramBot\Serializer\Normalizer\RequestNormalizer;
use AndrewGos\TelegramBot\ValueObject as VO;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use BackedEnum;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\NullLogger;
use UnitEnum;

class TelegramFactory
{
    /**
     * Create telegram instance with default webhook client (client with PhpInputUpdateSource)
     *
     * @param BotToken $token
     * @param bool $throwOnErrorResponse Will the api throw an exception if the request does not return 2xx response
     * @param EventDispatcherInterface|null $eventDispatcher
     *
     * @return Telegram
     * @see PhpInputUpdateSource
     */
    public static function getDefaultTelegram(
        BotToken $token,
        bool $throwOnErrorResponse = false,
        EventDispatcherInterface|null $eventDispatcher = null,
    ): Telegram {
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
            self::getDefaultApiSerializer(),
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
     *
     * @return Telegram
     * @see GetUpdatesUpdateSource
     */
    public static function getGetUpdatesTelegram(
        BotToken $token,
        bool $throwOnErrorResponse = false,
        EventDispatcherInterface|null $eventDispatcher = null,
    ): Telegram {
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
            self::getDefaultApiSerializer(),
        );
        return new Telegram(
            $token,
            $api,
            new UpdateHandler(
                new GetUpdatesUpdateSource($api),
                $api,
                $logger,
                $eventDispatcher,
            ),
        );
    }

    private static function getDefaultApiSerializer(): Serializer
    {
        $serializer = SerializerFactory::getDefaultSerializer();
        $serializer->addNormalizers([
            VO\ChatId::class => fn(VO\ChatId $e) => $e->getId(),
            VO\Email::class => fn(VO\Email $e) => $e->getEmail(),
            VO\EncodedJson::class => fn(VO\EncodedJson $e) => $e->getJson(),
            VO\Filename::class => fn(VO\Filename $e) => new Stream(fopen($e->getFilename(), 'rb')),
            VO\IpV4::class => fn(VO\IpV4 $e) => $e->getAddress(),
            VO\IpV6::class => fn(VO\IpV6 $e) => $e->getAddress(),
            VO\Language::class => fn(VO\Language $e) => $e->getLanguage(),
            VO\Phone::class => fn(VO\Phone $e) => $e->getPhone(),
            VO\Url::class => fn(VO\Url $e) => $e->getUrl(),
            RequestInterface::class => (new RequestNormalizer($serializer))(...),
            EntityInterface::class => (new EntityNormalizer($serializer))(...),
            UnitEnum::class => fn(UnitEnum $e) => $e->name,
            BackedEnum::class => fn(BackedEnum $e) => $e->value,
            'object' => fn(object $e) => $serializer->normalize((array)$e),
        ]);
        return $serializer;
    }
}
