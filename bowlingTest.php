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

	public function test_abnormal_number() {
		// arrange
		$scores = array(2, 8, // 17
						7, 3, // 20
						'a', // abnormal value, should throw exception
						10, // 17
						2, 5, // 7
						6, 4, // 12
						2, 8, // 20
						10, // 16
						3, 3, // 6
						10, // 27
						7, // extra
						10); // extra
		$this->setExpectedException('InvalidArgumentException');
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert (phpunit auto check)
	}

	public function test_abnormal_extra_number() {
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
						'a'); // abnormal extra number
		$this->setExpectedException('InvalidArgumentException');
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert (phpunit auto check)
	}

	public function test_abnormal_score_cnt1() {
		// arrange
		$scores = array(1); // abnormal scores cnt
		$this->setExpectedException('LengthException');
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert (phpunit auto check)		
	}

	public function test_abnormal_score_cnt2() {
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
						1, 1,
						1, 1,
						1, 1,); // abnormal scores cnt
		$this->setExpectedException('LengthException');
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert (phpunit auto check)		
	}

	public function test_abnormal_score_type() {
		// arrange
		$scores 	= 123; // abnormal score type, should be array, but int
		$this->setExpectedException('InvalidArgumentException');
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert (phpunit auto check)		
	}

	public function test_abnormal_score_negative() {
		// arrange
		$scores = array(2, 8, // 17
						7, 3, // 20
						10, // 22
						10, // 17
						2, 5, // 7
						6, 4, // 12
						2, 8, // 20
						10, // 16
						-3, 3, // abnormal value, nagative
						10, // 27
						7, // extra
						10); // extra
		$this->setExpectedException('InvalidArgumentException');
		// act
		$bowling 	= new bowling();
		$result		= $bowling->countScore($scores);
		// assert (phpunit auto check)			
	}
}