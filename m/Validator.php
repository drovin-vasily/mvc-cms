<?php

namespace m;

class Validator

{
	public function checkRegister()
	{
		if (isset($_POST['login'], $_POST['email'], $_POST['pass'], $_POST['pass2'])) {
			if ($_POST['pass'] === $_POST['pass2']) {
					return true;
			} return false;
		} return false;
	}

}