<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: SpaceshipResponse.php
 */


namespace App\Models;


/**
 *
 * Class SpaceshipResponse - The API Response for Spaceships
 *
 * @package App\Models
 */
class SpaceshipResponse{


	public $count = 0;
	public $next = null;
	public $previous = null;
	public $results = [];


	public function __construct( $count=0, $next='', $previous='', $results=[] ) {

		$this->count = $count;
		$this->next = $next;
		$this->previous = $previous;

		foreach ($results as $spaceship){
			$this->results[] = Spaceship::createFromStdObject($spaceship);
		}

	}


	/**
	 *
	 * create a SpaceshipResponse Model from a JSON string.
	 *
	 * @param $jsonString
	 *
	 * @return \App\Models\SpaceshipResponse
	 */
	public static function createFromJson( $jsonString )
	{
		$object = json_decode( $jsonString, false );
		return new self(
			$object->count,
			$object->next,
			$object->previous,
			$object->results
		);
	}


}

