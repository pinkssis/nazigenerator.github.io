<?php
	class NumberCalculator {
	
		private function isValidParams($a,$b){
			return !!(is_numeric($a) && is_numeric($b));
		}
		public function add($a,$b){
			return ($this->isValidParams($a,$b))? $a+$b : null;
		}
		
		public function sub($a,$b){
			return ($this->isValidParams($a,$b))? $a-$b : null;
		}
		
		public function mult($a,$b){
			return ($this->isValidParams($a,$b))? $a*$b : null;
		}
		
		public function div($a,$b){
			return ($this->isValidParams($a,$b)&& $b != 0) ? $a/$b : null;
		}
		
		public function one(){
			return  1 ;
		}
		
		public function zero( ){
			return  0 ;
		}
	}
	
	
	/* 
	
	*/
	
	