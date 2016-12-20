<?php


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use App\Controllers\Home;


class Test_Home extends PHPUnit_Framework_TestCase
{


	public function testGetHomePage(){

		$this->assertRegexp('/Starships/', Home::index());

	}



}
