<?php

	require_once('NumberCalculator.php');
	
	class Vector {
		public $x = 0;
		public $y = 0;
		public $z = 0;
		function __construct($x, $y, $z){
			$this->x = (is_numeric($x)) ? $x : 0;
			$this->y = (is_numeric($y)) ? $y : 0;
			$this->z = (is_numeric($z)) ? $z : 0;
		}
	}

	
	class VectorCalculator extends NumberCalculator {
	
		private function isValidParams($a, $b){
			return !!(is_a($a, 'Vector') && is_a($b, 'Vector'));
		}
		
		public function add($a,$b){
			return ($this->isValidParams($a,$b))? new Vector($a->x +$b->x, $a->y + $b->y, $a->z + $b -> z)  : null;
		}
		
		public function sub($a,$b){
			return ($this->isValidParams($a,$b))? new Vector($a->x -$b->x, $a->y - $b->y, $a->z - $b -> z)  : null;
		}
		
		//Скалярное произведение
		public function multScal($a,$b){
			return ($this->isValidParams($a,$b))? ($a->x * $b->x + $a->y * $b->y + $a->z * $b -> z)  : null;
		}
		
		//векторное произведение
		public function multVect($a,$b){
			return ($this->isValidParams($a,$b))? new Vector($a->y * $b->z - $a->z * $b->y, $a->x * $b->z - $a->z * $b->x, $a->x * $b->y - $a->y * $b->x)  : null;
		}
	
		public function one() {
			return new Vector (1,0, 0);
		}
		public function zero() {
			return new Vector (0,0,0);
		}
	}