<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes Telegram Passport data shared with the bot.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#passportdata
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PassportData, Telegram, Bot API, DTO, passportdata
// STRUCTURE: ▶ ┌data: EncryptedPassportElement[],credentials: EncryptedCredentials┐ → ∑ PassportData
// region CLASS_PassportData

/**
 * Describes Telegram Passport data shared with the bot by the user.
 *
 * @see https://core.telegram.org/bots/api#passportdata
 */
final class PassportData implements EntityInterface
{
    /**
     * @param EncryptedPassportElement[] $data        Array with information about documents and other Telegram Passport elements that was
     *                                                shared with the bot
     * @param EncryptedCredentials       $credentials Encrypted credentials required to decrypt the data
     *
     * @see https://core.telegram.org/bots/api#encryptedpassportelement EncryptedPassportElement
     * @see https://core.telegram.org/bots/api#encryptedcredentials EncryptedCredentials
     */
    public function __construct(
        #[ArrayType(EncryptedPassportElement::class)]
        protected array $data,
        protected EncryptedCredentials $credentials,
    ) {}

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
}

// endregion CLASS_PassportData
