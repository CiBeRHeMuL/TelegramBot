<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user
 * has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create user-friendly step-by-step
 * interfaces without having to sacrifice privacy mode. Not supported in channels and for messages sent on behalf of a Telegram
 * Business account.
 *
 * @see /bots/features#privacy-mode privacy mode
 * @link https://core.telegram.org/bots/api#forcereply
 */
class ForceReply extends AbstractEntity
{
    /**
     * @param bool $force_reply Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
     * @param string|null $input_field_placeholder Optional. The placeholder to be shown in the input field when the reply is active;
     * 1-64 characters
     * @param bool|null $selective Optional. Use this parameter if you want to force reply from specific users only. Targets: 1)
     * users that are \@mentioned in the text of the Message object; 2) if the bot's message is a reply to a message in the same
     * chat and forum topic, sender of the original message.
     *
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        protected bool $force_reply,
        protected string|null $input_field_placeholder = null,
        protected bool|null $selective = null,
    ) {
        parent::__construct();
    }

    /**
     * @return bool
     */
    public function getForceReply(): bool
    {
        return $this->force_reply;
    }

    /**
     * @param bool $force_reply
     *
     * @return ForceReply
     */
    public function setForceReply(bool $force_reply): ForceReply
    {
        $this->force_reply = $force_reply;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInputFieldPlaceholder(): string|null
    {
        return $this->input_field_placeholder;
    }

    /**
     * @param string|null $input_field_placeholder
     *
     * @return ForceReply
     */
    public function setInputFieldPlaceholder(string|null $input_field_placeholder): ForceReply
    {
        $this->input_field_placeholder = $input_field_placeholder;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSelective(): bool|null
    {
        return $this->selective;
    }

    /**
     * @param bool|null $selective
     *
     * @return ForceReply
     */
    public function setSelective(bool|null $selective): ForceReply
    {
        $this->selective = $selective;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'force_reply' => $this->force_reply,
            'input_field_placeholder' => $this->input_field_placeholder,
            'selective' => $this->selective,
        ];
    }
}
