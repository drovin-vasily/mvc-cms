<?php

namespace c;

use m\User;

class Main extends Top
{

	public function index ()
	{
		return $this->render('index');
	}

	public function create ()
	{
		echo 'create action';
	}

	public function read ()
	{
		echo 'read action';
	}

	public function update ()
	{
		echo 'update action';
	}

	public function delete ()
	{
		echo 'delete action';
	}

	public function list ()
	{
		return $this->render('list');
	}

}