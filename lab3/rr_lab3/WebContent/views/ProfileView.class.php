<?php

class ProfileView {

  public static function show() {  
		
?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	</head>
	<body>
		<section>
			<h1>Welcome, Thugnificent!</h1>
			<img alt="Thugnificent" src="images/thugnificent.jpg" style="">	
		</section>
		
		<section>
			<h2>Personal Details</h2>
			   Name: Otis Jenkins<br>
			   Age: 24<br>
			   Gender: Male<br>
			   Height: 6' 3"<br>
			   Address: 123 Thug Lane<br>
			   Neighborhood: Woodcrest<br>
		</section>
		
		<section>	  
			   <h3>fliX of Interest</h3>
			   Action, Drama, Comedy<br>
		</section>
		
		<section>
			   <h2>Contact Information</h2>
			   E: mrthugnasty@gmail.com<br>
			   P: (410) 169-1337<br>
			   FB: https://www.facebook.com/otis.jenkins<br><br>
		</section>
		<?php
		$userData = array( "userName" => "Thugnificent",
		               "picture" => "../images/thugnificent.jpg",
		               "firstName" => "Otis",
		               "lastName" => "Jenkins",
		               "address" => "123 Thug Lane",
		               "neighborhood" => "Woodcrest",
		               "dateOfBirth" => "11/08/1989",
		               "gender" => "male",
		               "email" => "thugnasty@gmail.com",
		               "phone" => "(210) 555 - 5555",
		               "url" => "https://otis_jenkins/facebook.com"
        );
        print_r($userData);
		?>
		<br><br><a href="home">Home</a>
	</body>
	</html>
<?php
	}
}		
?>