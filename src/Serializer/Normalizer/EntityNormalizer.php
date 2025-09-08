<?php

namespace AndrewGos\TelegramBot\Serializer\Normalizer;

use AndrewGos\Serializer\SerializerInterface;
use AndrewGos\TelegramBot\Entity\EntityInterface;
use stdClass;

final readonly class EntityNormalizer
{
    public function __construct(
        private SerializerInterface $serializer,
    ) {}

    public function __invoke(EntityInterface $entity): array|stdClass
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
        $serializer = $serializer->bindTo($entity, $entity);
        return $serializer();
    }
}
