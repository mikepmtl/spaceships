<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: Input.php
 */


namespace Core;


/**
 * Class Input - Retrieve Input variables from Super globals
 *
 * @package Core
 */
class Input{


	/**
	 *
	 * Retrieve a GET variable, if it does not exists return default value or null.
	 *
	 * @param      $name
	 * @param mixed $default
	 * @param array $global - We allow to pass a global for UnitTesting.
	 *
	 * @return null | mixed
	 */
	public static function get($name, $default=null, $global=null){

		if($global===null){
			$global = $_GET;
		}

		if( isset( $global[$name] ) ){
			return $global[$name];
		} else {
			return $default;
		}

	}


}