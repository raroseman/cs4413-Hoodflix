<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Basic tests for Profile View</title>
</head>
<body>
<h1>Profile View Test</h1>

<?php
include_once("../models/UserData.class.php");
include_once("../views/ProfileView.class.php");
?>

<h2>It should call show when $userData has an input</h2>
<?php 

$testUserData = array( "userName" => "Thugnificent",
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
$userDataTest = new UserData($testUserData);
ProfileView::show();
?>
</body>
</html>