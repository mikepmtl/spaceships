<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 */


namespace Core\Exceptions;


/**
 * Class ExceptionCacheInvalidUrl - Thrown when invalid URL is past in params.
 *
 * @package Core\Exceptions
 */
class ExceptionCacheInvalidUrl extends \Exception
{

	public function __construct($message = "Invalid URL", $code = 0, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}


}

