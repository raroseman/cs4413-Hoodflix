<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Basic tests for User Registration View</title>
</head>
<body>
<h1>User Registration View Test</h1>

<?php
include_once("../models/User.class.php");
include_once("../models/UserData.class.php");
include_once("../views/SignupView.class.php");
?>

<h2>It should call show when $user and $userData has an input</h2>
<?php 
$testUser = array( "userName" => "Thugnificent",
		           "password" => "12345678"   
);

$testUserData = array( "userName" => "Thugnificent",
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
$userTest = new User($testUser);
$userDataTest = new UserData($testUserData);
SignupView::show($userTest, $userDataTest);
?>
</body>
</html>