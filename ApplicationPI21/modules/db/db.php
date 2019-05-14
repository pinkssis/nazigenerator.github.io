<?php
	class DB {
	
		private $link;
	
		function __construct() {
			$this->link = mysql_connect('localhost', 'root', '');
			if (!$this->link) {
				die('Ошибка соединения: ' .mysql_error());
			}
			$db = mysql_select_db('pi21character', $this->link);

        }
		
		function __destruct() {
			mysql_close($this->link);
		}
		
		public function getUser($login, $password) {
			$query = "SELECT * ".
					 "FROM user ".
					 "WHERE login='".$login."' AND password='".$password."'";
			$result = mysql_query($query);
			$res = null;
			while ($row = mysql_fetch_object($result)) {
				$res = $row;
				break;
			}
			mysql_free_result($result); //очистить за собой
			return $res;
		}
		
		public function getUserId($token) {
			$query = "SELECT id FROM user WHERE token='" . $token . "'";
			$result = mysql_query($query);
			$res = null;
			while ($row = mysql_fetch_object($result)) {
				$res = ($row) ? $row->id : null;
				break;
			}
			mysql_free_result($result); //очистить за собой
			return $res;
		}
		
		public function updateToken($id, $token = null) {
		    $query = "UPDATE user SET token='" . $token . "' WHERE id=" . $id;
			$result = mysql_query($query);
			mysql_free_result($result); //очистить за собой
			return true;
		}
		
		public function getCharacters($id_user) {
			$query = "SELECT * FROM `character` WHERE id_user	=" . $id_user;
			$result = mysql_query($query);
			$res = null;
			while ($row = mysql_fetch_object($result)) {
				$res = $row;
			}
			mysql_free_result($result);//очистить за собой
			return $res;
		}
		
		public function getCharacterItems($id_character) {
			$query = "SELECT item.id, item.name, item.type, item.picture_url " . 
					 "FROM item, character_item " . 
					 "WHERE character_item.id_character= ". $id_character . " AND " . 
						   "item.id=character_item.id_item";
			$result = mysql_query($query);
			$res = Array();
			while ($row = mysql_fetch_object($result)) {
				$res[] = $row;
			}
			mysql_free_result($result);
			return $res;
		}
		
		public function getItem($id_item) {
			$query = "SELECT * FROM item WHERE id=" . $id_item;
			$result = mysql_query($query);
			$res = null;
			while ($row = mysql_fetch_object($result)) {
				$res = $row;
				break;
			}
			mysql_free_result($result);
			return $res;
		}
		
		public function getItems($type_item) {
			$query = "SELECT * FROM item WHERE type='" . $type_item. "'";
			$result = mysql_query($query);
			$res = Array();
			while ($row = mysql_fetch_object($result)) {
				$res[] = $row;
			}
			mysql_free_result($result);
			return $res;
		}
		
		public function deleteItem($id_item) {
			$query = "DELETE FROM item WHERE id=" . $id_item;
			$result = mysql_query($query);
			mysql_free_result($result);
			return $result;
		}
		
		public function deleteCharacter($id_character) {
			$query = "DELETE FROM `character` WHERE id_character=" . $id_character;
			$result = mysql_query($query);
			mysql_free_result($result);
			return $result;
		}
		
		public function delItemFromCharacter($id_character, $item_type) {
			$query = "SELECT id FROM `item` WHERE type='" . $item_type . "'";
			$result = mysql_query($query);	
			while ($row = mysql_fetch_object($result)) {
				mysql_query("DELETE FROM character_item WHERE id_character=" . $id_character . " AND id_item=" . $row->id);
			}
			mysql_free_result($result);
			return true;
		}
		
		public function addCharacter($id_user, $name, $age, $sex, $national) {
			if ($id_user) {
				$query = "INSERT INTO `character` (id_user, name, age, sex, national) " . 
						 "VALUES (" . $id_user . ", '" . $name . "', " . 
									  $age . ", '" . $sex . "', '" . $national . "')";
				mysql_query($query);
				return true;
			}
			return false;
		}
		
		public function addItem($name, $type, $picture_url = null) {
			if ($name){
                $query = "INSERT INTO item (name, type, picture_url) " . 
						 "VALUES ('" . $name . "', '" . $type . "', '" . $picture_url . "')";
                mysql_query($query);
                return true;
            }
            return false;
			
		}
		
		public function updateCharacter($id, $name = null, $age = null, $sex = null, $national = null) {
			if ($id && ($name || $age || $sex || $national)) {
				$query = "UPDATE `character` SET ";
				if ($name) {
					$query .= "name='". $name . "', ";
				}
				if ($age) {
					$query .= "age=". $age . ", ";
				}
				if ($sex) {
					$query .= "sex='". $sex . "', ";
				}
				if ($national) {
					$query .= "national='". $national . "', ";
				}
				$query = substr($query, 0, -2);
				$query .= " WHERE id=" . $id;
				mysql_query($query);
				return true;
			}
			return false;
		}
		
		
		public function updateItem($id, $name = null, $type = null, $picture_url = null) {
			if ($id && ($name || $type || $picture_url)) {
				$query = "UPDATE `item` SET ";
				if ($name) {
					$query .= "name='". $name . "', ";
				}
				if ($type) {
					$query .= "type=". $type . ", ";
				}
				if ($picture_url) {
					$query .= "picture_url='". $picture_url . "', ";
				}
				$query = substr($query, 0, -2);
				$query .= " WHERE id=" . $id;
				mysql_query($query);
				return true;
			}
			return false;
		}
		public function addItemToCharacter($id_character, $id_item) {
			if ($id_character && $id_item) {
				$query = "INSERT INTO `character_item` (id_character, id_item) " . 
						 "VALUES (" . $id_character . ", " . $id_item . ")";
				mysql_query($query);
				return true;
			}
			return false;
		}
		public function deleteItemToCharacter($id_character, $id_item) {
			$query = "DELETE FROM `character_item` WHERE id_character=" . $id_character . " AND " . 
						   "id_item=" . $id_item ;
			$result = mysql_query($query);
			mysql_free_result($result);
			return $result;
		}
		
		
	}