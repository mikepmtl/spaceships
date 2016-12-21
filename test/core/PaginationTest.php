<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: PaginationTest.php
 */



use Core\Pagination;



class Test_Core_Pagination extends PHPUnit_Framework_TestCase
{


	public function testModelInstantiation(){

		$pagination = new Pagination();
		$this->assertInstanceOf('Core\\Pagination', $pagination, 'Unable to instantiate Core\\Pagination instance');

	}


	public function testPaginationCreateLinks(){

		$params = [ 'total_items' => 0, 'per_page' => 10, 'current_page' => 1, 'base_url' => 'http://www.mysite.com/' ];
		$pagination = new Pagination($params);
		$this->assertEquals('', $pagination->createLinks(), 'Pagination did not return empty string for 0 total items');

		$params = [ 'total_items' => 35, 'per_page' => 40, 'current_page' => 1, 'base_url' => 'http://www.mysite.com/' ];
		$pagination = new Pagination($params);
		$this->assertEquals('', $pagination->createLinks(), 'Pagination did not return empty string for 0 total items');

		$params = [ 'total_items' => 35, 'per_page' => 10, 'current_page' => 1, 'base_url' => 'http://www.mysite.com/' ];
		$pagination = new Pagination($params);
		$this->assertRegexp( '/<li><a href="http:\/\/www.mysite.com\/3">3<\/a><\/li>/', $pagination->createLinks(), 'Pagination did not return expected html' );

	}


}