<?php
class bowling {
	private $ball = 0;
	private $roundScore = 0;

	public function countScore($scores) {
		$total 	= 0;
		$round 	= 1;

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

			$this->ball++;
			if ($this->ball == 1 && $score == 10) { // strike
				$this->checkNumeric($next1);
				$this->checkNumeric($next2);
				$total 	= $total + $score + $next1 + $next2;
				$round++;
				// clean
				$this->clean();
			} elseif ($this->ball == 2 && ($this->roundScore + $score) == 10) { // spare
				$this->checkNumeric($next1);
				$total 	= $total + $this->roundScore + $score + $next1;
				$round++;
				// clean
				$this->clean();
			} elseif ($this->ball == 2) { // no spare
				$total 	= $total + $this->roundScore + $score;
				
				$round++;
				// clean
				$this->clean();
			} else { // ball 1
				$this->roundScore = $score;
			}
		}
		return $total;
	}

	private function checkNumeric($val) {
		if (is_numeric($val) === false) {
			throw new InvalidArgumentException();
		}
	}

	private function clean() {
		$this->ball = 0;
		$this->roundScore = 0;
	}
}