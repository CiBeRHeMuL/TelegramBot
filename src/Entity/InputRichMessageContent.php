<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;

// region CLASS_InputRichMessageContent
/**
 * Represents the content of a rich message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagecontent
 */
#[BuildIf(new FieldCompareChecker('rich_message', null, CompareOperatorEnum::StrictNotEqual))]
final class InputRichMessageContent extends AbstractInputMessageContent
{
    /**
     * @param InputRichMessage $rich_message The message to be sent
     *
     * @see https://core.telegram.org/bots/api#inputrichmessage InputRichMessage
     */
    public function __construct(
        protected InputRichMessage $rich_message,
    ) {}

    /**
     * @return InputRichMessage
     */
    public function getRichMessage(): InputRichMessage
    {
        return $this->rich_message;
    }

    /**
     * @param InputRichMessage $rich_message
     *
     * @return InputRichMessageContent
     */
    public function setRichMessage(InputRichMessage $rich_message): InputRichMessageContent
    {
        $this->rich_message = $rich_message;

        return $this;
    }
}

// endregion CLASS_InputRichMessageContent
