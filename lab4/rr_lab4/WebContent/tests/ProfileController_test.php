<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Basic tests for User Registration View</title>
</head>
<body>
<h1>Profile Controller Test</h1>

<?php
include_once("../controllers/ProfileController.class.php");
include_once("../views/ProfileView.class.php");
?>

<h2>It should call the run method for the input from $GET</h2>
<?php 
$_SERVER ["REQUEST_METHOD"] = "GET";
$_GET = array( "userName" => "Thugnificent",
		       "picture" => "../images/thugnificent.jpg",
		       "firstName" => "Otis",
		       "lastName" => "Jenkins",
		       "address" => "123 Thug Lane",
		       "neighborhood" => "Woodcrest",
		       "dateOfBirth" => "1989-01",
		       "gender" => "male",
		       "comedy" => "checked",
		       "email" => "thugnasty@gmail.com",
		       "phone" => "(210) 555 - 5555",
		       "url" => "https://otis_jenkins/facebook.com"
             );
ProfileController::run();
?>
</body>
</html>