<?php
	define('MODULES', ROOT . 'modules' . DS);
	require_once (MODULES . 'db'. DS . 'db.php');
	require_once (MODULES . 'user'. DS . 'user.php');

	class Application{
		private $db;
		private $user;
		
		function __construct() {
			$this->db = new DB();
			$this->user = new User($this->db);
		}
		
		private function loginMethod($param) {
			if($param['login'] && $param['password']) {
				return $this->user->login($param['login'], $param['password']);
			}
			return null;
		}
		
		private function logoutMethod($param) {
			if($param['token'] ) {
				return $this->user->logout($param['token']);
			}
			return null;
		}
		
		private function getCharacterMethod($param) { //получить персонажа
			if($param['token'] ) {
				return $this->user->getCharacter($param['token']);
			}
			return null;
			
		}
		
		private function setCharacterMethod($param) { //изменить персонажа(имя и т.д.)
			if($param['token'] ) {
				return $this->user->setCharacter($param['token'], $param['name'], $param['age'], $param['sex'], $param['national']);
			}
			return null;
		}
		
		private function addItemToCharacterMethod($param) { //добавить предмет персонажу
			if($param['token'] ) {
				return $this->user->addItemToCharacter($param['token'], $param['id_item']);
			}
			return null;
		}
		
		private function delItemFromCharacterMethod($param) { //удалить предмет у персонажа
			if($param['token'] ) {
				return $this->user->delItemFromCharacter($param['token'], $param['id_item']);
			}
			return null;
		}
		
		private function delItemsFromCharacterByTypeMethod($param) {
			if($param['token'] ) {
				return $this->user->delItemsFromCharacterByType($param['token'], $param['type']);
			}
			return null;
		}
		
		private function getItemsMethod($param) { //получить шмотки по ТИПУ
			if($param['token'] ) {
				return $this->user->getItems($param['token'], $param['type']);
			}
			return null;
		}
		
		private function getCharacterItemsMethod($param) { //получить ВСЕ шмотки персонажа
			if($param['token'] ) {
				return $this->user->getCharacterItems($param['token']);
			}
			return null;
		}
		
		
		
		public function answer($param) {
			if ($param['method']){
				if (method_exists($this, $param['method'] . 'Method')) {
					return $this->{$param['method'] . 'Method'}($param);
				}
			}
			return null;
		}
	}
	
	