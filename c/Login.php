<?php

namespace c;

use m\User;

class Login extends Top
{

	public function index ()
	{
		if (!$_SESSION['app']['isGuest']) {
			$this->redirect('/'); }
		else {
			if (isset($_POST['action'])) {
				if ($this->db->existLogin($_POST['login'])) {
					$_SESSION['app']['isGuest'] = false;
					$this->redirect('/main/list');
				} else {
					return $this->render('index');
				}
			} else {
				return $this->render('index');
			}
		}
	}

	public function register ()
	{


		if (isset($_POST['action'])) {
			 {
				if ($this->validator->checkRegister() && !$this->db->existLogin($_POST['login'])) {
					$model = new User();
					$model->login = $_POST['login'];
					$model->email = $_POST['email'];
					$model->pass = $_POST['pass'];
					if ($model->insert()) {
						$_SESSION['app']['isGuest'] = false;
						$this->redirect('/mian/list');
					}

				}
			}
		}

		return $this->render('register');
	}


	public function login()
	{
		return $this->render('index');
	}

	public function logout()
	{
		$_SESSION['app']['isGuest'] = true;
		return $this->redirect('/login');
	}

}