<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputStoryContentTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the content of a story to post.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputstorycontent
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Photo story content] => InputStoryContentPhoto
 * CLASS 5[Video story content] => InputStoryContentVideo
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractInputStoryContent, Telegram Bot API, abstract, input, story, content, DTO
// STRUCTURE: ▶ ┌type: InputStoryContentTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractInputStoryContent [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
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
