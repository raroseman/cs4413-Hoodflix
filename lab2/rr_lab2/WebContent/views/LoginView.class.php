<?php

class LoginView {

  public static function show() {  
		
?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Login</title>
	</head>
	<body>
		<form>
			<section>
				<h1>Login</h1>
					Username <input type="text" name="username"><br><br>
					Password <input type="password" name="password"><br><br>
			</section>
				
			<input type="submit" name="submit"><br>
		</form>
	</body>
	</html>

<?php
	}
}		
?>