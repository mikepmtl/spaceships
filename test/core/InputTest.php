<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 */


use Core\Input;


class Test_Input extends PHPUnit_Framework_TestCase
{


	public $globals = ['name'=>'Mike', 'eyes'=>'blue', 'children'=>1];


	public function testInputDefaultValues(){

		$num_motorcycles = Input::get('num_motorcycles', 15, $this->globals);
		$this->assertEquals(15, $num_motorcycles, "Did not receive default value from Input::get");

		$name = Input::get('name', null, $this->globals);
		$this->assertEquals('Mike', $name, "Unable to retrieve Input::get value");

	}



}
