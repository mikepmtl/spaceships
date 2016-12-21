<?php


use Core\Cache;
use \Core\Exceptions\ExceptionCacheInvalidURL;


class Test_Cache extends PHPUnit_Framework_TestCase
{


	public function testModelInstantiation(){

		$cache = new Cache();
		$this->assertInstanceOf('Core\Cache', $cache, 'Unable to instantiate Cache instance');

	}

	public function testFailOnBadURL(){

		$url = "ht://doesnot.work";
		$cache = new Cache();

		$this->setExpectedException( ExceptionCacheInvalidUrl::class );

		try{
			$cache->getCache($url);
		} catch (ExceptionCacheInvalidURL $e){
			$this->assertContains('Invalid URL', $e->getMessage());
			throw $e;
		}

	}


	public function testDoesNotHaveValidCache() {

		$method = new \ReflectionMethod('\\Core\\Cache', 'hasValidCache');
		$method->setAccessible(true);

		$result = $method->invoke( new Cache(), 'THISWILLNOTEXIST');
		$this->assertFalse($result);

	}



}
