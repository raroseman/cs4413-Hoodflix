<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Basic tests for User Registration View</title>
</head>
<body>
<h1>Signup Controller test</h1>

<?php
include_once("../controllers/SignupController.class.php");
include_once("../views/SignupView.class.php");
?>

<h2>It should call the run method for the input from $GET</h2>
<?php 
$_SERVER ["REQUEST_METHOD"] = "GET";
$_GET = array( "userName" => "Thugnificent",
		       "firstName" => "Otis",
		       "lastName" => "Jenkins",
		       "address" => "123 Thug Lane",
		       "neighborhood" => "Woodcrest",
		       "dateOfBirth" => "11/08/1989",
		       "gender" => "male",
		       "aboutMe" => "I love test cases!",
		       "email" => "thugnasty@gmail.com",
		       "phone" => "(210) 555 - 5555",
		       "url" => "https://otis_jenkins/facebook.com"
		);
SignUpController::run();
?>
</body>
</html>