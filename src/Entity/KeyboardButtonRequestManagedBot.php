<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object defines the parameters for the creation of a managed bot. Information about the created bot will be shared with
 * the bot using the update managed_bot and a Message with the field managed_bot_created.
 *
 * @see https://core.telegram.org/bots/api#message Message
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestmanagedbot
 */
final class KeyboardButtonRequestManagedBot implements EntityInterface
{
    /**
     * @param int $request_id Signed 32-bit identifier of the request. Must be unique within the message
     * @param string|null $suggested_name Optional. Suggested name for the bot
     * @param string|null $suggested_username Optional. Suggested username for the bot
     */
    public function __construct(
        protected int $request_id,
        protected ?string $suggested_name = null,
        protected ?string $suggested_username = null,
    ) {}

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->request_id;
    }

    /**
     * @param int $request_id
     *
     * @return KeyboardButtonRequestManagedBot
     */
    public function setRequestId(int $request_id): KeyboardButtonRequestManagedBot
    {
        $this->request_id = $request_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSuggestedName(): ?string
    {
        return $this->suggested_name;
    }

    /**
     * @param string|null $suggested_name
     *
     * @return KeyboardButtonRequestManagedBot
     */
    public function setSuggestedName(?string $suggested_name): KeyboardButtonRequestManagedBot
    {
        $this->suggested_name = $suggested_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSuggestedUsername(): ?string
    {
        return $this->suggested_username;
    }

    /**
     * @param string|null $suggested_username
     *
     * @return KeyboardButtonRequestManagedBot
     */
    public function setSuggestedUsername(?string $suggested_username): KeyboardButtonRequestManagedBot
    {
        $this->suggested_username = $suggested_username;
        return $this;
    }
}
