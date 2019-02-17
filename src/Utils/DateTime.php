<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/iopietro/Travianz/>
 *
 * Author: iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/iopietro/Travianz/blob/master/LICENSE>
 *
 * Copyright 2019 Travianz Team
 */

namespace Travianz\Utils;

abstract class DateTime
{
	/**
	 * @var string The default date display format
	 */
	public const DEFAULT_DATE_FORMAT = 'Y-m-d H:i:s';

	/**
	 * @var string The default timezone
	 */
	public const DEFAULT_TIME_ZONE = 'Europe/Rome';
	
	/**
	 * @var string The default time
	 */
	public const DEFAULT_TIME = 'now';
	
	/**
	 * @var string The default time separator
	 */
	public const DEFAULT_TIME_SEPARATOR = ':';

	/**
	 * Subs Years, Months, Days, Hours, Minutes, Seconds, etc. to a specified date
	 * 
	 * Note: The "P" char doesn't need to be written as a first letter of the $dateTime argument
	 * 
	 * Supported commands: <http://php.net/manual/en/dateinterval.construct.php>
	 * 
	 * @param string $interval The interval to be subtracted
	 * @param string $date The date to be subtracted
	 * @return string Returns the resulting date
	 */
	public static function sub(string $interval, string $date = self::DEFAULT_TIME) : string
	{
		return self::get($date)->sub(new \DateInterval('P' . $interval))->format(self::DEFAULT_DATE_FORMAT);
	}
	
	/**
	 * Adds Years, Months, Days, Hours, Minutes, Seconds, etc. to a specified date
	 * 
	 * Note: The "P" char doesn't need to be written as a first letter of the $dateTime argument
	 * 
	 * Supported commands: <http://php.net/manual/en/dateinterval.construct.php>
	 * 
	 * @param string $interval The interval to be added
	 * @param string $date The date to be added
	 * @return string Returns the resulting date
	 */
	public static function add(string $interval, string $date = self::DEFAULT_TIME) : string
	{
		return self::get($date)->add(new \DateInterval('P' . $interval))->format(self::DEFAULT_DATE_FORMAT);
	}
	
	/**
	 * Get the actual datetime
	 * 
	 * @return string Returns the actual datetime
	 */
	public static function now() : string
	{
		return self::get()->format(self::DEFAULT_DATE_FORMAT);
	}
	
	/**
	 * Get the actual unix timestamp
	 * 
	 * @return int Returns the unix timestamp
	 */
	public static function getTimestamp() : int
	{
		return self::get()->getTimestamp();
	}
	
	/**
	 * Get a DateTime object
	 * 
	 * @param string $time The time
	 * @param string $timeZone The timezone
	 * @return \DateTime Returns the DateTime object with the specified time and timezone
	 */
	public static function get(string $time = self::DEFAULT_TIME, string $timeZone = self::DEFAULT_TIME_ZONE) : \DateTime
	{
		return new \DateTime($time, new \DateTimeZone($timeZone));
	}
	
	/**
	 * Convert seconds to a human readable timestamp
	 * 
	 * Credits: <https://stackoverflow.com/a/3172665>
	 * 
	 * @param int $seconds The input seconds
	 * @return string
	 */
	public static function secondsToTime(int $seconds, string $separator = self::DEFAULT_TIME_SEPARATOR): string
	{
		return sprintf("%02d%s%02d%s%02d", floor($seconds / 3600), $separator, ($seconds / 60) % 60, $separator, $seconds % 60);
	}
}
