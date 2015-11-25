<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Basic tests for User Registration View</title>
</head>
<body>
<h1>Login Controller Test</h1>

<?php
include_once("../controllers/LoginController.class.php");
include_once("../models/UserData.class.php");
include_once("../views/LoginView.class.php");
?>

<h2>It should call the run method for the input from $GET</h2>
<?php 
$_SERVER ["REQUEST_METHOD"] = "GET";
$_GET = array("userName => Thugnificent",
		       "password => 12345678"		
              );
LoginController::run();
?>
</body>
</html>