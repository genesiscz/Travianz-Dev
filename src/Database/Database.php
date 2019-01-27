<?php

/*
 * This file is part of the Travianz Project
 *
 * Source code: <https://github.com/iopietro/Travianz/>
 *
 * Authors: martinambrus <https://github.com/martinambrus>
 *          iopietro <https://github.com/iopietro>
 *
 * License: GNU GPL-3.0 <https://github.com/iopietro/Travianz/blob/master/LICENSE>
 *
 * Copyright 2019 Travianz Team
 */

namespace Travianz\Database;

use Travianz\Utils\Math;
use Travianz\Config\Config;

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
	 * Initialize the connection to MySQLi and return an exception on any error it would encounter.
	 *
	 * @example $db = new Database(SQL_SERVER, SQL_USER, SQL_PASS, SQL_DB);
	 *         
	 * @param string $hostname Hostname of the MySQLi server.
	 * @param string $username Username to be used to to connect.
	 * @param string $password Password to be used to to connect.
	 * @param string $dbname Name of the database to use.
	 * @param int $port [Optional] server port to connect to. Default: 3306
	 * @return void This method doesn't have a return value.
	 */
	protected function __construct($hostname, $username, $password, $dbname, $port = 3306)
	{
		$this->hostname = $hostname;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
		$this->port = $port;

		if(!$this->connect()) throw new \ErrorException($this->mysqli->connect_error);

		$this->query("SET NAMES 'UTF8'");
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
			self::$instance = new Database(Config::SQL_HOSTNAME, Config::SQL_USER, Config::SQL_PASS, Config::SQL_DB, Config::SQL_PORT);
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
	 * @see \Travianz\Database\IDbConnection::isConnected()
	 */
	public function isConnected() : bool
	{
		return !is_null($this->mysqli);
	}

	/**
	 * {@inheritdoc}
	 * @see \Travianz\Database\IDbConnection::queryNew()
	 */
	public function query(string $statement, ...$params)
	{
		if(isset($params[0]) && is_array($params[0])) $params = $params[0];

		if($prep = $this->mysqli->prepare($statement))
		{
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*SELECT/i', $statement, $this->selectQueryCount);
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*DELETE/i', $statement, $this->deleteQueryCount);
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*INSERT/i', $statement, $this->insertQueryCount);
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*REPLACE/i', $statement, $this->replaceQueryCount);
			preg_match('/[^AZ-az]*(\()?[^AZ-az]*UPDATE/i', $statement, $this->updateQueryCount);

			$paramsArray = $params;
			$params = [$params];

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

			$prep->close();

			if($this->queriesCount)
			{
				if(count($outputValues) === 1) return $outputValues[0];
				else return $outputValues;
			}
		}
		else throw new \Exception('Failed to prepare an SQL statement! ' . $this->mysqli->error);
	}

	/**
	 * {@inheritDoc}
	 * @see \Travianz\Database\IDbConnection::multiQuery()
	 */
	public function multiQuery(string $statement) : void
	{
		$this->mysqli->multi_query($statement);

		while ($this->mysqli->next_result());
	}
}
