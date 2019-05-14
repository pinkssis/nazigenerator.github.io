<?php
	class Character {
	
		private $db;
		
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
		
		public function getItems($token) {
			if ($token) {
				$id = $this->db->getUserId($token);
				if ($id) {
					return var_dump($this->db->getItems());
				}
			}
			return null;
		}
	
		
		function __construct ($db) {
			$this->db = $db;
		}
		
		
	}