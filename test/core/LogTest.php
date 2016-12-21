<?php


use Core\Log;


class Test_Log extends PHPUnit_Framework_TestCase
{



	public function testLogModelInstantiation(){

		$logger= Log::getInstance();
		$this->assertInstanceOf('Core\\Log', $logger, 'Unable to get Log instance');

	}


	public function testLogInfo(){

		$result = Log::info("Running PHPUnit Test for Log::info");
		$this->assertTrue($result,  'Log::info did not return true');

	}


	public function testConstructPrivate(){

		$method = new \ReflectionMethod('\\Core\\Log', '__construct');
		$result = $method->isPrivate();
		$this->assertTrue( $result, "Log __construct is not private. Singleton not guaranteed.");

	}


	public function testClonePrivate(){

		$method = new \ReflectionMethod('\\Core\\Log', '__clone');
		$result = $method->isPrivate();
		$this->assertTrue( $result, "Log __clone is not private. Singleton not guaranteed.");

	}


	public function testWakeupPrivate(){

		$method = new \ReflectionMethod('\\Core\\Log', '__wakeup');
		$result = $method->isPrivate();
		$this->assertTrue( $result, "Log __wakeup is not private. Singleton not guaranteed.");

	}


}
