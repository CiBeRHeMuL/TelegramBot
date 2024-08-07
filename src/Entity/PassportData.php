<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 * @link https://core.telegram.org/bots/api#passportdata
 */
class PassportData extends AbstractEntity
{
    /**
     * @param EncryptedPassportElement[] $data
     * @param EncryptedCredentials $credentials
     */
    public function __construct(
        #[ArrayType(EncryptedPassportElement::class)] protected array $data,
        protected EncryptedCredentials $credentials,
    ) {
        parent::__construct();
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): PassportData
    {
        $this->data = $data;
        return $this;
    }

    public function getCredentials(): EncryptedCredentials
    {
        return $this->credentials;
    }

    public function setCredentials(EncryptedCredentials $credentials): PassportData
    {
        $this->credentials = $credentials;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'data' => array_map(
                fn(EncryptedPassportElement $element) => $element->toArray(),
                $this->data,
            ),
            'credentials' => $this->credentials->toArray(),
        ];
    }
}
