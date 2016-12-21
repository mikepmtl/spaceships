<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: TemplateTest.php
 */



use Core\Template;



class Test_Core_Template extends PHPUnit_Framework_TestCase
{


	public function testModelInstantiation(){

		$template = new Template();
		$this->assertInstanceOf('Core\\Template', $template, 'Unable to instantiate Core\\Template instance');

	}


	public function testSetTemplateVar(){

		$text = "THIS IS MY VAR";

		$template = new Template();
		$template->__set('my_var', $text);
		$value = $template->__get('my_var');

		$this->assertEquals( $text, $value, 'Template var not the same value as set.');

	}



}