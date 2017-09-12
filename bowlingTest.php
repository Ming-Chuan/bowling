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
		$scores = array(2, 8, // 12
						2, 8, // 12
						2, 8, // 12
						2, 8, // 12
						2, 8, // 12
						2, 8, // 12
						2, 8, // 12
						2, 8, // 12
						2, 8, // 12
						2, 8, // 12
						2);
		$expect	= 120;
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert
		return 	$this->assertEquals($expect, $result); 
	}

	public function test_normal_case() {
		// arrange
		$scores = array(2, 8, // 17
						7, 3, // 20
						10, // 22
						10, // 17
						2, 5, // 7
						6, 4, // 12
						2, 8, // 20
						10, // 16
						3, 3, // 6
						10, // 27
						7, // extra
						10); // extra
		$expect	= 164;
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert
		return 	$this->assertEquals($expect, $result); 
	}
}