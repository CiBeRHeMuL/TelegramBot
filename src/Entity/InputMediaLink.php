<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents an HTTP link to be sent.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputmedialink
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputMediaLink, Telegram, Bot API, DTO, Input Media Link
// STRUCTURE: ▶ ┌type,url┐ → ∑ InputMediaLink
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
