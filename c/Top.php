<?php

namespace c;

use v\View;
use m\Db;
use m\Validator;

class Top
{
	protected $db;
	protected $validator;

	public function __construct (){
		$this->db = Db::new();
		$this->validator = new Validator();
	}

	protected function render ($viewname, $array = [])
	{
		$view=new View();
		$controllerName = explode('\\', get_class($this))[1];
		return $view->render($controllerName, $viewname, $array);
	}

	protected function redirect($url, $statusCode = 303)
	{
	  	header('Location: ' . 'http://t4'.$url, true, $statusCode);
		exit();
	}

}