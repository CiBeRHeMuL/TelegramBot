<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

// region CLASS_InputMediaLink
/**
 * Represents an HTTP link to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmedialink
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Link->value))]
final class InputMediaLink extends AbstractInputMedia implements InputPollOptionMediaInterface
{
    /**
     * @param Url $url HTTP URL of the link
     */
    public function __construct(
        protected Url $url,
    ) {
        parent::__construct(InputMediaTypeEnum::Link);
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return InputMediaLink
     */
    public function setUrl(Url $url): InputMediaLink
    {
        $this->url = $url;

        return $this;
    }
}

// endregion CLASS_InputMediaLink
