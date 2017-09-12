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
		return 	$this->assertEquals($expect, $result);
	}

	public function test_no_stike_no_spare() {
		// arrange
		$scores = array(1, 1,
						1, 1, 
						1, 1,
						1, 1,
						1, 1,
						1, 1,
						1, 1,
						1, 1,
						1, 1,
						1, 1);
		$expect	= 20;
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert
		return 	$this->assertEquals($expect, $result);
	}

	public function test_all_strike() {
		// arrange
		$scores = array(10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10);
		$expect	= 300;
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert
		return 	$this->assertEquals($expect, $result);	
	}

	public function test_all_spare() {
		// arrange
		$scores = array(2, 8,
						2, 8,
						2, 8,
						2, 8,
						2, 8,
						2, 8,
						2, 8,
						2, 8,
						2, 8,
						2, 8,
						2);
		$expect	= 120;
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert
		return 	$this->assertEquals($expect, $result); 
	}
}