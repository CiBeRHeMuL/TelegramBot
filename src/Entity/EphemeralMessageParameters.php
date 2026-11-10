<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_EphemeralMessageParameters
/**
 * Describes the parameters of an ephemeral message sent to a user or in place of a callback query message.
 *
 * @see https://core.telegram.org/bots/api#ephemeralmessageparameters
 */
final class EphemeralMessageParameters implements EntityInterface
{
    /**
     * @param int         $receiver_user_id               Identifier of the user who will receive the message. It is not guaranteed that the user will receive
     *                                                    the message, especially if they are offline
     * @param string|null $callback_query_id              Optional. Identifier of the callback query which triggered the message, if any
     * @param bool|null   $replace_callback_query_message Optional. Pass True if the ephemeral message must be shown in place of the original message sent in
     *                                                    response to the callback query
     */
    public function __construct(
        protected int $receiver_user_id,
        protected ?string $callback_query_id = null,
        protected ?bool $replace_callback_query_message = null,
    ) {}

    /**
     * @return int
     */
    public function getReceiverUserId(): int
    {
        return $this->receiver_user_id;
    }

    /**
     * @param int $receiver_user_id
     *
     * @return EphemeralMessageParameters
     */
    public function setReceiverUserId(int $receiver_user_id): EphemeralMessageParameters
    {
        $this->receiver_user_id = $receiver_user_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCallbackQueryId(): ?string
    {
        return $this->callback_query_id;
    }

    /**
     * @param string|null $callback_query_id
     *
     * @return EphemeralMessageParameters
     */
    public function setCallbackQueryId(?string $callback_query_id): EphemeralMessageParameters
    {
        $this->callback_query_id = $callback_query_id;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getReplaceCallbackQueryMessage(): ?bool
    {
        return $this->replace_callback_query_message;
    }

    /**
     * @param bool|null $replace_callback_query_message
     *
     * @return EphemeralMessageParameters
     */
    public function setReplaceCallbackQueryMessage(?bool $replace_callback_query_message): EphemeralMessageParameters
    {
        $this->replace_callback_query_message = $replace_callback_query_message;

        return $this;
    }
}

// endregion CLASS_EphemeralMessageParameters
