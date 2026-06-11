<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a sticker to be sent.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputmediasticker
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputMediaSticker, Telegram, Bot API, DTO, inputmediasticker
// STRUCTURE: ▶ ┌media(FileUrlStr)┐ → ◇ caption,parse_mode → ∑ InputMediaSticker
// region CLASS_InputMediaSticker

/**
 * Represents a sticker file to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediasticker
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Sticker->value))]
final class InputMediaSticker extends AbstractInputMedia implements InputPollOptionMediaInterface
{
    /**
     * @param Filename|Url|string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     *                                   pass an HTTP URL for Telegram to get a .WEBP sticker from the Internet, or pass “attach://<file_attach_name>” to upload
     *                                   a new .WEBP, .TGS, or .WEBM sticker using multipart/form-data under <file_attach_name> name. More information on Sending Files
     *                                   »
     * @param string|null         $emoji Optional. Emoji associated with the sticker; only for just uploaded stickers
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected ?string $emoji = null,
    ) {
        parent::__construct(
            InputMediaTypeEnum::Sticker,
        );
    }

    /**
     * @return Filename|Url|string
     */
    public function getMedia(): Filename|Url|string
    {
        return $this->media;
    }

    /**
     * @param Filename|Url|string $media
     *
     * @return InputMediaSticker
     */
    public function setMedia(Filename|Url|string $media): InputMediaSticker
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * @param string|null $emoji
     *
     * @return InputMediaSticker
     */
    public function setEmoji(?string $emoji): InputMediaSticker
    {
        $this->emoji = $emoji;

        return $this;
    }
}

// endregion CLASS_InputMediaSticker
