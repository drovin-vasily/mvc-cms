<?php

namespace m;

class Router
{
	private static $contrActions = [
		'Main' => ['index', 'create', 'read', 'update', 'delete', 'list'],
		'Login' => ['index', 'register', 'login', 'logout'],
	];

	public static function run()
	{
		$route = explode('/', $_SERVER['REQUEST_URI']);

		if (empty(current($route)))	array_shift($route);
		if (empty(end($route)))	array_pop($route);

		if (count($route) > 2) self::showError('strange route: '.$_SERVER['REQUEST_URI']);
		$controllerName = !empty($route[0]) ? ucfirst(mb_strtolower($route[0])) : 'Main' ;
		$actionName = !empty($route[1]) ? $route[1] : 'index';

		if (array_key_exists($controllerName, self::$contrActions))  {
			if (in_array($actionName, self::$contrActions[$controllerName])) {
				$controllerName = 'c\\'.$controllerName;
				$c = new $controllerName;
				$c->{$actionName}();
			} else self::showError('action: '.$actionName);
		} else self::showError('controller: '.$controllerName);
	}

	private static function showError($text)
	{
		echo '<br />There is no such ' . $text . ' <br />';
		exit;
	}

}