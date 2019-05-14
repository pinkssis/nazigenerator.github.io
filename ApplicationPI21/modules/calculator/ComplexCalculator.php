<?php 
	require_once('NumberCalculator.php');

	class Complex {
		public $re = 0;
		public $im = 0;
		function __construct($re, $im) {
			$this->re = (is_numeric($re)) ? $re : 0;
			$this->im = (is_numeric($im)) ? $im : 0;
		}
	}
	
	class ComplexCalculator extends NumberCalculator {
	
    public function add($a,$b) {
		   //1.Проверка
		   $type = $this->checkTypes($a,$b);
		   if ($type){   
		       if ($type ==='Complex'){
		            return new Complex($this->plus($a->re, $b->re), $this->plus($a->im ,$b->im));
		       }
		     //2.Действие
		     return $this->calcs->{$typeA . 'Calculator'}->add($a,$b);
		   }
		   return null;
		}
		}
	
		public function add($a, $b) {
			return ($this->isValidParams($a, $b)) ? new Complex($a->re + $b->re, $a->im + $b->im) : null;
		}
	    public function sub($a, $b) {
			return ($this->isValidParams($a, $b)) ? new Complex($a->re - $b->re, $a->im - $b->im) : null;
		}
	    public function mult($a, $b) {
			return ($this->isValidParams($a, $b)) ? new Complex($a->re * $b->re - $a->im * $b->im,$a->re * $b->im + $a->im * $b->re) : null;
		}
	    public function div($a, $b) {
			return ($this->isValidParams($a, $b)) ? new Complex(($a->re * $b->re + $a->im * $b->im)/($b->re * $b->re + $b->im * $b->im),($a->re * $b->im - $a->im * $b->re)/($b->re * $b->re + $b->im * $b->im)) : null;
		}
		public function one() {
			return new Complex(1, 0);
		}
		public function zero() {
			return new Complex(0, 0);
		}
	}