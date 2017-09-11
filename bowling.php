<?php
class bowling {
	public function countScore($scores) {
		$total 	= 0;
		$round 	= 1;
		$ball  	= 0;
		foreach ($scores as $index => $score) {
			if ($round > 10 ) {
				break;
			}

			if ($score == 10) {
				$total = $total + $score + $scores[$index + 1] + $scores[$index + 2];
				$round++;
			} else {
				$total = $total + $score;
				$ball++;
				if ($ball == 2) {
					$round++;
					$ball = 0;
				}
			}
		}
		return $total;
	}
}