<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Phone;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the contact.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcontact
 */
#[BuildIf(new FieldIsChecker('type', InlineQueryResultTypeEnum::Contact))]
final class InlineQueryResultContact extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param Phone $phone_number Contact's phone number
     * @param string $first_name Contact's first name
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * contact
     * @param string|null $last_name Optional. Contact's last name
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param int|null $thumbnail_height Optional. Thumbnail height
     * @param Url|null $thumbnail_url Optional. Url of the thumbnail for the result
     * @param int|null $thumbnail_width Optional. Thumbnail width
     * @param string|null $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
     *
     * @see https://en.wikipedia.org/wiki/VCard vCard
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards Inline keyboard
     * @see https://core.telegram.org/bots/api#inputmessagecontent InputMessageContent
     */
    public function __construct(
        protected string $id,
        protected Phone $phone_number,
        protected string $first_name,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?string $last_name = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
        protected ?int $thumbnail_height = null,
        protected ?Url $thumbnail_url = null,
        protected ?int $thumbnail_width = null,
        protected ?string $vcard = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Contact);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return InlineQueryResultContact
     */
    public function setId(string $id): InlineQueryResultContact
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Phone
     */
    public function getPhoneNumber(): Phone
    {
        return $this->phone_number;
    }

    /**
     * @param Phone $phone_number
     *
     * @return InlineQueryResultContact
     */
    public function setPhoneNumber(Phone $phone_number): InlineQueryResultContact
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     *
     * @return InlineQueryResultContact
     */
    public function setFirstName(string $first_name): InlineQueryResultContact
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return AbstractInputMessageContent|null
     */
    public function getInputMessageContent(): ?AbstractInputMessageContent
    {
        return $this->input_message_content;
    }

    /**
     * @param AbstractInputMessageContent|null $input_message_content
     *
     * @return InlineQueryResultContact
     */
    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultContact
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     *
     * @return InlineQueryResultContact
     */
    public function setLastName(?string $last_name): InlineQueryResultContact
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return InlineQueryResultContact
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultContact
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbnailHeight(): ?int
    {
        return $this->thumbnail_height;
    }

    /**
     * @param int|null $thumbnail_height
     *
     * @return InlineQueryResultContact
     */
    public function setThumbnailHeight(?int $thumbnail_height): InlineQueryResultContact
    {
        $this->thumbnail_height = $thumbnail_height;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getThumbnailUrl(): ?Url
    {
        return $this->thumbnail_url;
    }

    /**
     * @param Url|null $thumbnail_url
     *
     * @return InlineQueryResultContact
     */
    public function setThumbnailUrl(?Url $thumbnail_url): InlineQueryResultContact
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbnailWidth(): ?int
    {
        return $this->thumbnail_width;
    }

    /**
     * @param int|null $thumbnail_width
     *
     * @return InlineQueryResultContact
     */
    public function setThumbnailWidth(?int $thumbnail_width): InlineQueryResultContact
    {
        $this->thumbnail_width = $thumbnail_width;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }

    /**
     * @param string|null $vcard
     *
     * @return InlineQueryResultContact
     */
    public function setVcard(?string $vcard): InlineQueryResultContact
    {
        $this->vcard = $vcard;
        return $this;
    }
}
