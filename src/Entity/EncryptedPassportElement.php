<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\EncryptedPassportElementTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Email;
use AndrewGos\TelegramBot\ValueObject\Phone;
use stdClass;

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 * @link https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement extends AbstractEntity
{
    /**
     * @param EncryptedPassportElementTypeEnum $type Element type.
     * @param string|null $data Base64-encoded encrypted Telegram Passport element data provided by the user;
     * available only for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”
     * and “address” types. Can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param Phone|null $phone_number User's verified phone number; available only for “phone_number” type
     * @param Email|null $email User's verified email address; available only for “email” type
     * @param PassportFile[]|null $files Array of encrypted files with documents provided by the user; available only for “utility_bill”,
     * “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types.
     * Files can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFile|null $front_side Encrypted file with the front side of the document, provided by the user;
     * available only for “passport”, “driver_license”, “identity_card” and “internal_passport”.
     * The file can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFile|null $reverse_side Encrypted file with the reverse side of the document, provided by the user;
     * available only for “driver_license” and “identity_card”.
     * The file can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFile|null $selfie Encrypted file with the selfie of the user holding a document, provided by the user;
     * available if requested for “passport”, “driver_license”, “identity_card” and “internal_passport”.
     * The file can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFile[]|null $translation Array of encrypted files with translated versions of documents provided by the user;
     * available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”,
     * “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types.
     * Files can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param string|null $hash Base64-encoded element hash for using in PassportElementErrorUnspecified
     */
    public function __construct(
        protected EncryptedPassportElementTypeEnum $type,
        protected string|null $data = null,
        protected Phone|null $phone_number = null,
        protected Email|null $email = null,
        #[ArrayType(PassportFile::class)] protected array|null $files = null,
        protected PassportFile|null $front_side = null,
        protected PassportFile|null $reverse_side = null,
        protected PassportFile|null $selfie = null,
        #[ArrayType(PassportFile::class)] protected array|null $translation = null,
        protected string|null $hash = null,
    ) {
        parent::__construct();
    }

    public function getType(): EncryptedPassportElementTypeEnum
    {
        return $this->type;
    }

    public function setType(EncryptedPassportElementTypeEnum $type): EncryptedPassportElement
    {
        $this->type = $type;
        return $this;
    }

    public function getData(): string|null
    {
        return $this->data;
    }

    public function setData(string|null $data): EncryptedPassportElement
    {
        $this->data = $data;
        return $this;
    }

    public function getPhoneNumber(): Phone|null
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(Phone|null $phone_number): EncryptedPassportElement
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    public function getEmail(): Email|null
    {
        return $this->email;
    }

    public function setEmail(Email|null $email): EncryptedPassportElement
    {
        $this->email = $email;
        return $this;
    }

    public function getFiles(): array|null
    {
        return $this->files;
    }

    public function setFiles(array|null $files): EncryptedPassportElement
    {
        $this->files = $files;
        return $this;
    }

    public function getFrontSide(): PassportFile|null
    {
        return $this->front_side;
    }

    public function setFrontSide(PassportFile|null $front_side): EncryptedPassportElement
    {
        $this->front_side = $front_side;
        return $this;
    }

    public function getReverseSide(): PassportFile|null
    {
        return $this->reverse_side;
    }

    public function setReverseSide(PassportFile|null $reverse_side): EncryptedPassportElement
    {
        $this->reverse_side = $reverse_side;
        return $this;
    }

    public function getSelfie(): PassportFile|null
    {
        return $this->selfie;
    }

    public function setSelfie(PassportFile|null $selfie): EncryptedPassportElement
    {
        $this->selfie = $selfie;
        return $this;
    }

    public function getTranslation(): array|null
    {
        return $this->translation;
    }

    public function setTranslation(array|null $translation): EncryptedPassportElement
    {
        $this->translation = $translation;
        return $this;
    }

    public function getHash(): string|null
    {
        return $this->hash;
    }

    public function setHash(string|null $hash): EncryptedPassportElement
    {
        $this->hash = $hash;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'data' => $this->data,
            'phone_number' => $this->phone_number?->getPhone(),
            'email' => $this->email?->getEmail(),
            'files' => $this->files !== null
                ? array_map(fn(PassportFile $file) => $file->toArray(), $this->files)
                : null,
            'front_side' => $this->front_side?->toArray(),
            'reverse_side' => $this->reverse_side?->toArray(),
            'selfie' => $this->selfie?->toArray(),
            'translation' => $this->translation !== null
                ? array_map(fn(PassportFile $file) => $file->toArray(), $this->translation)
                : null,
            'hash' => $this->hash,
        ];
    }
}
