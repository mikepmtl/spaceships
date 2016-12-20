<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: SpaceshipTest.php
 */


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use App\Models\Spaceship;


class Test_Spaceship extends PHPUnit_Framework_TestCase
{


	public function testSpaceshipModelInstantiation(){

		$spaceship = new Spaceship();
		$this->assertInstanceOf('App\Models\Spaceship', $spaceship, 'Unable to instantiate Spaceship instance');

	}



	public function testSpaceshipNameToImage(){

		$name = "Sentinel-class landing craft";
		$spaceship = new Spaceship($name);
		$this->assertEquals('/assets/img/starships/sentinel-class-landing-craft.png', $spaceship->image_path, 'Spaceship image name unexpected ');

		$name = "Unknown Spaceship";
		$spaceship = new Spaceship($name);
		$this->assertEquals('/assets/img/starships/no_image_available.png', $spaceship->image_path, 'Missing spaceship image not returned');

	}



}
