<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;

/**
 * This object represents one result of an inline query.
 *
 * Note: All URLs passed in inline query results will be available to end users and therefore must be assumed to be public.
 * @link https://core.telegram.org/bots/api#inlinequeryresult
 */
#[AvailableInheritors([
    InlineQueryResultCachedAudio::class,
    InlineQueryResultCachedDocument::class,
    InlineQueryResultCachedGif::class,
    InlineQueryResultCachedMpeg4Gif::class,
    InlineQueryResultCachedPhoto::class,
    InlineQueryResultCachedSticker::class,
    InlineQueryResultCachedVideo::class,
    InlineQueryResultCachedVoice::class,
    InlineQueryResultArticle::class,
    InlineQueryResultAudio::class,
    InlineQueryResultContact::class,
    InlineQueryResultGame::class,
    InlineQueryResultDocument::class,
    InlineQueryResultGif::class,
    InlineQueryResultLocation::class,
    InlineQueryResultMpeg4Gif::class,
    InlineQueryResultPhoto::class,
    InlineQueryResultVenue::class,
    InlineQueryResultVideo::class,
    InlineQueryResultVoice::class,
])]
abstract class AbstractInlineQueryResult implements EntityInterface
{
    public function __construct(
        protected readonly InlineQueryResultTypeEnum $type,
    ) {}

    public function getType(): InlineQueryResultTypeEnum
    {
        return $this->type;
    }
}
