<?php

namespace AndrewGos\TelegramBot\Helper;

use Traversable;

class HArray
{
    /**
     * Index array by key or callable
     * @template T
     * @template Key of string|int
     *
     * @param iterable<T> $array
     * @param string|int|(callable(T): Key) $key if callable, then must have signature: callable(array-element-type): string|int
     *
     * @return T[]
     */
    public static function index(iterable $array, string|int|callable $key): array
    {
        if ($array instanceof Traversable) {
            $array = iterator_to_array($array);
        }

        $key = is_callable($key)
            ? $key
            : fn($el) => $el[$key] ?? null;

        $result = [];
        foreach ($array as $i => $el) {
            $result[$key($el)] = $el;
        }
        return $result;
    }

    /**
     * Group array elements by key or keys if key is array
     * @template T
     * @template Key
     *
     * @param iterable<T>|array<Key, T>|T[] $array
     * @param string|int|callable|(int|string|callable)[] $key
     * @param bool $preserveKeys
     *
     * @return ($key is array ? array : array<Key, T[]>|array)
     */
    public static function group(iterable $array, string|int|callable|array $key, bool $preserveKeys = true): array
    {
        if ($array instanceof Traversable) {
            $array = iterator_to_array($array);
        }

        $keyToCallable = fn($k) => is_callable($k)
            ? $k
            : fn($el) => $el[$k] ?? null;

        $key = (array) $key;

        $result = [];
        foreach ($array as $i => $el) {
            $currentResultEl = &$result;
            foreach ($key as $k) {
                $k = $keyToCallable($k)($el);
                $currentResultEl[$k] ??= [];
                $currentResultEl = &$currentResultEl[$k];
            }
            if ($preserveKeys) {
                $currentResultEl[$i] = $el;
            } else {
                $currentResultEl[] = $el;
            }
        }
        return $result;
    }

    /**
     * Group array elements by key or keys if key is array
     * @template T
     *
     * @param iterable<T>|array<int|string, T>|T[] $array
     * @param string|int|callable|(int|string|callable)[] $key
     * @param string|int|callable $index if callable, then must have signature: callable(array-element-type): string|int
     *
     * @return ($key is array ? array : array<int|string, T[]>|array)
     */
    public static function groupIndexing(iterable $array, string|int|callable|array $key, string|int|callable $index): array
    {
        if ($array instanceof Traversable) {
            $array = iterator_to_array($array);
        }

        $keyToCallable = fn($k) => is_callable($k)
            ? $k
            : fn($el) => $el[$k] ?? null;
        $key = (array) $key;


        $index = is_callable($index)
            ? $index
            : fn($el) => $el[$index] ?? null;

        $result = [];
        foreach ($array as $i => $el) {
            $currentResultEl = &$result;
            foreach ($key as $k) {
                $k = $keyToCallable($k)($el);
                $currentResultEl[$k] ??= [];
                $currentResultEl = &$currentResultEl[$k];
            }
            $currentResultEl[$index($el)] = $el;
        }
        return $result;
    }

