<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

/**
 * @link https://core.telegram.org/bots/api#giftpremiumsubscription
 */
class GiftPremiumSubscriptionRequest implements RequestInterface
{
    /**
     * @param int $month_count Number of months the Telegram Premium subscription will be active for the user; must be one of 3,
     * 6, or 12
     * @param int $star_count Number of Telegram Stars to pay for the Telegram Premium subscription; must be 1000 for 3 months, 1500
     * for 6 months, and 2500 for 12 months
     * @param int $user_id Unique identifier of the target user who will receive a Telegram Premium subscription
     * @param string|null $text Text that will be shown along with the service message about the subscription; 0-128 characters
     * @param MessageEntity[]|null $text_entities A JSON-serialized list of special entities that appear in the gift text. It can
     * be specified instead of text_parse_mode. Entities other than “bold”, “italic”, “underline”, “strikethrough”,
     * “spoiler”, and “custom_emoji” are ignored.
     * @param TelegramParseModeEnum|null $text_parse_mode Mode for parsing entities in the text. See formatting options for more
     * details. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji”
     * are ignored.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        private int $month_count,
        private int $star_count,
        private int $user_id,
        private ?string $text = null,
        private ?array $text_entities = null,
        private ?TelegramParseModeEnum $text_parse_mode = null,
    ) {}

    public function getMonthCount(): int
    {
        return $this->month_count;
    }

    public function setMonthCount(int $month_count): GiftPremiumSubscriptionRequest
    {
        $this->month_count = $month_count;
        return $this;
    }

    public function getStarCount(): int
    {
        return $this->star_count;
    }

    public function setStarCount(int $star_count): GiftPremiumSubscriptionRequest
    {
        $this->star_count = $star_count;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GiftPremiumSubscriptionRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): GiftPremiumSubscriptionRequest
    {
        $this->text = $text;
        return $this;
    }

    public function getTextEntities(): ?array
    {
        return $this->text_entities;
    }

    public function setTextEntities(?array $text_entities): GiftPremiumSubscriptionRequest
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    public function getTextParseMode(): ?TelegramParseModeEnum
    {
        return $this->text_parse_mode;
    }

    public function setTextParseMode(?TelegramParseModeEnum $text_parse_mode): GiftPremiumSubscriptionRequest
    {
        $this->text_parse_mode = $text_parse_mode;
        return $this;
    }
}
