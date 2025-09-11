<?php

namespace AndrewGos\TelegramBot\Serializer;

use AndrewGos\Serializer\Serializer;
use AndrewGos\Serializer\SerializerFactory as BaseSerializerFactory;
use AndrewGos\TelegramBot\Entity\EntityInterface;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use AndrewGos\TelegramBot\Request\RequestInterface;
use AndrewGos\TelegramBot\Serializer\Normalizer\EntityNormalizer;
use AndrewGos\TelegramBot\Serializer\Normalizer\RequestNormalizer;
use AndrewGos\TelegramBot\ValueObject as VO;
use BackedEnum;
use UnitEnum;

class SerializerFactory
{
    public static function getDefaultApiSerializer(): Serializer
    {
        $serializer = BaseSerializerFactory::getDefaultSerializer();
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
            'object' => fn(object $e) => $serializer->normalize((array) $e),
        ]);
        return $serializer;
    }
}
