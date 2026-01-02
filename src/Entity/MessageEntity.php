<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\MessageEntityTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @link https://core.telegram.org/bots/api#messageentity
 */
final class MessageEntity implements EntityInterface
{
    /**
     * @param MessageEntityTypeEnum $type Type of the entity. Currently, can be “mention” (\@username), “hashtag” (#hashtag
     * or #hashtag\@chatusername), “cashtag” ($USD or $USD\@chatusername), “bot_command” (/start\@jobs_bot), “url” (https://telegram.org),
     * “email” (do-not-reply\@telegram.org), “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic
     * text), “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler message), “blockquote”
     * (block quotation), “expandable_blockquote” (collapsed-by-default block quotation), “code” (monowidth string), “pre”
     * (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames), “custom_emoji”
     * (for inline custom emoji stickers)
     * @param int $offset Offset in UTF-16 code units to the start of the entity
     * @param int $length Length of the entity in UTF-16 code units
     * @param Url|null $url Optional. For “text_link” only, URL that will be opened after user taps on the text
     * @param User|null $user Optional. For “text_mention” only, the mentioned user
     * @param string|null $language Optional. For “pre” only, the programming language of the entity text
     * @param string|null $custom_emoji_id Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers
     * to get full information about the sticker
     *
     * @see https://telegram.org/blog/edit#new-mentions without usernames
     * @see https://core.telegram.org/api/entities#entity-length UTF-16 code units
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#getcustomemojistickers getCustomEmojiStickers
     */
    public function __construct(
        protected MessageEntityTypeEnum $type,
        protected int $offset,
        protected int $length,
        protected ?Url $url = null,
        protected ?User $user = null,
        protected ?string $language = null,
        protected ?string $custom_emoji_id = null,
    ) {}

    /**
     * @return MessageEntityTypeEnum
     */
    public function getType(): MessageEntityTypeEnum
    {
        return $this->type;
    }

    /**
     * @param MessageEntityTypeEnum $type
     *
     * @return MessageEntity
     */
    public function setType(MessageEntityTypeEnum $type): MessageEntity
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     *
     * @return MessageEntity
     */
    public function setOffset(int $offset): MessageEntity
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     *
     * @return MessageEntity
     */
    public function setLength(int $length): MessageEntity
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getUrl(): ?Url
    {
        return $this->url;
    }

    /**
     * @param Url|null $url
     *
     * @return MessageEntity
     */
    public function setUrl(?Url $url): MessageEntity
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return MessageEntity
     */
    public function setUser(?User $user): MessageEntity
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     *
     * @return MessageEntity
     */
    public function setLanguage(?string $language): MessageEntity
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomEmojiId(): ?string
    {
        return $this->custom_emoji_id;
    }

    /**
     * @param string|null $custom_emoji_id
     *
     * @return MessageEntity
     */
    public function setCustomEmojiId(?string $custom_emoji_id): MessageEntity
    {
        $this->custom_emoji_id = $custom_emoji_id;
        return $this;
    }
}
