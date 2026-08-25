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
 * @purpose Request DTO for Telegram Bot API editEphemeralMessageText method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#editephemeralmessagetext
 *
 * @changes LAST_CHANGE: Updated for Bot API 10.3 - made text optional; added rich_message
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Edit, Ephemeral, Message, Text
// STRUCTURE: ▶ ┌chat_id + receiver_user_id + ephemeral_message_id + text + rich_message┐ → ◇ construct → ⊕ → ∑ ⟦EditEphemeralMessageTextRequest⟧

// region CLASS_EditEphemeralMessageTextRequest
/**
 * @see https://core.telegram.org/bots/api#editephemeralmessagetext
 */
class EditEphemeralMessageTextRequest implements RequestInterface
{
    /**
     * @param ChatId                     $chat_id              Unique identifier for the target chat or username of the target bot, supergroup or channel in the format @username
     * @param int                        $receiver_user_id     Identifier of the user who received the message; required if the message is an ephemeral message
     * @param int                        $ephemeral_message_id Identifier of the ephemeral message to edit
     * @param string|null                $text                 New text of the message, 1-4096 characters after entities parsing; required if rich_message isn't specified
     * @param TelegramParseModeEnum|null $parse_mode           Optional. Mode for parsing entities in the message text. See formatting options for more details.
     * @param MessageEntity[]|null       $entities             Optional. A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
     * @param LinkPreviewOptions|null    $link_preview_options Optional. Link preview generation options for the message
     * @param InlineKeyboardMarkup|null  $reply_markup         Optional. A JSON-serialized object for an inline keyboard
     * @param InputRichMessage|null      $rich_message         Optional. New rich content of the message; required if text isn't specified
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inputrichmessage InputRichMessage
     * @see https://core.telegram.org/bots/api#linkpreviewoptions LinkPreviewOptions
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private int $receiver_user_id,
        private int $ephemeral_message_id,
        private ?string $text = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?array $entities = null,
        private ?LinkPreviewOptions $link_preview_options = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?InputRichMessage $rich_message = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): EditEphemeralMessageTextRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getReceiverUserId(): int
    {
        return $this->receiver_user_id;
    }

    public function setReceiverUserId(int $receiver_user_id): EditEphemeralMessageTextRequest
    {
        $this->receiver_user_id = $receiver_user_id;

        return $this;
    }

    public function getEphemeralMessageId(): int
    {
        return $this->ephemeral_message_id;
    }

    public function setEphemeralMessageId(int $ephemeral_message_id): EditEphemeralMessageTextRequest
    {
        $this->ephemeral_message_id = $ephemeral_message_id;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): EditEphemeralMessageTextRequest
    {
        $this->text = $text;

        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): EditEphemeralMessageTextRequest
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    public function getEntities(): ?array
    {
        return $this->entities;
    }

    public function setEntities(?array $entities): EditEphemeralMessageTextRequest
    {
        $this->entities = $entities;

        return $this;
    }

    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->link_preview_options;
    }

    public function setLinkPreviewOptions(?LinkPreviewOptions $link_preview_options): EditEphemeralMessageTextRequest
    {
        $this->link_preview_options = $link_preview_options;

        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditEphemeralMessageTextRequest
    {
        $this->reply_markup = $reply_markup;

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
     * @return EditEphemeralMessageTextRequest
     */
    public function setRichMessage(?InputRichMessage $rich_message): EditEphemeralMessageTextRequest
    {
        $this->rich_message = $rich_message;

        return $this;
    }
}
// endregion CLASS_EditEphemeralMessageTextRequest
