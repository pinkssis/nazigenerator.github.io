<?php
	require_once('NumberCalculator.php');
	
	class Drob {
		public $numerator = 0;
		public $denominator = 1;
		function __construct($numerator,$denominator){
			$this->numerator = (is_numeric($numerator)) ? $numerator : 0;
			$this->denominator = (is_numeric($denominator) && $denominator != 0) ? $denominator : 1;
		}
	}

	class DrobCalculator extends NumberCalculator {
		private function isValidParams($a,$b){
			return !!(is_a($a,'Drob') && is_a($b,'Drob'));
		}
		
		private function znam ($a, $b) {//сокращение дробей
			while ($a != 0 && $b != 0) {
				if ($a > $b) {
					$a %= $b;
				} else {
					$b %= $a;
				}
			}
			return $a + $b;
		}
		
		public function add($a,$b){
			if ($this->isValidParams($a, $b)) { // 2/3 + 2/4 = (2*4 + 2*3) / 3*4
				$a->numerator *= $b->denominator;
				$b->numerator *= $a->denominator;
				$c = new Drob($a->numerator + $b -> numerator, $a->denominator * $b->denominator);//дробь до сокращения
				$zn = $this->znam($c-> numerator, $c -> denominator);//находим наибольший общий делитель дробей
				return new Drob($c -> numerator / $zn, $c -> denominator / $zn);//дробь после сокращения
			} else { 
				return null;
			}
		}
		
		public function sub($a,$b){
			if ($this->isValidParams($a, $b)) { // 2/3 + 2/4 = (2*4 + 2*3) / 3*4
				$a->numerator *= $b->denominator;
				$b->numerator *= $a->denominator;
				$c = new Drob($a->numerator - $b -> numerator, $a->denominator * $b->denominator);//дробь до сокращения
				$zn = $this->znam($c-> numerator, $c -> denominator);//находим наибольший общий делитель дробей
				return new Drob($c -> numerator / $zn, $c -> denominator / $zn);//дробь после сокращения
			} else { 
				return null;
			}
		}
		
		public function mult($a,$b){
			if ($this->isValidParams($a, $b)) { // 
				$c = new Drob($a->numerator * $b -> numerator, $a->denominator * $b->denominator);//дробь до сокращения
				$zn = $this->znam($c-> numerator, $c -> denominator);//находим наибольший общий делитель дробей
				return new Drob($c -> numerator / $zn, $c -> denominator / $zn);//дробь после сокращения
			} else { 
				return null;
			}
		}
		
		public function div($a,$b){
			if ($this->isValidParams($a, $b)) { // 
				$c = new Drob($a->numerator * $b -> denominator, $a->denominator * $b->numerator);//дробь до сокращения
				$zn = $this->znam($c-> numerator, $c -> denominator);//находим наибольший общий делитель дробей
				return new Drob($c -> numerator / $zn, $c -> denominator / $zn);//дробь после сокращения
			} else { 
				return null;
			}
		}
	
		public function one() {
			return new Drob (1,1);
		}
		public function zero() {
			return new Drob (0,1);
		}
	}
