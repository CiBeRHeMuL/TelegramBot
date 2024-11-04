<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\MessageEntityTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @link https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity extends AbstractEntity
{
    /**
     * @param MessageEntityTypeEnum $type
     * @param int $offset
     * @param int $length
     * @param Url|null $url
     * @param User|null $user
     * @param string|null $language
     * @param string|null $custom_emoji_id
     */
    public function __construct(
        protected MessageEntityTypeEnum $type,
        protected int $offset,
        protected int $length,
        protected Url|null $url = null,
        protected User|null $user = null,
        protected string|null $language = null,
        protected string|null $custom_emoji_id = null,
    ) {
        parent::__construct();
    }

    public function getType(): MessageEntityTypeEnum
    {
        return $this->type;
    }

    public function setType(MessageEntityTypeEnum $type): MessageEntity
    {
        $this->type = $type;
        return $this;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): MessageEntity
    {
        $this->offset = $offset;
        return $this;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): MessageEntity
    {
        $this->length = $length;
        return $this;
    }

    public function getUrl(): Url|null
    {
        return $this->url;
    }

    public function setUrl(Url|null $url): MessageEntity
    {
        $this->url = $url;
        return $this;
    }

    public function getUser(): User|null
    {
        return $this->user;
    }

    public function setUser(User|null $user): MessageEntity
    {
        $this->user = $user;
        return $this;
    }

    public function getLanguage(): string|null
    {
        return $this->language;
    }

    public function setLanguage(string|null $language): MessageEntity
    {
        $this->language = $language;
        return $this;
    }

    public function getCustomEmojiId(): string|null
    {
        return $this->custom_emoji_id;
    }

    public function setCustomEmojiId(string|null $custom_emoji_id): MessageEntity
    {
        $this->custom_emoji_id = $custom_emoji_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'offset' => $this->offset,
            'length' => $this->length,
            'url' => $this->url?->getUrl(),
            'user' => $this->user?->toArray(),
            'language' => $this->language,
            'custom_emoji_id' => $this->custom_emoji_id,
        ];
    }
}
