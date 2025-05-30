<?php

namespace AndrewGos\TelegramBot\Request;

class SetBusinessAccountNameRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $first_name The new value of the first name for the business account; 1-64 characters
     * @param string|null $last_name The new value of the last name for the business account; 0-64 characters
     */
    public function __construct(
        private string $business_connection_id,
        private string $first_name,
        private string|null $last_name = null,
    ) {
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): SetBusinessAccountNameRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): SetBusinessAccountNameRequest
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    public function setLastName(string|null $last_name): SetBusinessAccountNameRequest
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'business_connection_id' => $this->business_connection_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ];
    }
}
