<?php 
	require_once('ComplexCalculator.php');
	
	class NumberCalculator {
	
	 private $calcs = null;
		
	
	    private function getTypeValue($a){
			if (is_numeric($a)){
			    return 'Number';
			}
			if (is_a($a,'Complex')){
			    return 'Complex';
			}
			return null;
		}
	
	    private function isValidParams($a, $b) {
			return !!(is_numeric($a) && is_numeric($b));
		}
	
		private function plus($a, $b) {
			return ($this->isValidParams($a, $b)) ? $a + $b : null;
		}
		private function minus($a, $b) {
			return ($this->isValidParams($a, $b)) ? $a - $b : null;
		}
		private function star($a, $b) {
			return ($this->isValidParams($a, $b)) ? $a * $b : null;
		}
		private function slash($a, $b) {
			return ($this->isValidParams($a, $b) && $b != 0) ? $a / $b : null;
		}
		private function oneNumber() {
			return 1;
		}
		private function zeroNumber() {
			return 0;
		}
	    private function checkTypes($a,$b){
		   $typeA = $this->getTypeValue($a);
		   $typeB = $this->getTypeValue($b);
		   if ($typeA && $typeB && $typeA === $typeB){   
		       return $thisA;
		   }
		   return null;
		}
		
	    public function add($a,$b) {
		   //1.Проверка
		   $type = $this->checkTypes($a,$b);
		   if ($type){   
		       if ($type ==='Number'){
		            return $this->plus($a,$b);
		       }
		     //2.Действие
		     return $this::calcs->{$typeA . 'Calculator'}->add($a,$b);
		   }
		   return null;
		}
		
		public function sub($a,$b) {
		   $type = $this->checkTypes($a,$b);
		   if ($type){   
		       if ($type ==='Number'){
		            return $this->minus($a,$b);
		       }
		     //2.Действие
		     return $this::calcs->{$typeA . 'Calculator'}->sub($a,$b);
		   }
		   return null;
		}
		
		
		
		/*
		public function mult($a,$b){
		    return $this->star($a,$b);
		}
		public function div($a,$b){
		    return $this->slash($a,$b);
		}
		public function one(){
		    return $this->oneNumber();
		}
	    public function zero(){
		    return $this->zeroNumber();
		}*/
	}
	
	NumberCalculator::calc = new stdClass();
	NumberCalculator::calc->Calculator = new ComplexCalculator();