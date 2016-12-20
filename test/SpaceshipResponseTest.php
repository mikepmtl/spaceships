<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: SpaceshipResponseTest.php
 */


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use App\Models\SpaceshipResponse;


class Test_Spaceship_Response extends PHPUnit_Framework_TestCase
{

	public $data = [
		'count' => 37,
		'next'  => "http://swapi.co/api/starships/?page=2",
		'previous' => null,
		'results'  => []
	];

	public $response;

	public function setUp() {

		parent::setUp();

		$this->response = json_encode($this->data, JSON_FORCE_OBJECT);

	}


	public function testSpaceshipfromJSON(){


		$response = SpaceshipResponse::createFromJson($this->response);
		$this->assertInstanceOf('App\Models\SpaceshipResponse', $response, 'Unable to create SpaceshipResponse instance from JSON');

	}



}
