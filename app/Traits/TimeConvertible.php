<?php

namespace App\Traits;

trait TimeConvertible
{
    /**
     * Convert seconds to a human readable time string
     *
     * @param int $seconds
     * @param string $separator
     * @return string
     */
	public static function secondsToTimeString(int $seconds, string $separator = ':'): string
	{
	    if ($seconds < 0) $seconds = 0;

		return sprintf("%02d%s%02d%s%02d", floor($seconds / 3600), $separator, ($seconds / 60) % 60, $separator, $seconds % 60);
	}
}

