<?php

class ProfileView {

  public static function show( $user, $userData ) {  
  	MasterView::showHeader();
  	MasterView::showNavbar();
  	echo "<br>";
  	echo "<br>";
  	echo "<br>";
?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	</head>
	<body>
		<section>
			<h1>Welcome, <?php echo $user->getUserName(); ?>!</h1>
			<img alt="Profile Picture" src="images/<?php $userData->getPicture()?>" style="">	
		</section>
		
		<section>
			<h2>Personal Details</h2>
			   Name: <?php echo $userData->getFirstName(); echo ' '; echo $userData->getLastName(); ?><br>
			   <span style=text-decoration:underline;>Genres of Interest</span><br>
			   Action: <?php echo $userData->getGenres()[0];?><br>
			   Horror: <?php echo $userData->getGenres()[1];?><br>
			   Comedy: <?php echo $userData->getGenres()[2];?><br>
			   Romance: <?php echo $userData->getGenres()[3];?><br>
			   Family: <?php echo $userData->getGenres()[4];?><br>
			   Drama: <?php echo $userData->getGenres()[5];?><br>
			   Address: <?php echo $userData->getAddress();?><br>
			   Neighborhood: <?php echo $userData->getNeighborhood();?><br>
			   Date of Birth: <?php echo $userData->getDateOfBirth();?><br>
			   Gender: <?php echo $userData->getGender();?><br>		
		</section>
		
		<section>
			   <h2>Contact Information</h2>
			   Email: <?php echo $userData->getEmail();?><br>
			   Phone: <?php echo $userData->getPhone();?><br>
			   URL: <?php echo $userData->getURL();?><br><br>
		</section>
		
	</body>
	</html>
<?php
	}
}		
?>