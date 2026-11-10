<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region CLASS_InputRichMessage
/**
 * Describes a rich message to be sent. Exactly one of the fields html or markdown must be used.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessage
 */
final class InputRichMessage implements EntityInterface
{
    /**
     * @param string|null                   $html                  Optional. Content of the rich message to send described using HTML formatting. See rich message formatting options for more details.
     * @param string|null                   $markdown              Optional. Content of the rich message to send described using Markdown formatting. See rich message formatting options for more details.
     * @param bool|null                     $is_rtl                Optional. Pass True if the rich message must be shown right-to-left
     * @param bool|null                     $skip_entity_detection Optional. Pass True to skip automatic detection of entities (e.g., URLs, email addresses, username mentions, hashtags, cashtags, bot commands, or phone numbers) in the text
     * @param InputRichMessageMedia[]|null  $media                 Optional. A JSON-serialized array of media to include in the rich message
     * @param AbstractInputRichBlock[]|null $blocks                Optional. A JSON-serialized array of blocks to include in the rich message
     *
     * @see https://core.telegram.org/bots/api#rich-message-formatting-options rich message formatting options
     */
    public function __construct(
        protected ?string $html = null,
        protected ?string $markdown = null,
        protected ?bool $is_rtl = null,
        protected ?bool $skip_entity_detection = null,
        #[ArrayType(InputRichMessageMedia::class)]
        protected ?array $media = null,
        #[ArrayType(AbstractInputRichBlock::class)]
        protected ?array $blocks = null,
    ) {}

    /**
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }

    /**
     * @param string|null $html
     *
     * @return InputRichMessage
     */
    public function setHtml(?string $html): InputRichMessage
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMarkdown(): ?string
    {
        return $this->markdown;
    }

    /**
     * @param string|null $markdown
     *
     * @return InputRichMessage
     */
    public function setMarkdown(?string $markdown): InputRichMessage
    {
        $this->markdown = $markdown;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsRtl(): ?bool
    {
        return $this->is_rtl;
    }

    /**
     * @param bool|null $is_rtl
     *
     * @return InputRichMessage
     */
    public function setIsRtl(?bool $is_rtl): InputRichMessage
    {
        $this->is_rtl = $is_rtl;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSkipEntityDetection(): ?bool
    {
        return $this->skip_entity_detection;
    }

    /**
     * @param bool|null $skip_entity_detection
     *
     * @return InputRichMessage
     */
    public function setSkipEntityDetection(?bool $skip_entity_detection): InputRichMessage
    {
        $this->skip_entity_detection = $skip_entity_detection;

        return $this;
    }

    /**
     * @return InputRichMessageMedia[]|null
     */
    public function getMedia(): ?array
    {
        return $this->media;
    }

    /**
     * @param InputRichMessageMedia[]|null $media
     *
     * @return InputRichMessage
     */
    public function setMedia(?array $media): InputRichMessage
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return AbstractInputRichBlock[]|null
     */
    public function getBlocks(): ?array
    {
        return $this->blocks;
    }

    /**
     * @param AbstractInputRichBlock[]|null $blocks
     *
     * @return InputRichMessage
     */
    public function setBlocks(?array $blocks): InputRichMessage
    {
        $this->blocks = $blocks;

        return $this;
    }
}

// endregion CLASS_InputRichMessage
