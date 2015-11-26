<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for User</title>
</head>
<body>
<h1>User Test</h1>

<?php
include_once("../views/SignupView.class.php");
include_once("../models/User.class.php");
?>

<h2>It should call show when $user has an input</h2>
<?php 
$validUser = array("userName" => "Thugnificent",
		           "password" => "12345678"
);
$userTest1 = new User($validUser);
echo "The object is: $userTest1<br>";
$test1 = (is_object($userTest1))?'':
'Failed: It should create a valid object when valid input is provided<br>';
echo $test1;
$test2 = (empty($userTest1->getErrors()))?'':
'Failed: It should not have errors when valid input is provided<br>';
echo $test2;
?>

<h2>It should extract the parameters that went in</h2>
<?php 
$props = $userTest1->getParameters();
print_r($props);
?>

<h2>It should have an error when the first name contains invalid characters</h2>
<?php 
$invalidUser = array("userName" => "Thugnifi(en7",
		             "password" => "12345678"
);
$userTest2 = new User($invalidUser);
$test2 = (empty($userTest2->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for username is: ". $userTest2->getError('userName') ."<br>";
echo "The object is: $userTest2<br>";
?>

<h2>It should have an error when the password is less than 8 characters</h2>
<?php 
$invalidUser = array("userName" => "Thugnificent", 
		             "password" => "12345"
);
$userTest3 = new User($invalidUser);
$test2 = (empty($userTest3->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for password is: ". $userTest3->getError('password') ."<br>";
echo "The object is: $userTest3<br>";
?>
</body>
</html>