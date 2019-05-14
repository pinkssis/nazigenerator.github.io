<?php 
    require_once('NumberCalculator.php');
	require_once('ComplexCalculator.php');
	
	class Calculator extends NumberCalculator{
	
	    private $calcs = null;
		
		function __construct(){
		   $this->calcs = new stdClass();
		   $this->calcs->NumberCalculator = new NumberCalculator();
		   $this->calcs->ComplexCalculator = new ComplexCalculator();
		}
	
	    private function getTypeValue($a){
			if (is_numeric($a)){
			    return 'Number';
			}
			if (is_a($a,'Complex')){
			    return 'Complex';
			}
			return null;
		}
	
	    public function add($a,$b) {
		   //1.Проверка
		   $typeA = $this->getTypeValue($a);
		   $typeB = $this->getTypeValue($b);
		   if ($typeA && $typeB && $typeA === $typeB){
		     //2.Действие
		     return $this->calcs->{$typeA . 'Calculator'}->add($a,$b);
		   }
		   return null;
		}
	}