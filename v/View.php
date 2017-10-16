<?php

namespace v;

class View
{
	private $layout = 'main';
	private $controllerName;
	private $view;
	private $vars;

	private function renderLayout($vars =[])
	{
		if ($this->vars) extract($this->vars);
		require(__DIR__.'/layout/'.$this->layout.'.php');
	}

	public function render($controllerName, $view, $vars = [])
	{
		$this->controllerName = strtolower($controllerName);
		$this->view = $view;
		$this->view = $view;
		$this->renderLayout();
	}

	public function body()
	{
		if ($this->vars) extract($this->vars);
		require(__DIR__.'/' .$this->controllerName.'/'.$this->view.'.php');
	}

}