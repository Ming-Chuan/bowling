<?php
class bowling {
	public function countScore($scores) {
		$total 	= 0;
		$round 	= 1;
		$ball	= 0;
		$roundScore 	= 0;

		$arrayCnt 	= count($scores);
		if ($arrayCnt < 12 || $arrayCnt > 21) {
			throw new LengthException();
		}

		foreach ($scores as $index => $score) {
			if ($round > 10) { 
				break;
			}

			$next1 	= $scores[$index + 1];
			$next2 	= $scores[$index + 2];

			$this->checkNumeric($score);

			$ball++;
			if ($ball == 1 && $score == 10) { // strike
				$this->checkNumeric($next1);
				$this->checkNumeric($next2);
				$total 	= $total + $score + $next1 + $next2;
				$round++;
				// clean
				$ball = 0;
			} elseif ($ball == 2 && ($roundScore + $score) == 10) { // spare
				$this->checkNumeric($next1);
				$total 	= $total + $roundScore + $score + $next1;
				$round++;
				// clean
				$ball 	= 0;
				$roundScore = 0;
			} elseif ($ball == 2) { // no spare
				$total 	= $total + $roundScore + $score;
				
				$round++;
				// clean
				$ball 	= 0;
				$roundScore = 0;
			} else { // ball 1
				$roundScore = $score;
			}
		}
		return $total;
	}

	private function checkNumeric($val) {
		if (is_numeric($val) === false) {
			throw new InvalidArgumentException();
		}
	}
}