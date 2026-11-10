<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputStoryContentTypeEnum;

// region CLASS_AbstractInputStoryContent
/**
 * This object describes the content of a story to post.
 *
 * @see https://core.telegram.org/bots/api#inputstorycontent
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
// endregion CLASS_AbstractInputStoryContent
