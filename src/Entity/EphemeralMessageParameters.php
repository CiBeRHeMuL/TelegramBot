<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_EphemeralMessageParameters
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#ephemeralmessageparameters
 */
final class EphemeralMessageParameters implements EntityInterface
{
    /**
     * @param int|null    $receiver_user_id               Optional. Identifier of the user who will receive the message; required unless the message
     *                                                    is sent as an ephemeral reply to a callback query. If omitted, then the parameter chat_id of the method is ignored. If specified
     *                                                    together with callback_query_id, then it must be the identifier of the user who pressed the button. Must be omitted for messages
     *                                                    sent in chats where the bot isn't a member, unless the message is a reply to an ephemeral message. It is not guaranteed that
     *                                                    the user will receive the message, especially if they are offline. See here for more details.
     * @param string|null $callback_query_id              Optional. Identifier of the callback query which triggered the message, if any. If specified
     *                                                    and receiver_user_id is omitted, then the message is sent as an ephemeral reply to the callback query and will be shown only
     *                                                    to the user who pressed the button. Ephemeral replies can't be sent to callback queries from messages in channel direct messages
     *                                                    chats. The bot must still answer the callback query using answerCallbackQuery.
     * @param bool|null   $replace_callback_query_message Optional. Pass True if the ephemeral message must be shown in place of the
     *                                                    original message. Must be False for callback queries from ephemeral messages, which must be edited using regular editEphemeralMessage…
     *                                                    methods.
     *
     * @see https://core.telegram.org/bots/api#ephemeral-messages-and-commands here
     * @see https://core.telegram.org/bots/api#answercallbackquery answerCallbackQuery
     */
    public function __construct(
        protected ?int $receiver_user_id = null,
        protected ?string $callback_query_id = null,
        protected ?bool $replace_callback_query_message = null,
    ) {}

    /**
     * @return int|null
     */
    public function getReceiverUserId(): ?int
    {
        return $this->receiver_user_id;
    }

    /**
     * @param int|null $receiver_user_id
     *
     * @return EphemeralMessageParameters
     */
    public function setReceiverUserId(?int $receiver_user_id): EphemeralMessageParameters
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
