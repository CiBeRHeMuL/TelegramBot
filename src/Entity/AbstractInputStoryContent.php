<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputStoryContentTypeEnum;

/**
 * This object describes the content of a story to post.
 * @link https://core.telegram.org/bots/api#inputstorycontent
 */
#[AvailableInheritors([
    InputStoryContentPhoto::class,
    InputStoryContentVideo::class,
])]
abstract class AbstractInputStoryContent implements EntityInterface
{
    public function __construct(
        protected readonly InputStoryContentTypeEnum $type,
    ) {}

    public function getType(): InputStoryContentTypeEnum
    {
        return $this->type;
    }
}
