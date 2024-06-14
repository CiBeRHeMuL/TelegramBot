<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes data required for decrypting and authenticating EncryptedPassportElement.
 * See the Telegram Passport Documentation for a complete description of the data decryption and authentication processes.
 * @link https://core.telegram.org/bots/api#encryptedcredentials
 * @link https://core.telegram.org/passport#receiving-information
 */
class EncryptedCredentials extends AbstractEntity
{
    /**
     * @param string $data Base64-encoded encrypted JSON-serialized data with unique user's payload,
     * data hashes and secrets required for EncryptedPassportElement decryption and authentication
     * @param string $hash Base64-encoded data hash for data authentication
     * @param string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
     */
    public function __construct(
        protected string $data,
        protected string $hash,
        protected string $secret,
    ) {
        parent::__construct();
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): EncryptedCredentials
    {
        $this->data = $data;
        return $this;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): EncryptedCredentials
    {
        $this->hash = $hash;
        return $this;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    public function setSecret(string $secret): EncryptedCredentials
    {
        $this->secret = $secret;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'data' => $this->data,
            'hash' => $this->hash,
            'secret' => $this->secret,
        ];
    }
}
