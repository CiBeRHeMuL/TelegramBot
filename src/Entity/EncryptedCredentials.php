<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes data required for decrypting and authenticating EncryptedPassportElement. See the Telegram Passport Documentation
 * for a complete description of the data decryption and authentication processes.
 *
 * @see https://core.telegram.org/bots/api#encryptedpassportelement EncryptedPassportElement
 * @see https://core.telegram.org/passport#receiving-information Telegram Passport Documentation
 * @link https://core.telegram.org/bots/api#encryptedcredentials
 */
final class EncryptedCredentials implements EntityInterface
{
    /**
     * @param string $data Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required
     * for EncryptedPassportElement decryption and authentication
     * @param string $hash Base64-encoded data hash for data authentication
     * @param string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
     *
     * @see https://core.telegram.org/bots/api#encryptedpassportelement EncryptedPassportElement
     */
    public function __construct(
        protected string $data,
        protected string $hash,
        protected string $secret,
    ) {}

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     *
     * @return EncryptedCredentials
     */
    public function setData(string $data): EncryptedCredentials
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     *
     * @return EncryptedCredentials
     */
    public function setHash(string $hash): EncryptedCredentials
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     *
     * @return EncryptedCredentials
     */
    public function setSecret(string $secret): EncryptedCredentials
    {
        $this->secret = $secret;
        return $this;
    }
}
