<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/Shadowss/Travianz/>
 *
 * Authors: yi12345 <https://github.com/martinambrus>
 * ronix <http://forum.ragezone.com/members/833088.html>
 * Advocaite <https://github.com/advocaite>
 * Shadow <https://github.com/shadowss>
 * Mr.php <https://github.com/mrphp>
 * brainiacX <https://github.com/brainiacX>
 * InCube <http://forum.ragezone.com/members/1333458070.html>
 * martinambrus <https://github.com/martinambrus>
 * iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/Shadowss/Travianz/blob/master/LICENSE>
 *
 * Copyright 2010-2018 Travianz Team
 */
namespace Travianz\Database;

use Travianz\Utils\Math;
use Travianz\Utils\Generator;
use Travianz\Village\Units;
use Travianz\Village\Technology;

final class Database implements IDbConnection
{
	/**
	 * @var string MySQL server hostname to connect to.
	 */
	private $hostname = 'localhost';

	/**
	 * @var int MySQL server port to connect to.
	 */
	private $port = 3306;

	/**
	 * @var string Username to authenticate with to the MySQL connection.
	 */
	private $username = 'root';

	/**
	 * @var string Password to authenticate with to the MySQL connection.
	 */
	private $password = '';

	/**
	 * @var string Database to use with Travianz.
	 */
	private $dbname = 'travianz';

	/**
	 * @var int Counter of all SELECT queries performed.
	 */
	private $selectQueryCount = 0;

	/**
	 * @var int Counter of all INSERT queries performed.
	 */
	private $insertQueryCount = 0;

	/**
	 * @var int Counter of all UPDATE queries performed.
	 */
	private $updateQueryCount = 0;

	/**
	 * @var int Counter of all DELETE queries performed.
	 */
	private $deleteQueryCount = 0;

	/**
	 * @var int Counter of all REPLACE queries performed.
	 */
	private $replaceQueryCount = 0;

	/**
	 * @var int Counter of all queries performed.
	 */

	private $queriesCount = 0;

	/**
	 * @var Database The singleton instance.
	 */
	private static $instance;

	/**
	 * @var \mysqli The MySQLi object.
	 */
	public $mysqli;

	/**
	 * Constructor.
	 * Will initialize the connection to MySQLi
	 * and die on any error it would encounter.
	 *
	 * @example $db = new Database(SQL_SERVER, SQL_USER, SQL_PASS, SQL_DB);
	 *         
	 * @param string $hostname
	 *        	Hostname of the MySQLi server.
	 * @param string $username
	 *        	Username to be used to to connect.
	 * @param string $password
	 *        	Password to be used to to connect.
	 * @param string $dbname
	 *        	Name of the database to use.
	 * @param int $port
	 *        	[Optional] server port to connect to. Default: 3306
	 * @return void This method doesn't have a return value.
	 */
	protected function __construct($hostname, $username, $password, $dbname, $port = 3306) : void
	{
		$this->hostname = $hostname;
		$this->port = $port;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;

		if(!$this->connect())
		{
			die($this->mysqli->connect_error);
		}

		$this->queryNew("SET NAMES 'UTF8'");

		$database = $this;

		register_shutdown_function(function () use ($database)
		{
			$database->sendPendingMessages();
		});
	}

