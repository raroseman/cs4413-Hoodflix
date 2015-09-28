<?php

class SignupView {

  public static function show() {  
		
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
				Username <input type="text" name="userName" tabindex="1"><br><br>
				Password <input type="password" name="password" tabindex="2"><br><br>
				Confirm Password <input type="password" name="password" tabindex="3"><br><br>			
				Picture <input type="file" name="file" tabindex="4"><br><br>
				<fieldset>
  					<legend>Genres of Interest</legend>
  					Action <input type="checkbox" name="action" tabindex="5">
  					Horror <input type="checkbox" name="horror" tabindex="6">
  					Comedy <input type="checkbox" name="horror" tabindex="7"><br>
  					Romance<input type="checkbox" name="horror" tabindex="8">
  					Family <input type="checkbox" name="horror" tabindex="9">
  					Drama  <input type="checkbox" name="horror" tabindex="10">
 				</fieldset><br>
 				Display Contact Information? <input list="display_information">
  				<datalist id="display_information" tabindex="11">
    				<option value="Yes">Yes</option>
    				<option value="No">No</option>
  				</datalist><br><br>
		</section>
		
		<section>
			<h1>Personal Information</h1>
				First Name <input type="text" name="firstname" tabindex="12"><br><br>
				Last Name <input type="text" name="lastname" tabindex="13"><br><br>
				Address <input type="text" name="address" tabindex="14"><br><br>
				Neighborhood <input type="text" name="neighborhood" tabindex="15"><br><br>
				Date of Birth <input type="month" name="dateofbirth" tabindex="16"><br><br>
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
				<fieldset>
  					<legend>Gender</legend>
  					Male <input type="radio" name="gender" value="male" tabindex="19">
  					Female <input type="radio" name="gender" value="female" tabindex="20">
 				</fieldset><br>
				About Me <br><br><textarea name="message" rows="10" cols="30" tabindex="21"></textarea><br><br>
		</section>
		
		<section>
			<h1>Contact Information</h1>
				Email <input type="email" name="email" tabindex="22"><br><br>
				Phone <input type="tel" name="phone" tabindex="23"><br><br>
				Facebook <input type="url" name="url" tabindex="24"><br><br>
		</section>
		
		<input type="submit" name="submit" tabindex="25"><br>
	</form>
</body>
</html>

<?php

  }
}

?>