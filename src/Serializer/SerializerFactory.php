<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Serializer;

use AndrewGos\Serializer\Serializer;
use AndrewGos\Serializer\SerializerFactory as BaseSerializerFactory;
use AndrewGos\TelegramBot\Entity\EntityInterface;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use AndrewGos\TelegramBot\Request\RequestInterface;
use AndrewGos\TelegramBot\Response\RawResponse;
use AndrewGos\TelegramBot\Response\ResponseInterface;
use AndrewGos\TelegramBot\Serializer\Normalizer\TelegramNormalizer;
use AndrewGos\TelegramBot\ValueObject as VO;
use BackedEnum;
use UnitEnum;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(8): Serializer; TECH(8): Normalization]
/**
 * @moduleContract
 * @purpose Create a pre-configured serializer for the Telegram Bot API with support for value objects, entities, enums, and requests.
 *
 * @sees USES_API(8): AndrewGos\Serializer\Serializer, TelegramNormalizer
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SerializerFactory, serializer, normalization, Telegram, value objects
// STRUCTURE: ┌BaseSerializer┐ → ○ addNormalizers (VO callables, TelegramNormalizer, Enum, object) → ⊕ configured Serializer

// region CLASS_SerializerFactory
class SerializerFactory
{
    public static function getDefaultApiSerializer(): Serializer
    {
        $serializer = BaseSerializerFactory::getDefaultSerializer();
        $serializer->addNormalizers([
            VO\BotToken::class => fn(VO\BotToken $e) => $e->getToken(),
            VO\CallbackData::class => fn(VO\CallbackData $e) => $e->getData(),
            VO\ChatId::class => fn(VO\ChatId $e) => $e->getId(),
            VO\Email::class => fn(VO\Email $e) => $e->getEmail(),
            VO\EncodedJson::class => fn(VO\EncodedJson $e) => $e->getJson(),
            VO\Filename::class => fn(VO\Filename $e) => new Stream(fopen($e->getFilename(), 'rb')),
            VO\IpV4::class => fn(VO\IpV4 $e) => $e->getAddress(),
            VO\IpV6::class => fn(VO\IpV6 $e) => $e->getAddress(),
            VO\Language::class => fn(VO\Language $e) => $e->getLanguage(),
            VO\Phone::class => fn(VO\Phone $e) => $e->getPhone(),
            VO\Url::class => fn(VO\Url $e) => $e->getUrl(),
            EntityInterface::class => (new TelegramNormalizer($serializer))(...),
            ResponseInterface::class => (new TelegramNormalizer($serializer))(...),
            RawResponse::class => (new TelegramNormalizer($serializer))(...),
            RequestInterface::class => (new TelegramNormalizer($serializer))(...),
            UnitEnum::class => fn(UnitEnum $e) => $e->name,
            BackedEnum::class => fn(BackedEnum $e) => $e->value,
            'object' => fn(object $e) => $serializer->normalize((array) $e),
        ]);

        return $serializer;
    }
}
// endregion CLASS_SerializerFactory
