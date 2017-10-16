<?php

namespace m;

class Db

{
	private static $db = null;
	private $connect;

	private function __construct()
	{
		$config = require __DIR__.'/../config.php';
		$dbSet = $config['db'];
		$this->connect = mysqli_connect($dbSet['host'], $dbSet['user'], $dbSet['pass'], $dbSet['name']);

		if ($this->connect->connect_error) {
			die('Ошибка подключения (' . $this->connect->connect_errno . ') '
			. $this->connect->connect_error);
		}
	}

	public static function new(){
		if (self::$db === null){
			self::$db = new Db();
		}
		return self::$db;
	}

	public function insert ($tableName, $fields, $values){

		$query= "INSERT INTO `$tableName` (";
			foreach ($fields as $field) {
				$query .= "`" . $field . "`,";
			}

		$query = substr($query, 0, -1);
		$query .= ") VALUES (";

		foreach ($values as $value) {
			$query .= "'" . addslashes($value) . "',";
		}

		$query = substr($query, 0, -1);
		$query .= ");";

			return $this->connect->query($query);
	}

	public function update ($tableName, $fields, $values, $id){

		$query = "UPDATE `$tableName` SET";

		foreach ($fields as $key => $field) {
			$query .= " `$field` = '".addslashes($values[$key])."',";
		}

		$query = substr($query, 0, -1);
		$query .= "WHERE `id` = $id";

			return $this->connect->query($query);
	}

	public function delete ($tableName, $id){

		$query= "DELETE FROM `$tableName` WHERE `id` = $id";

			return $this->connect->query($query);
	}

	public function select($tableName, $id=false){

		$query = "SELECT * FROM `$tableName`";
		if($id != false) $query .=  "WHERE `id` IN ($id)";

			return $this->connect->query($query);
	}

	public function selectByField($tableName, $field, $values){

		if (is_array($values)) {
			foreach ($values as $value) {
				$in .= '\''.$value.'\',';
			}
		} else $in = '\''.$values.'\',';

		$in = substr($in, 0, -1);
		$query = "SELECT * FROM `$tableName` WHERE `$field` IN ($in)";

			return $this->connect->query($query);
	}

	public function existLogin($login)
	{
		$user = $this->selectByField('users', 'login', $login);

		if ($user->num_rows == 1) {
			return true;
		} else return false;
	}

}




