<?php

class LoginView {

  public static function show( $user ) {  
		
?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Login</title>
	</head>
	<body>
		<form action="login" method="post">
			<section>
				<h1>Login</h1>
					Username <input type="text" name="userName" > <?php if (!is_null($user)) {echo $user->getError('userName');}?><br><br>
					Password <input type="password" name="password"> <?php if (!is_null($user)) {echo $user->getError('password');}?><br><br>
			</section>
				
			<input type="submit" name="submit"><br>
		</form>
	</body>
	</html>

<?php
	}
}		
?>