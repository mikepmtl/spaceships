<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: Cache.php
 */


namespace Core;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;


/**
 * Class Log - A global log service
 *
 * @package Core
 */
class Log {


	private $log;


	/**
	 * Log constructor. - Create new logger using Monolog
	 */
	private function __construct() {
		$this->log = new Logger('postcardmania');
		$this->log->pushHandler( new StreamHandler( LOG_PATH . "/app.log", Logger::INFO));
	}


	/**
	 *
	 * Singleton usage only
	 *
	 * @return \Core\Log|null
	 */
	public static function getInstance()
	{
		static $inst = null;

		if ($inst === null) {
			$inst = new Log();
		}
		return $inst;
	}


	/**
	 *
	 * Log an info message
	 *
	 * @param string $message
	 *
	 * @return bool If the message was handle successfully
	 */
	public static function info($message=""){

		$logger = self::getInstance();
		return $logger->log->info($message);

	}


	/**
	 * Singleton usage only
	 */
	private function __clone() {
	}

	/**
	 * Singleton usage only
	 */
	private function __wakeup() {
	}


}