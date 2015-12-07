<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>test for Login View</title>
</head>
<body>
<h1>Login View Test</h1>

<?php
include_once("../views/LoginView.class.php");
include_once("../models/User.class.php");
?>

<h2>It should call show when $user has an input</h2>
<?php 
$testUser = array("userName" => "Thugnificent",
		          "password" => "12345678"
);
$loginTest = new User($testUser);
LoginView::show($loginTest);
?>
</body>
</html>