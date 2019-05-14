<?php
	class user {
	
		private $db;
		
		public function login($login, $password) {
			if ($login && $password) {
				$user = $this->db->getUser($login, $password);
				if ($user) {
					$token = md5($user->login . 'secret key' . rand());
					$this->db->updateToken($user->id, $token);
					return $token;
				}
			}
		return null;
		}
		
		public function logout($token) {
			if ($token) {
				$id = $this->db->getUserId($token);
				if ($id){
					return $this->db->updateToken($id);
				}
			}
			return null;	
		}
		
		public function getCharacter($token) {
			if ($token) {
				$id = $this->db->getUserId($token);
				if ($id) {
					return $this->db->getCharacters($id);
				}
			}
			return null;
		}
		
		public function setCharacter($token, $name = null, $age = null, $sex = null, $national = null) {
			if ($token) {
				$id = $this->db->getUserId($token);
				if ($id) {
					return $this->db->updateCharacter($id, $name, $age, $sex, $national);
				}
			}
			return null;
		}
		
		public function getCharacterItems($token){
			if ($token) {
				$id = $this->db->getUserId($token);
				if ($id) {
					$character = $this->db->getCharacters($id);
					if ($character) {
						return $this->db->getCharacterItems($character->id);
					}
				}
			}
		}
		
		public function addItemToCharacter($token, $id_item) {
			if ($token) {
				$id = $this->db->getUserId($token);//берем id ПОЛЬЗОВАТЕЛЯ
				$character = $this->db->getCharacters($id);//получаем ПЕРСОНАЖА по id ПОЛЬЗОВАТЕЛЯ
				if ($id) {
					return $this->db->addItemToCharacter($character->id, $id_item);
				}
			}
			return null;
		}
		
		public function delItemFromCharacter($token, $id_item) {
			if ($token) {
				$id = $this->db->getUserId($token);//берем id ПОЛЬЗОВАТЕЛЯ
				$character = $this->db->getCharacters($id);//получаем ПЕРСОНАЖА по id ПОЛЬЗОВАТЕЛЯ
				if ($id) {
					return $this->db->delItemFromCharacter($character->id, $id_item);
				}
			}
			return null;
		}
		
		public function delItemsFromCharacterByType($token, $type) {
			if ($token) {
				$id = $this->db->getUserId($token);//берем id ПОЛЬЗОВАТЕЛЯ
				$character = $this->db->getCharacters($id);//получаем ПЕРСОНАЖА по id ПОЛЬЗОВАТЕЛЯ
				if ($id) {
					return $this->db->delItemFromCharacter($character->id, $type);
					
				}
			}
			return null;
		}
		
		public function getItems($token, $type) {
			if ($token) {
				$id = $this->db->getUserId($token);
				if ($id) {
					return $this->db->getItems($type);
				}
			}
			return null;
		}
	
	
	
		
		function __construct ($db) {
			$this->db = $db;
		}
		
		
	}