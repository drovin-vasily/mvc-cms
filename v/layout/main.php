<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
main layout start
<br>

<div style="width: 100%; overflow: hidden; text-align: center; position: relative;">
	<div style="display: inline-block;  width:500px; margin: auto; border: 2px solid red; position: relative;">
		<?php if ($_SESSION['app']['isGuest']) { ?>
			<div>
				<a href="/login">Login</a>
			</div>
		<?php } else { ?>
			<div>
				<a href="/login/logout">Logout</a>
			</div>
		<?php } ?>
		<?php $this->body(); ?>
	</div>
</div>

<br>
main layout end
</body>
</html>