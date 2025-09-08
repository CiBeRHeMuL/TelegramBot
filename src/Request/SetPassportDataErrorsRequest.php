<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractPassportElementError;

class SetPassportDataErrorsRequest implements RequestInterface
{
    /**
     * @param AbstractPassportElementError[] $errors A JSON-serialized array describing the errors
     * @param int $user_id User identifier
     */
    public function __construct(
        private array $errors,
        private int $user_id,
    ) {}

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors(array $errors): SetPassportDataErrorsRequest
    {
        $this->errors = $errors;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SetPassportDataErrorsRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
