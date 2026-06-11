<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Serializer\Normalizer;

use AndrewGos\Serializer\SerializerInterface;
use stdClass;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(8): Serializer; TECH(9): Normalization]
/**
 * @moduleContract
 * @purpose Normalize Telegram entity objects to arrays by recursively serializing their public properties via a bound closure.
 *
 * @sees USES_API(8): AndrewGos\Serializer\SerializerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TelegramNormalizer, normalizer, serializer, entity, object to array
// STRUCTURE: ┌object┐ → ○ get_object_vars → ○ array_walk normalize each var → ⊕ array|\stdClass

// region CLASS_TelegramNormalizer
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
// endregion CLASS_TelegramNormalizer
