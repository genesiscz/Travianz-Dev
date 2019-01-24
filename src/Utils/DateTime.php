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
	const DEFAULT_DATE_FORMAT = 'Y-m-d H:i:s';

	/**
	 * @var string The default timezone
	 */
	const DEFAULT_TIME_ZONE = 'Europe/Rome';

	/**
	 * Subs Years, Months, Days, Hours, Minutes, Seconds, etc. to a specified date
	 * 
	 * Note: The "P" char doesn't need to be written as a first letter of the $dateTime argument
	 * 
	 * Supported commands: <http://php.net/manual/en/dateinterval.construct.php>
	 * 
	 * @param string $inteval The interval to be subtracted
	 * @return string Returns the resulting date
	 */
	public static function sub(string $inteval) : string
	{
		return (new \DateTime('now', new \DateTimeZone(self::DEFAULT_TIME_ZONE)))->sub(new \DateInterval('P' . $inteval))->format(self::DEFAULT_DATE_FORMAT);
	}
	
	/**
	 * Adds Years, Months, Days, Hours, Minutes, Seconds, etc. to a specified date
	 * 
	 * Note: The "P" char doesn't need to be written as a first letter of the $dateTime argument
	 * 
	 * Supported commands: <http://php.net/manual/en/dateinterval.construct.php>
	 * 
	 * @param string $inteval The interval to be added
	 * @return string Returns the resulting date
	 */
	public static function add(string $inteval) : string
	{
		return (new \DateTime('now', new \DateTimeZone(self::DEFAULT_TIME_ZONE)))->add(new \DateInterval('P' . $inteval))->format(self::DEFAULT_DATE_FORMAT);
	}
}
