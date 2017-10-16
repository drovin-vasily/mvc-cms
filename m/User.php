<?php

namespace m;

class User
{
	private $db;
	private $tableName = 'users';
	private $fields = ['login', 'pass', 'email', 'role'];

	public $id;
	public $login;
	public $pass;
	public $email;
	public $role;

	function __construct()
	{
		$this->db = Db::new();
	}

	public function insert()
	{
		return $this->db->insert($this->tableName, $this->fields, [$this->login, $this->pass, $this->email, $this->role]);
	}

	public function update($id=false)
	{
		if (!$id) $id = $this->id;
		return $this->db->update($this->tableName, $this->fields, [$this->login, $this->pass, $this->email, $this->role], $id);
	}

	public function delete($id)
	{
		return $this->db->delete($this->tableName, $id);
	}

	public function selectOne($id)
	{
		$user=$this->db->select($this->tableName, $id);
		if ($user->num_rows > 0) {
			$this->fillModel($user);
		} else return false;
	}

	public function selectAll()
	{
		$users = $this->db->select($this->tableName);
		if ($user->num_rows > 0) {
			return $users->fetch_all();
		} else return false;
	}

	public function findUserByLogin($login)
	{
		$user = $this->db->selectByField($this->tableName, 'login', $login);
		if ($user->num_rows > 0) {
			$this->fillModel($user);
		} else return false;
	}

	private function fillModel($user)
	{
		$user = $user->fetch_assoc();
	    foreach($user as $key => $value) {
	        $this->$key = $value;
		}
	}

}