<?php
class bowling {
	public function countScore($scores) {
		$total 	= 0;
		foreach ($scores as $score) {
			$total 	+= $score;
		}
		return $total;
	}
}