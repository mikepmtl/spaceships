<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: Spaceship.php
 */


namespace App\Models;


use \NumberFormatter;


/**
 * Class Spaceship - The Spaceship Model
 *
 * @package App\Models
 */
class Spaceship {


	public $name;
	public $model;
	public $manufacturer;
	public $cost_in_credits;
	public $length;
	public $max_atmosphering_speed;
	public $crew;
	public $passengers;
	public $cargo_capacity;
	public $consumables;
	public $hyperdrive_rating;
	public $MGLT;
	public $starship_class;
	public $pilots = [];
	public $films = [];
	public $created;
	public $edited;
	public $url;
	public $image_path;


	public function __construct(
		$name='',
		$model='',
		$manufacturer='',
		$cost_in_credits='',
		$length='',
		$max_atmosphering_speed='',
		$crew='',
		$passengers='',
		$cargo_capacity='',
		$consumables='',
		$hyperdrive_rating='',
		$MGLT='',
		$starship_class=[],
		$pilots=[],
		$created= '',
		$edited='',
		$url=''
	) {
		$this->name = $name;
		$this->model = $model;
		$this->manufacturer = $manufacturer;
		$this->cost_in_credits = $cost_in_credits;
		$this->length = self::formatNumber($length);
		$this->max_atmosphering_speed = $max_atmosphering_speed;
		$this->crew = self::formatNumber($crew);
		$this->passengers = self::formatNumber($passengers);
		$this->cargo_capacity = $cargo_capacity;
		$this->consumables = $consumables;
		$this->hyperdrive_rating = $hyperdrive_rating;
		$this->MGLT = $MGLT;
		$this->starship_class = $starship_class;
		$this->pilots = $pilots;
		$this->created = $created;
		$this->edited = $edited;
		$this->url = $url;
		$this->image_path = $this->nameToImagePath();
	}


	/**
	 *
	 * Create a Spaceship model form a JSON string
	 *
	 * @param $jsonString
	 *
	 * @return \App\Models\Spaceship
	 */
	public static function createFromJson( $jsonString )
	{
		$object = json_decode( $jsonString, false );
		return new self(
			$object->name,
			$object->model,
			$object->manufacturer,
			$object->cost_in_credits,
			$object->length,
			$object->max_atmosphering_speed,
			$object->crew,
			$object->passengers,
			$object->cargo_capacity,
			$object->consumables,
			$object->hyperdrive_rating,
			$object->MGLT,
			$object->starship_class,
			$object->pilots,
			$object->created,
			$object->edited,
			$object->url
		);
	}


	/**
	 *
	 * Create a Spaceship model from a StdObject
	 *
	 * @param $object
	 *
	 * @return \App\Models\Spaceship
	 */
	public static function createFromStdObject( $object )
	{
		return new self(
			$object->name,
			$object->model,
			$object->manufacturer,
			$object->cost_in_credits,
			$object->length,
			$object->max_atmosphering_speed,
			$object->crew,
			$object->passengers,
			$object->cargo_capacity,
			$object->consumables,
			$object->hyperdrive_rating,
			$object->MGLT,
			$object->starship_class,
			$object->pilots,
			$object->created,
			$object->edited,
			$object->url
		);
	}


	/**
	 *
	 * Return the path of the spaceship image from the spaceship name
	 *
	 * @return string
	 */
	private function nameToImagePath(){

		// Make lowercase
		$lower = strtolower($this->name);

		// Replace anything not a letter with "-"
		$stripped = preg_replace("![^a-z0-9]+!i", "-", $lower);

		$file = "/assets/img/starships/" . $stripped  . ".png";

		if ( file_exists( HTTP_DOC_DIR . $file )){
			return $file;
		} else {
			return "/assets/img/starships/no_image_available.png";
		}

	}


	/**
	 *
	 * Format a number to en-US  - This should really be in some Utils class!!!!
	 *
	 * @param $number
	 *
	 * @return string
	 */
	private function formatNumber($number){

		if(!is_numeric($number)){
			return $number;
		}

		$len = strlen($number);
		$decimals = strrpos($number, '.');
		if($decimals){
			$dec_point = $len - ($decimals + 1);
		} else {
			$dec_point = 0;
		}

		return number_format($number, $dec_point);

	}






}

