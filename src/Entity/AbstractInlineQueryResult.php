<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents one result of an inline query. All URLs passed in inline query results will be available to end users and therefore must be assumed to be public.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inlinequeryresult
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Inline query result types] => InlineQueryResultCachedAudio, InlineQueryResultCachedDocument, InlineQueryResultCachedGif, InlineQueryResultCachedMpeg4Gif, InlineQueryResultCachedPhoto, InlineQueryResultCachedSticker, InlineQueryResultCachedVideo, InlineQueryResultCachedVoice, InlineQueryResultArticle, InlineQueryResultAudio, InlineQueryResultContact, InlineQueryResultGame, InlineQueryResultDocument, InlineQueryResultGif, InlineQueryResultLocation, InlineQueryResultMpeg4Gif, InlineQueryResultPhoto, InlineQueryResultVenue, InlineQueryResultVideo, InlineQueryResultVoice
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractInlineQueryResult, Telegram Bot API, abstract, inline, query, result, DTO
// STRUCTURE: ▶ ┌type: InlineQueryResultTypeEnum┐ → abstract base with many AvailableInheritors

// region CLASS_AbstractInlineQueryResult [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object represents one result of an inline query.
 *
 * Note: All URLs passed in inline query results will be available to end users and therefore must be assumed to be public.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresult
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
// endregion CLASS_AbstractInlineQueryResult
