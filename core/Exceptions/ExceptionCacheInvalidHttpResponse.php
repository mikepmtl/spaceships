<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 */


namespace Core\Exceptions;


/**
 * Class ExceptionCacheInvalidHttpResponse - Thrown when we receive an transport error from the API.
 *
 * @package Core\Exceptions
 */
class ExceptionCacheInvalidHttpResponse extends \Exception
{

	public function __construct($message = "Error Response from Server", $code = 0, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}


}

