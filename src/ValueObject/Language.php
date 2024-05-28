<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

/**
 * Описывает код языка в соответствии со спецификацией IETF
 */
#[CanBeBuiltFromScalar]
readonly class Language
{
    /**
     * Первая часть языкового тега:
     * - кратчайший код ISO 639 с доп. расширенными подтегами
     * - код зарезервированный под дальнейшее использование
     * - зарегистрированный языковой подтег
     */
    private const LANG_REGEX = '([a-z]{2,3}(-[a-z]{3}){0,3}|[a-z]{4}|[a-z]{5,8})';
    /**
     * Вторая часть языкового тега:
     * - код ISO 15924
     */
    private const SCRIPT_REGEX = '([a-z]{4})';
    /**
     * Третья часть языкового тега:
     * - код ISO 3166-1
     * - код UN M.49
     */
    private const REGION_REGEX = '([a-z]{2}|\d{3})';
    /**
     * Четвертая часть языкового тега:
     * - зарегистрированные варианты
     */
    private const VARIANT_REGEX = '(\w{5,8}|\d\w{3})';
    /**
     * Пятая часть языкового тега:
     * - расширения языка (x зарезервирован для частного пользования)
     */
    private const EXTENSION_REGEX = '((\d|[a-wyz])(-\w{2,8})+)';
    /**
     * Шестая часть языкового тега:
     * - расширения языка для частного пользования
     */
    private const PRIVATEUSE_REGEX = '(x(-\w{1,8})+)';
    /**
     * Нормальный языковой тег
     */
    private const LANGTAG_REGEX
        = '('
        . self::LANG_REGEX
        . '(-' . self::SCRIPT_REGEX . ')?'
        . '(-' . self::REGION_REGEX . ')?'
        . '(-' . self::VARIANT_REGEX . ')*'
        . '(-' . self::EXTENSION_REGEX . ')*'
        . '(-' . self::PRIVATEUSE_REGEX . ')?'
        . ')';

    /**
     * Неправильные теги не соответствуют языковым тегам и
     * в противном случае не считались бы "правильно сформированными".
     * Все эти теги допустимы,
     * но большинство из них устарели в пользу более современных
     * подзаголовков или комбинаций подзаголовков
     */
    private const IRREGULAR_REGEX
        = '(i-ami|i-bnn|i-default|i-enochian'
        . '|i-hak|i-klingon|i-lux|i-mingo|i-navajo|i-pwn|i-tao'
        . '|i-tay|i-tsu|sgn-BE-FR|sgn-BE-NL|sgn-CH-DE)';
    /**
     * Эти теги соответствуют "языковой"
     * продукции, но их подзаголовки
     * не являются расширенными языковыми
     * или вариантными подзаголовками: их значение
     * определяется их регистрацией, и все они устарели
     * в пользу более современных
     * подзаголовков или последовательности подзаголовков
     */
    private const REGULAR_REGEX = '(art-lojban|cel-gaulish|no-bok|no-nyn|zh-guoyu|zh-hakka|zh-min|zh-min-nan|zh-xiang)';
    /**
     * Избыточные теги, зарегистрированные в RFC 3066
     */
    private const GRANDFATHERED_REGEX = '(' . self::IRREGULAR_REGEX . '|' . self::REGULAR_REGEX . ')';

    private string $language;

    /**
     * @param string $language
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        string $language,
    ) {
        $regex = '/^('
            . self::LANGTAG_REGEX
            . '|' . self::GRANDFATHERED_REGEX
            . '|' . self::PRIVATEUSE_REGEX
            . ')$/ui';
        if (!preg_match($regex, $language)) {
            throw new InvalidValueObjectConfigException(self::class, "language must match $regex pattern");
        }
        $this->language = strtolower($language);
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}
