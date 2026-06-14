<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\InputRichMessage;
use AndrewGos\TelegramBot\Entity\LinkPreviewOptions;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API editMessageText method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#editmessagetext
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Edit, Message, Text
// STRUCTURE: ▶ ┌text + chat_id + entities + inline_message_id + link_preview_options┐ → ◇ construct → ⊕ → ∑ ⟦EditMessageTextRequest⟧

// region CLASS_EditMessageTextRequest
/**
 * @see https://core.telegram.org/bots/api#editmessagetext
 */
class EditMessageTextRequest implements RequestInterface
{
    /**
     * @param string|null                $text                   New text of the message, 1-4096 characters after entities parsing.
     *                                                           Required if rich_message isn't specified.
     * @param ChatId|null                $chat_id                Required if inline_message_id is not specified. Unique identifier for the target chat or username
     *                                                           of the target bot, supergroup or channel in the format \@username.
     * @param MessageEntity[]|null       $entities               A JSON-serialized list of special entities that appear in message text, which can be
     *                                                           specified instead of parse_mode
     * @param string|null                $inline_message_id      Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param LinkPreviewOptions|null    $link_preview_options   Link preview generation options for the message
     * @param int|null                   $message_id             Required if inline_message_id is not specified. Identifier of the message to edit
     * @param TelegramParseModeEnum|null $parse_mode             Mode for parsing entities in the message text. See formatting options for more
     *                                                           details.
     * @param InlineKeyboardMarkup|null  $reply_markup           a JSON-serialized object for an inline keyboard
     * @param string|null                $business_connection_id Unique identifier of the business connection on behalf of which the message to
     *                                                           be edited was sent
     * @param InputRichMessage|null      $rich_message           Optional. New rich content of the message; required if text isn't specified
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#linkpreviewoptions LinkPreviewOptions
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ?string $text = null,
        private ?ChatId $chat_id = null,
        private ?array $entities = null,
        private ?string $inline_message_id = null,
        private ?LinkPreviewOptions $link_preview_options = null,
        private ?int $message_id = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?string $business_connection_id = null,
        private ?InputRichMessage $rich_message = null,
    ) {}

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): EditMessageTextRequest
    {
        $this->text = $text;

        return $this;
    }

    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(?ChatId $chat_id): EditMessageTextRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getEntities(): ?array
    {
        return $this->entities;
    }

    public function setEntities(?array $entities): EditMessageTextRequest
    {
        $this->entities = $entities;

        return $this;
    }

    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(?string $inline_message_id): EditMessageTextRequest
    {
        $this->inline_message_id = $inline_message_id;

        return $this;
    }

    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->link_preview_options;
    }

    public function setLinkPreviewOptions(?LinkPreviewOptions $link_preview_options): EditMessageTextRequest
    {
        $this->link_preview_options = $link_preview_options;

        return $this;
    }

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function setMessageId(?int $message_id): EditMessageTextRequest
    {
        $this->message_id = $message_id;

        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): EditMessageTextRequest
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditMessageTextRequest
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): EditMessageTextRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    /**
     * @return InputRichMessage|null
     */
    public function getRichMessage(): ?InputRichMessage
    {
        return $this->rich_message;
    }

    /**
     * @param InputRichMessage|null $rich_message
     *
     * @return EditMessageTextRequest
     */
    public function setRichMessage(?InputRichMessage $rich_message): EditMessageTextRequest
    {
        $this->rich_message = $rich_message;

        return $this;
    }
}
// endregion CLASS_EditMessageTextRequest
