<?php
	require_once('NumberCalculator.php');
	
	class Complex {
		public $re = 0;
		public $im = 0;
		function __construct($re,$im){
			$this->re = (is_numeric($re)) ? $re : 0;
			$this->im = (is_numeric($im)) ? $im : 0;
		}
	}

	class ComplexCalculator extends NumberCalculator {
		private function isValidParams($a,$b){
			return !!(is_a($a,'Complex') && is_a($b,'Complex'));
		}
		
		public function add($a,$b){
			return ($this->isValidParams($a,$b))? new Complex($a->re +$b->re, $a->im + $b->im)  : null;
		}
		
		public function sub($a,$b){
			return ($this->isValidParams($a,$b))? new Complex($a->re - $b->re, $a->im - $b->im)  : null;
		}
		
		public function mult($a,$b){
			return ($this->isValidParams($a,$b))? new Complex($a->re * $b->re - $a->im * $b->im , $a->re * $b->im + $a->im * $b->re)  : null;
		}
		
		public function div($a,$b){
			return ($this->isValidParams($a,$b))? new Complex(($a->re * $b->re + $a->im * $b->im) / ($b->re * $b->re + $b->im * $b->im), ($b->re * $a->im - $a->re * $b->im) / ($b->re * $b->re + $b->im * $b->im))  : null;
		}
	
		public function one() {
			return new Complex (1,0);
		}
		public function zero() {
			return new Complex (0,0);
		}
	}
	
	
	