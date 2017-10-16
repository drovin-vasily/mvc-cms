<div style="text-align: center;">
	<form action="/login/index" method="post">
		<div>
			<label for="login">Login:</label>
			<input type="text" name="login" id="login" value="" tabindex="1" />
		</div>
		<div>
			<label for="pass">Password:</label>
			<input type="password" name="pass" id="pass" value="" tabindex="1" />
		</div>

		<div>
			<input type="submit" value="Login" />
		</div>
		<div>
			<input type="hidden" name="action" value="login" />
		</div>
	</form>
	<div>
		<a href="/login/register" class="button">Register</a>
	</div>

</div>