    /**
     * Группирует массив по ключу(ам),
     * если надо, индексирует элементы по индексу \$index и,
     * если надо, проецирует элементы используя функцию \$projection.
     *
     * Если необходимо переиндексировать ключи элементов, то \$preserveKeys должен быть равен false.
     * Если \$preserveKeys равен false, то \$index принудительно устанавливается в null, чтобы избежать лишних вычислений
     *
     * Если некоторые элементы могут не содержать значения по ключу \$index, то можно передать значение по умолчанию \$defaultIndex
     *
     * Примеры использования:
     * 1. Простая группировка по ключу:
     * ```
     * $array = ['one' => 1, 'two' => 2, 'three' => 3];
     * $array = HArray::groupExtended(
     *      $array,
     *      fn($el) => $el % 2 === 0 ? 'even' : 'odd',
     * );
     * // $array = ['odd' => ['one' => 1, 'three' => 3], 'even' => ['two' => 2]]
     * ```
     * 2. Группировка по ключу и индексирование элементов:
     * ```
     * $array = ['one' => 1, 'two' => 2, 'three' => 3];
     * $array = HArray::groupExtended(
     *      $array,
     *      fn($el) => $el % 2 === 0 ? 'even' : 'odd',
     *      fn($el) => "value_$el",
     * );
     * // $array = ['odd' => ['value_1' => 1, 'value_3' => 3], 'even' => ['value_2' => 2]]
     * ```
     * 3. Группировка по ключу и индексирование элементов с проекцией:
     * ```
     * $array = ['one' => 1, 'two' => 2, 'three' => 3];
     * $array = HArray::groupExtended(
     *      $array,
     *      fn($el) => $el % 2 === 0 ? 'even' : 'odd',
     *      fn($el) => "value_$el",
     *      fn($el) => $el * 2,
     * );
     * // $array = ['odd' => ['value_1' => 2, 'value_3' => 6], 'even' => ['value_2' => 4]]
     * ```
     * 4. Группировка по ключу со сбрасыванием ключей вложенных массивов:
     * ```
     * $array = ['one' => 1, 'two' => 2, 'three' => 3];
     * $array = HArray::groupExtended($array, fn($el) => $el % 2 === 0 ? 'even' : 'odd', preserveKeys: false);
     * // $array = ['odd' = [1, 3], 'even' => [2]]
     * ```
     * 5. Группировка с передачей ключа в функцию группировки:
     * ```
     * $array = ['one' => 1, 'two' => 2, 'three' => 3];
     * $array = HArray::groupExtended(
     *      $array,
     *      fn($el, $k) => $k,
     * );
     * // $array = ['one' => ['one' => 1], 'two' => ['two' => 2], 'three' => ['three' => 3]]
     * ```
     * 6. Группировка по ключу вложенного массива:
     * ```
     * $array = ['one' => ['id' => 1, 'value' => 1], 'two' => ['id' => 2, 'value' => 2], 'three' => ['id' => 3, 'value' => 3]];
     * $array = HArray::groupExtended(
     *      $array,
     *      'value',
     * );
     * // $array = ['1' => ['one' => ['id' => 1, 'value' => 1]], '2' => ['two' => ['id' => 2, 'value' => 2]], '3' => ['three' => ['id' => 3, 'value'
     * => 3]]]
     * ```
     * 7. Группировка по ключу вложенного массива с использованием индекс по умолчанию:
     * ```
     * $array = ['one' => ['id' => 1, 'value' => 4], 'two' => ['id' => 2, 'value' => 5], 'three' => ['id' => 3]];
     * $array = HArray::groupExtended(
     *      $array,
     *      'value',
     *      'id',
     * );
     * // $array = ['4' => ['one' => ['id' => 1, 'value' => 4]], '5' => ['two' => ['id' => 2, 'value' => 5]], '3' => ['three' => ['id' => 3]]]
     * ```
     *
     * @template T
     * @template TKey of int|string
     * @template TResKey of int|string
     * @template TProj
     * @template TKeyFunc of callable(T, TKey=): TResKey
     *
     * @param iterable<T>|array<TKey, T>|T[] $array
     * @param TKey|TKeyFunc|(TKey|TKeyFunc)[] $key
     * @param TKey|(callable(T, TKey=): TResKey)|null $index
     * @param (callable(T, TKey=): TProj)|null $projection
     * @param bool $preserveKeys если необходимо сбросить ключи вложенных массивов, то надо установить в true
     * @param TResKey|null $defaultIndex значение для индекса по умолчанию
     *
     * @return ($projection is null
     *      ? ($key is array ? array : ($preserveKeys is false ? T[][] : array<TResKey, T[]>))
     *      : ($key is array ? array : ($preserveKeys is false ? TProj[][] : array<TResKey, TProj[]>)))
     */
    public static function groupExtended(
        iterable $array,
        int|string|callable|array $key,
        int|string|callable|null $index = null,
        ?callable $projection = null,
        bool $preserveKeys = true,
        int|string|null $defaultIndex = null,
    ): array {
        // Если $array это итератор, то преобразовываем его в массив
        if ($array instanceof Traversable) {
            $array = iterator_to_array($array);
        }

        $keyToCallable = fn($k) => is_callable($k)
            ? $k
            : fn($el) => $el[$k] ?? null;
        // Принудительно преобразовываем $key в массив
        $key = (array) $key;

        // Принудительно сбрасываем индекс, если необходимо сбросить ключи вложенных массивов
        if ($preserveKeys) {
            if ($index !== null) {
                $index = is_callable($index)
                    ? $index
                    : fn($el) => $el[$index] ?? ($defaultIndex !== null ? ($el[$defaultIndex] ?? null) : null);
            }
        } else {
            $index = null;
        }

        // Если $projection не передана, то присваиваем ей значение по умолчанию
        $projection ??= fn($el) => $el;

        $result = [];
        foreach ($array as $i => $el) {
            $currentResultEl = &$result;
            foreach ($key as $k) {
                $k = $keyToCallable($k)($el);
                $currentResultEl[$k] ??= [];
                $currentResultEl = &$currentResultEl[$k];
            }
            if ($preserveKeys) {
                if ($index === null) {
                    $currentResultEl[$i] = $projection($el);
                } else {
                    $currentResultEl[$index($el)] = $projection($el);
                }
            } else {
                $currentResultEl[] = $projection($el);
            }
        }
        return $result;
    }

    /**
     * Indexing with projection
     *
     * @template T
     * @template Key
     * @template Proj
     *
     * @param iterable<T> $array
     * @param string|int|callable(T): Key $key
     * @param callable(T): Proj $projection
     *
     * @return array<Key, Proj>
     */
    public static function indexExtended(
        iterable $array,
        string|int|callable $key,
        callable $projection,
    ): array {
        if ($array instanceof Traversable) {
            $array = iterator_to_array($array);
        }

        $key = is_callable($key)
            ? $key
            : fn($el) => $el[$key] ?? null;

        $result = [];
        foreach ($array as $i => $el) {
            $result[$key($el)] = $projection($el);
        }
        return $result;
    }

    /**
     * @param array $array
     * @param callable|null $callable
     * @param int $mode
     *
     * @return array
     */
    public static function filterRecursive(array $array, ?callable $callable = null, int $mode = 0): array
    {
        $filterFunc = function (array $value) use (&$filterFunc, &$callable, &$mode) {
            $value = array_filter($value, $callable, $mode);
            array_walk(
                $value,
                function (&$val) use (&$filterFunc, &$callable, &$mode) {
                    if (is_array($val)) {
                        $val = $filterFunc($val);
                    }
                },
            );
            return $value;
        };
        return $filterFunc($array);
    }
}
