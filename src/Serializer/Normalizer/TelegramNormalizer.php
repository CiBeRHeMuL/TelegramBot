<?php

namespace AndrewGos\TelegramBot\Serializer\Normalizer;

use AndrewGos\Serializer\SerializerInterface;
use stdClass;

final readonly class TelegramNormalizer
{
    public function __construct(
        private SerializerInterface $serializer,
    ) {}

    public function __invoke(object $obj): array|stdClass
    {
        $valueSerializer = function (mixed &$v) {
            $v = $this->serializer->normalize($v);
        };
        $serializer = function () use (&$valueSerializer): array|stdClass {
            $vars = get_object_vars($this);
            if (empty($vars)) {
                return new stdClass();
            }
            array_walk($vars, $valueSerializer);
            return $vars;
        };
        $serializer = $serializer->bindTo($obj, $obj);
        return $serializer();
    }
}
