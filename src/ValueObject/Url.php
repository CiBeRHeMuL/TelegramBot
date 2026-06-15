<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует URL через FILTER_VALIDATE_URL. Нормализует ссылки без схемы добавлением https://.
 *
 * @sees USES_API(X): PHP filter_var
 *
 * @changes LAST_CHANGE: Added normalization for scheme-less URLs
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Url, Telegram, URL, validation, filter, normalization, scheme
// STRUCTURE: ▶ ┌url┐ → ○ filter_var(url, FILTER_VALIDATE_URL) → ◇ valid ? ✓ store : → ○ prepend "https://" → ○ filter_var(normalized, FILTER_VALIDATE_URL) → ◇ valid ? ✓ store normalized : ✗ throw InvalidValueObjectConfigException → ∑ getUrl()
// region CLASS_Url
#[CanBeBuiltFromScalar]
readonly class Url
{
    private string $url;

    /**
     * @param string $url
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        string $url,
    ) {
        $this->url = $this->normalize($url);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    private function normalize(string $url): string
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        }

        $normalized = 'https://' . $url;
        if (filter_var($normalized, FILTER_VALIDATE_URL)) {
            $host = parse_url($normalized, PHP_URL_HOST);
            if ($host !== null && $host !== '' && str_contains($host, '.')) {
                return $normalized;
            }
        }

        throw new InvalidValueObjectConfigException(self::class, 'invalid url representation');
    }
}
// endregion CLASS_Url
