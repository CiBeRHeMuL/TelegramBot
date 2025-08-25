<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 *
 * @link https://core.telegram.org/bots/api#passportdata
 */
class PassportData extends AbstractEntity
{
    /**
     * @param EncryptedPassportElement[] $data Array with information about documents and other Telegram Passport elements that was
     * shared with the bot
     * @param EncryptedCredentials $credentials Encrypted credentials required to decrypt the data
     *
     * @see https://core.telegram.org/bots/api#encryptedpassportelement EncryptedPassportElement
     * @see https://core.telegram.org/bots/api#encryptedcredentials EncryptedCredentials
     */
    public function __construct(
        #[ArrayType(EncryptedPassportElement::class)]
        protected array $data,
        protected EncryptedCredentials $credentials,
    ) {
        parent::__construct();
    }

    /**
     * @return EncryptedPassportElement[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param EncryptedPassportElement[] $data
     *
     * @return PassportData
     */
    public function setData(array $data): PassportData
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return EncryptedCredentials
     */
    public function getCredentials(): EncryptedCredentials
    {
        return $this->credentials;
    }

    /**
     * @param EncryptedCredentials $credentials
     *
     * @return PassportData
     */
    public function setCredentials(EncryptedCredentials $credentials): PassportData
    {
        $this->credentials = $credentials;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'data' => array_map(
                fn(EncryptedPassportElement $e) => $e->toArray(),
                $this->data,
            ),
            'credentials' => $this->credentials->toArray(),
        ];
    }
}
