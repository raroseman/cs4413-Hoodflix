<?php

class SignupView {

  public static function show( $user, $userData ) {  
		
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign-Up</title>
</head>
<body>
	<form action="signup" method="post">
		<section>
			<h1>Account Information</h1>
				Username <input type="text" name="userName" <?php if (!is_null($user)) { echo 'value = "'. $user->getUserName() .'"'; }?> tabindex="1"> <?php if (!is_null($user)) {echo $user->getError('userName');}?><br><br>
				Password <input type="password" name="password" <?php if (!is_null($user)) { echo 'value = "'. $user->getPassword() .'"'; }?> tabindex="2"> <?php if (!is_null($user)) {echo $user->getError('password');}?><br><br> 			
				Picture <input type="file" name="picture" value="picture" <?php if (!is_null($userData)) echo $userData->__toString(); ?> tabindex="4"> <?php if (!is_null($user)) {echo $userData->getError('picture');}?><br><br>
				<?php if (!is_null($user)) {echo $userData->getError('genres').'<br>';}?> <fieldset>
  					<legend>Genres of Interest</legend> 
  					Action <input type="checkbox" name="action" <?php if ((!is_null($userData)) && $userData->getAction()) { echo "checked"; } ?> tabindex="5">
  					Horror <input type="checkbox" name="horror" <?php if ((!is_null($userData)) && $userData->getHorror()) { echo "checked"; } ?> tabindex="6">
  					Comedy <input type="checkbox" name="comedy" <?php if ((!is_null($userData)) && $userData->getComedy()) { echo "checked"; } ?> tabindex="7"><br>
  					Romance<input type="checkbox" name="romance" <?php if ((!is_null($userData)) && $userData->getRomance()) { echo "checked"; } ?> tabindex="8">
  					Family <input type="checkbox" name="family" <?php if ((!is_null($userData)) && $userData->getFamily()) { echo "checked"; } ?> tabindex="9">
  					Drama  <input type="checkbox" name="drama" <?php if ((!is_null($userData)) && $userData->getDrama()) { echo "checked"; } ?> tabindex="10">
 				</fieldset><br>
		</section>
		
		<section>
			<h1>Personal Information</h1>
				First Name <input type="text" name="firstName" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getFirstName() .'"'; }?> tabindex="12"> <?php if (!is_null($user)) {echo $userData->getError('firstName');}?><br><br>
				Last Name <input type="text" name="lastName" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getLastName() .'"'; }?> tabindex="13"> <?php if (!is_null($user)) {echo $userData->getError('lastName');}?><br><br>
				Address <input type="text" name="address" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getAddress() .'"'; }?> tabindex="14"> <?php if (!is_null($user)) {echo $userData->getError('address');}?><br><br>
				Neighborhood <input type="text" name="neighborhood" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getNeighborhood() .'"'; }?> tabindex="15"> <?php if (!is_null($user)) {echo $userData->getError('neighborhood');}?><br><br>
				Date of Birth <input type="month" name="dateOfBirth" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getDateOfBirth() .'"'; }?> tabindex="16"> <?php if (!is_null($user)) {echo $userData->getError('dateOfBirth');}?><br><br>
				<?php if (!is_null($user)) {echo $userData->getError('gender').'<br>';}?> <fieldset>
  					Male <input type="radio" name="gender" value="male" <?php if (!is_null($userData) && $userData->getGender() == "male") { echo "checked "; } ?> tabindex="19">
  					Female <input type="radio" name="gender" value="female" <?php if (!is_null($userData) && $userData->getGender() == "female") { echo "checked "; } ?> tabindex="20">
 				</fieldset><br>
		</section>
		
		<section>
			<h1>Contact Information</h1>
				Email <input type="text" name="email" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getEmail() .'"'; }?> tabindex="22"> <?php if (!is_null($user)) {echo $userData->getError('email');}?><br><br>
				Phone <input type="text" name="phone" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getPhone() .'"'; }?> tabindex="23"> <?php if (!is_null($user)) {echo $userData->getError('phone');}?><br><br>
				Facebook <input type="text" name="url" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getURL() .'"'; }?> tabindex="24"> <?php if (!is_null($user)) {echo $userData->getError('url');}?><br><br>
		</section>
		
		<input type="submit" name="submit" tabindex="25"><br>
	</form>
</body>
</html>

<?php

  }
}

?>