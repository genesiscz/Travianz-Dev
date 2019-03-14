<?php

if (! function_exists('round_with_precision')) {
    function round_with_precision($number, int $precision): int
    {
        return $precision * round($number / $precision);
    }
}
