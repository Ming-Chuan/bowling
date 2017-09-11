<?php
require_once 'bowling.php';
class bowlingTest extends PHPUnit_Framework_TestCase{
	public function test_all_miss() {
		// arrange
		$scores = array(0, 0,
						0, 0, 
						0, 0, 
						0, 0,
						0, 0,
						0, 0,
						0, 0,
						0, 0,
						0, 0,
						0, 0);
		$expect	= 0;
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert
		return 	$this->assertEquals($expect, $actual);
	}
}