<?php

namespace AndrewGos\TelegramBot\Helper;

class HArray
{
    /**
     * Фильтруем массив рекурсивно
     *
     * @param array $array
     * @param callable|null $callable
     * @param int $mode
     *
     * @return array
     */
    public static function filterRecursive(array $array, callable|null $callable = null, int $mode = 0): array
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
