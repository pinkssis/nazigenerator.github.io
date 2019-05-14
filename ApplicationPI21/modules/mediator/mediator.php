<?php
	class Trigger{
		public function __call($method, $args) {
			if (isset($this->{$method}) && is_callable($this->{$method})) {
				return call_user_func_array($this->{$method}, $args);
			}
			return null;
		}
	}

	class Mediator {
		private $TRIGGER_TYPES;
		private $TRIGGER;
		
		function __construct () {
			//записать названия триггеров
			$this->TRIGGER_TYPES = new stdClass();
			$this->TRIGGER_TYPES->GET_USER = 'get_user';
			$this->TRIGGER_TYPES->GET_MONEY = 'get_money';
			//...
			//записать триггеры
			$this->TRIGGER = new Trigger();
			foreach($this->TRIGGER_TYPES as $trigger) {
				$this->TRIGGER->{$trigger} = null;
			}
		}
		
		public function getTriggerTypes () {
			return $this->TRIGGER_TYPES;
		}
		
		public function registerTrigger($name, $_func) {
			if($name && is_callable($_func)) {
				$this->TRIGGER->{$name} = $_func;
				return true;
			}
			return false;
		}
		
		public function callTrigger($name, $param = null) {
			if($name && $this->TRIGGER->{$name}) {
				return $this->TRIGGER->{$name}($param);
			}
			return null;
		}
	}
	
	
	