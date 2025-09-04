<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#sendgift
 */
class SendGiftRequest implements RequestInterface
{
    /**
     * @param string $gift_id Identifier of the gift
     * @param ChatId|null $chat_id Required if user_id is not specified. Unique identifier for the chat or username of the channel
     * (in the format \@channelusername) that will receive the gift.
     * @param bool|null $pay_for_upgrade Pass True to pay for the gift upgrade from the bot's balance, thereby making the upgrade
     * free for the receiver
     * @param string|null $text Text that will be shown along with the gift; 0-128 characters
     * @param MessageEntity[]|null $text_entities A JSON-serialized list of special entities that appear in the gift text. It can
     * be specified instead of text_parse_mode. Entities other than “bold”, “italic”, “underline”, “strikethrough”,
     * “spoiler”, and “custom_emoji” are ignored.
     * @param TelegramParseModeEnum|null $text_parse_mode Mode for parsing entities in the text. See formatting options for more
     * details. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji”
     * are ignored.
     * @param int|null $user_id Required if chat_id is not specified. Unique identifier of the target user who will receive the gift.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        private string $gift_id,
        private ChatId|null $chat_id = null,
        private bool|null $pay_for_upgrade = null,
        private string|null $text = null,
        private array|null $text_entities = null,
        private TelegramParseModeEnum|null $text_parse_mode = null,
        private int|null $user_id = null,
    ) {
    }

    public function getGiftId(): string
    {
        return $this->gift_id;
    }

    public function setGiftId(string $gift_id): SendGiftRequest
    {
        $this->gift_id = $gift_id;
        return $this;
    }

    public function getChatId(): ChatId|null
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId|null $chat_id): SendGiftRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getPayForUpgrade(): bool|null
    {
        return $this->pay_for_upgrade;
    }

    public function setPayForUpgrade(bool|null $pay_for_upgrade): SendGiftRequest
    {
        $this->pay_for_upgrade = $pay_for_upgrade;
        return $this;
    }

    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(string|null $text): SendGiftRequest
    {
        $this->text = $text;
        return $this;
    }

    public function getTextEntities(): array|null
    {
        return $this->text_entities;
    }

    public function setTextEntities(array|null $text_entities): SendGiftRequest
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    public function getTextParseMode(): TelegramParseModeEnum|null
    {
        return $this->text_parse_mode;
    }

    public function setTextParseMode(TelegramParseModeEnum|null $text_parse_mode): SendGiftRequest
    {
        $this->text_parse_mode = $text_parse_mode;
        return $this;
    }

    public function getUserId(): int|null
    {
        return $this->user_id;
    }

    public function setUserId(int|null $user_id): SendGiftRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
