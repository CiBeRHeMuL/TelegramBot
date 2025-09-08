<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ResponseParameters;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

class RawResponse
{
    /**
     * @param bool $ok
     * @param string|null $description
     * @param array|string|bool|null $result
     * @param HttpStatusCodeEnum|null $error_code
     * @param ResponseParameters|null $parameters
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private bool $ok = false,
        private ?string $description = null,
        private array|string|bool|int|null $result = null,
        private ?HttpStatusCodeEnum $error_code = null,
        private ?ResponseParameters $parameters = null,
    ) {
        if ($this->ok && $this->result === null) {
            throw new InvalidValueObjectConfigException(self::class, 'missing result');
        } elseif (!$this->ok && ($this->error_code === null || $this->description === null)) {
            throw new InvalidValueObjectConfigException(self::class, 'missing error_code or description');
        }
    }

    public function isOk(): bool
    {
        return $this->ok;
    }

    public function setOk(bool $ok): RawResponse
    {
        $this->ok = $ok;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): RawResponse
    {
        $this->description = $description;
        return $this;
    }

    public function getResult(): bool|array|string|int|null
    {
        return $this->result;
    }

    public function setResult(array|bool|string|int|null $result): RawResponse
    {
        $this->result = $result;
        return $this;
    }

    public function getErrorCode(): ?HttpStatusCodeEnum
    {
        return $this->error_code;
    }

    public function setErrorCode(?HttpStatusCodeEnum $error_code): RawResponse
    {
        $this->error_code = $error_code;
        return $this;
    }

    public function getParameters(): ?ResponseParameters
    {
        return $this->parameters;
    }

    public function setParameters(?ResponseParameters $parameters): RawResponse
    {
        $this->parameters = $parameters;
        return $this;
    }
}
