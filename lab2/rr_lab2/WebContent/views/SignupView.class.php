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
				Confirm Password <input type="password" name="confirm" <?php if (!is_null($user)) { echo 'value = "'. $user->getConfirm() .'"'; }?> tabindex="3"> <?php if (!is_null($user)) {echo $user->getError('confirm');}?><br><br> 			
				Picture <input type="file" name="picture" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getPicture() .'"'; }?> tabindex="4"> <?php if (!is_null($user)) {echo $userData->getError('picture');}?><br><br>
				<fieldset>
  					<legend>Genres of Interest</legend> 
  					Action <input type="checkbox" name="action" tabindex="5">
  					Horror <input type="checkbox" name="horror" tabindex="6">
  					Comedy <input type="checkbox" name="comedy" tabindex="7"><br>
  					Romance<input type="checkbox" name="romance" tabindex="8">
  					Family <input type="checkbox" name="family" tabindex="9">
  					Drama  <input type="checkbox" name="drama" tabindex="10">
 				</fieldset><br>
		</section>
		
		<section>
			<h1>Personal Information</h1>
				First Name <input type="text" name="firstName" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getFirstName() .'"'; }?> tabindex="12"> <?php if (!is_null($user)) {echo $userData->getError('firstName');}?><br><br>
				Last Name <input type="text" name="lastName" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getLastName() .'"'; }?> tabindex="13"> <?php if (!is_null($user)) {echo $userData->getError('lastName');}?><br><br>
				Address <input type="text" name="address" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getAddress() .'"'; }?> tabindex="14"> <?php if (!is_null($user)) {echo $userData->getError('address');}?><br><br>
				Neighborhood <input type="text" name="neighborhood" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getNeighborhood() .'"'; }?> tabindex="15"> <?php if (!is_null($user)) {echo $userData->getError('neighborhood');}?><br><br>
				Date of Birth <input type="month" name="dateofbirth" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getDateOfBirth() .'"'; }?> tabindex="16"> <?php if (!is_null($user)) {echo $userData->getError('dateOfBirth');}?><br><br>
				Height <select name="height" tabindex="17">
    				   	   <option value="none">---</option>
    				       <option value="above">Above 6' 5"</option>    				 
    				       <option value="six_five">6' 5"</option>
    				       <option value="six_four">6' 4"</option>
    				       <option value="six_three">6' 3"</option>
    				       <option value="six_two">6' 2"</option>
    				       <option value="six_one">6' 1"</option>
    				       <option value="six_zero">6' 0"</option>
    				       <option value="five_eleven">5' 11"</option>
    				       <option value="five_ten">5' 10"</option>
    				       <option value="five_nine">5' 9"</option>
    				       <option value="five_eight">5' 8"</option>
    				       <option value="five_seven">5' 7"</option>
    				       <option value="five_six">5' 6"</option>
    				       <option value="five_five">5' 5"</option>
    				       <option value="below">Below 5' 5"</option>
 				</select><br><br>
				Eye Color <input type="color" name="color" tabindex="18"><br><br>
				<?php if (!is_null($user)) {echo $userData->getError('gender').'<br>';}?> <fieldset>
  					Male <input type="radio" name="male" value="male" tabindex="19">
  					Female <input type="radio" name="female" value="female" tabindex="20">
 				</fieldset><br>
				About Me <br><br><textarea name="message" rows="10" cols="30" <?php if (!is_null($userData)) { echo 'value = "'. $userData->getAboutMe() .'"'; }?> tabindex="21"></textarea> <?php if (!is_null($user)) {echo $userData->getError('aboutMe');}?><br><br>
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