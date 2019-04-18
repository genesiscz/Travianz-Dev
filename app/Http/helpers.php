<?php

if (! function_exists('round_with_precision')) {
    function round_with_precision($number, int $precision): int
    {
        return $precision * round($number / $precision);
    }
}

if (! function_exists('get_name_from_class')) {
    function get_name_from_class(object $class): ?string
    {
        if (is_object($class)) return strtolower(preg_replace('/\B([A-Z])/', '_$1', class_basename($class)));

        return null;
    }
}
