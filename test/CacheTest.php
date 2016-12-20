<?php


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use \Core\Exceptions\ExceptionCacheInvalidURL;


class Test_Cache extends PHPUnit_Framework_TestCase
{


	public function testModelInstantiation(){

		$cache = new Core\Cache();
		$this->assertInstanceOf('Core\Cache', $cache, 'Unable to instantiate Cache instance');

	}

	public function testFailOnBadURL(){

		$url = "ht://doesnot.work";
		$cache = new Core\Cache();

		$this->setExpectedException( ExceptionCacheInvalidUrl::class );

		try{
			$cache->getCache($url);
		} catch (ExceptionCacheInvalidURL $e){
			$this->assertContains('Invalid URL', $e->getMessage());
			throw $e;
		}

	}



}