	/**
	 * Return the instanced database, using the singleton pattern.
	 *
	 * @return Database
	 */
	public static function getInstance(): IDbConnection
	{
		if(!isset(self::$instance))
		{
			self::$instance = new Database(SQL_SERVER, SQL_USER, SQL_PASS, SQL_DB);
		}

		return self::$instance;
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Database\IDbConnection::connect()
	 */
	public function connect() : bool
	{
		try
		{
			$this->mysqli = new \mysqli($this->hostname, $this->username, $this->password, $this->dbname, $this->port);
			return !$this->mysqli->connect_errno;
		}
		catch (\Exception $exception)
		{
			return false;
		}
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Database\IDbConnection::disconnect()
	 */
	public function disconnect() : bool
	{
		if($this->mysqli->close()) 
		{
			$this->mysqli = null;
			return true;
		}
		else return false;
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Database\IDbConnection::reconnect()
	 */
	public function reconnect() : bool
	{
		$this->disconnect();
		return $this->connect();
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Database\IDbConnection::queryNew()
	 */
	public function queryNew(string $statement, ...$params) : int
	{
		if(is_array($params[0])) $params = $params[0];

		if($prep = $this->mysqli->prepare($statement))
		{
			$isMultiQuery = false;

			preg_match('/[^AZ-az]*(\()?[^AZ-az]*SELECT/i', $statement, $this->selectQueryCount);
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*DELETE/i', $statement, $this->deleteQueryCount);
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*INSERT/i', $statement, $this->insertQueryCount);
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*REPLACE/i', $statement, $this->replaceQueryCount);
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*UPDATE/i', $statement, $this->updateQueryCount);

			if($isMultiQuery) $paramsArray = $params[0];
			else
			{
				$paramsArray = $params;
				$params = [$params];
			}

			$types = [];
			foreach ($paramsArray as $param)
			{
				$paramType = 's';
				if(Math::isInt($param)) $paramType = 'i';
				else if(Math::isFloat($param)) $paramType = 'd';

				$types[] = $paramType;
			}

			$implodedNames = [implode('', $types)];
			$outputValues = [];
			foreach ($params as $dataBatch)
			{
				$bind_names = $implodedNames;
				$dataBatchCount = count($dataBatch);
				for ($i = 0; $i < $dataBatchCount; $i++)
				{
					$bind_name = 'bind' . $i;
					$$bind_name = $dataBatch[$i];
					$bind_names[] = &$$bind_name;
				}

				if(count($paramsArray)) call_user_func_array([$prep, 'bind_param'], $bind_names);

				if($prep->execute())
				{
					if(count($this->selectQueryCount))
					{
						$this->selectQueryCount++;
						$queryResult = [];

						$resultMetaData = $prep->result_metadata();
						$stmtRow = [];
						$rowReferences = [];

						while ($field = $resultMetaData->fetch_field()) 
						{
							$rowReferences[] = &$stmtRow[$field->name];
						}
	
						$resultMetaData->free_result();

						call_user_func_array([$prep, 'bind_result'], $rowReferences);

						while ($prep->fetch())
						{
							$row = [];
							foreach ($stmtRow as $key => $value)
							{
								$row[$key] = $value;
							}

							$queryResult[] = $row;
						}

						$prep->free_result();
						$outputValues[] = $queryResult;
					}
					elseif(count($this->deleteQueryCount))
					{
						$outputValues[] = $prep->affected_rows;
					}
					elseif(count($this->insertQueryCount))
					{
						$outputValues[] = $prep->insert_id ? $prep->insert_id : $prep->affected_rows;
					}
					elseif(count($this->replaceQueryCount))
					{
						$outputValues[] = $prep->affected_rows;
					}
					elseif(count($this->replaceQueryCount))
					{
						$outputValues[] = $prep->affected_rows;
					}
					$this->queriesCount++;
				}
				else throw new \Exception('Failed to execute an SQL statement: ' . $this->mysqli->error);
				
			}
			// free the prepared statement
			$prep->close();
			// return the expected result
			if($this->queriesCount)
			{
				// if there is only a single result, return it alone
				if(count($outputValues) === 1) return $outputValues[0];
				else return $outputValues;
			}
		}
		else throw new \Exception('Failed to prepare an SQL statement! ' . $this->mysqli->error);
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Database\IDbConnection::isConnected()
	 */
	public function isConnected() : bool
	{
		return !is_null($this->mysqli);
	}

	/**
	 * Returns a string value safely escaped to be used in mysqli_query() method.
	 *
	 * @param $value string The value to sanitize.
	 *        	
	 * @return string Returns a sanitized string, safe for SQL queries.
	 */
	public function escape($value) : string
	{
		if(is_string($value))
		{
			$value = stripslashes($value);
			return $this->mysqli->real_escape_string($value);
		}
		else return $value;
	}

	/**
	 * Returns a list of safely escaped values which can be used to re-retrieve
	 * them in a list() method.
	 *
	 * @example list($username, $password) = $database->escape_input($username, $password);
	 *         
	 * @return array Returns an array with all items sanitized and safe to be used in SQL statements.
	 */
	public function escape_input() : array
	{
		$argumentsCount = func_num_args();
		$argumentList = func_get_args();
		$escapedInputsArray = [];

		for ($i = 0; $i < $argumentsCount; $i++)
		{
			if(is_string($argumentList[$i]))
			{
				$argumentList[$i] = stripslashes($argumentList[$i]);
				$escapedInputsArray[] = $this->mysqli->real_escape_string($argumentList[$i]);
			}
			else $escapedInputsArray[] = $argumentList[$i];
		}

		return $escapedInputsArray;
	}
}
