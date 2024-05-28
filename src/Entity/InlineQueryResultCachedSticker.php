<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use stdClass;

/**
 * Represents a link to a sticker stored on the Telegram servers. By default, this sticker will be sent by the user. Alternatively,
 * you can use input_message_content to send a message with the specified content instead of the sticker.
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Sticker->value),
    new FieldCompareChecker('sticker_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InlineQueryResultCachedSticker extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $sticker_file_id A valid file identifier of the sticker
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * sticker
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     */
    public function __construct(
        protected string $id,
        protected string $sticker_file_id,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Sticker);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultCachedSticker
    {
        $this->id = $id;
        return $this;
    }

    public function getStickerFileId(): string
    {
        return $this->sticker_file_id;
    }

    public function setStickerFileId(string $sticker_file_id): InlineQueryResultCachedSticker
    {
        $this->sticker_file_id = $sticker_file_id;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultCachedSticker
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultCachedSticker
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'sticker_file_id' => $this->sticker_file_id,
            'input_message_content' => $this->input_message_content?->toArray(),
            'reply_markup' => $this->reply_markup?->toArray(),
        ];
    }
}
