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

			if (is_numeric($score) === false) {
				throw new InvalidArgumentException();
			}

			$ball++;
			if ($ball == 1 && $score == 10) { // strike
				if (is_numeric($next1) === false || is_numeric($next2) === false) {
					throw new InvalidArgumentException();
				}
				$total 	= $total + $score + $scores[$index + 1] + $scores[$index + 2];
				$round++;
				// clean
				$ball = 0;
			} elseif ($ball == 2 && ($roundScore + $score) == 10) { // spare
				if (is_numeric($next1) === false) {
					throw new InvalidArgumentException();
				}
				$total 	= $total + $roundScore + $score + $scores[$index + 1];
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
}