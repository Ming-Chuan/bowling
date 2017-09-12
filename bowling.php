<?php
class bowling {
	public function countScore($scores) {
		$total 	= 0;
		$round 	= 1;
		$ball	= 0;
		$roundScore 	= 0;
		foreach ($scores as $index => $score) {
			if ($round > 10) { 
				break;
			}
			$ball++;
			if ($ball == 1 && $score == 10) { // strike
				$total 	= $total + $score + $scores[$index + 1] + $scores[$index + 2];
				$round++;
				// clean
				$ball = 0;
			} elseif ($ball == 2 && ($roundScore + $score) == 10) { // spare

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