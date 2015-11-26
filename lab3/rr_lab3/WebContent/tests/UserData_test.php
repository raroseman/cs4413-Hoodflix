<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for User Data</title>
</head>
<body>
<h1>User Data Test</h1>

<?php
include_once("../views/SignupView.class.php");
include_once("../models/UserData.class.php");
?>

<h2>It should create a valid User object when all input is provided</h2>
<?php
$validUser = array( "userName" => "Thugnificent",
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
$userDataTest1 = new UserData($validUser);
echo "The object is: $userDataTest1<br>";
$test1 = (is_object($userDataTest1))?'':
'Failed: It should create a valid object when valid input is provided<br>';
echo $test1;
$test2 = (empty($userDataTest1->getErrors()))?'':
'Failed: It should not have errors when valid input is provided<br>';
echo $test2;
?>

<h2>It should extract the parameters that went in</h2>
<?php 
$props = $userDataTest1->getParameters();
print_r($props);
?>

<h2>It should have an error when the user name contains invalid characters</h2>
<?php 
$invalidUser = array( "userName" => "Thugnifi(en7",
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
$userDataTest2 = new UserData($invalidUser);
$test2 = (empty($userDataTest2->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for userName is: ". $userDataTest2->getError('userName') ."<br>";
echo "The object is: $userDataTest2<br>";
?>

<h2>It should have an error when the picture is empty</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "",
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
$userDataTest3 = new UserData($invalidUser);
$test2 = (empty($userDataTest3->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for picture is: ". $userDataTest3->getError('picture') ."<br>";
echo "The object is: $userDataTest3<br>";
?>

<h2>It should have an error when the first name is empty</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "",
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
$userDataTest4 = new UserData($invalidUser);
$test2 = (empty($userDataTest4->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for first name is: ". $userDataTest4->getError('firstName') ."<br>";
echo "The object is: $userDataTest4<br>";
?>

<h2>It should have an error when the last name is empty</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "Otis",
		              "lastName" => "",
		              "address" => "123 Thug Lane",
		              "neighborhood" => "Woodcrest",
		              "dateOfBirth" => "1989-01",
		              "gender" => "male",
		              "comedy" => "checked",
		              "email" => "thugnasty@gmail.com",
		              "phone" => "(210) 555 - 5555",
		              "url" => "https://otis_jenkins/facebook.com"
);
$userDataTest5 = new UserData($invalidUser);
$test2 = (empty($userDataTest5->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for last name is: ". $userDataTest5->getError('lastName') ."<br>";
echo "The object is: $userDataTest5<br>";
?>

<h2>It should have an error when the address is empty</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "Otis",
		              "lastName" => "Jenkins",
		              "address" => "",
		              "neighborhood" => "Woodcrest",
		              "dateOfBirth" => "1989-01",
		              "gender" => "male",
		              "comedy" => "checked",
		              "email" => "thugnasty@gmail.com",
		              "phone" => "(210) 555 - 5555",
		              "url" => "https://otis_jenkins/facebook.com"
);
$userDataTest6 = new UserData($invalidUser);
$test2 = (empty($userDataTest6->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for address is: ". $userDataTest6->getError('address') ."<br>";
echo "The object is: $userDataTest6<br>";
?>

<h2>It should have an error when the neighborhood is empty</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "Otis",
		              "lastName" => "Jenkins",
		              "address" => "123 Thug Lane",
		              "neighborhood" => "",
		              "dateOfBirth" => "1989-01",
		              "gender" => "male",
		              "comedy" => "checked",
		              "email" => "thugnasty@gmail.com",
		              "phone" => "(210) 555 - 5555",
		              "url" => "https://otis_jenkins/facebook.com"
);
$userDataTest7 = new UserData($invalidUser);
$test2 = (empty($userDataTest7->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for neighborhood is: ". $userDataTest7->getError('neighborhood') ."<br>";
echo "The object is: $userDataTest7<br>";
?>

<h2>It should have an error when the date of birth is empty</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "Otis",
		              "lastName" => "Jenkins",
		              "address" => "123 Thug Lane",
		              "neighborhood" => "Woodcrest",
		              "dateOfBirth" => "",
		              "gender" => "male",
		              "comedy" => "checked",
		              "email" => "thugnasty@gmail.com",
		              "phone" => "(210) 555 - 5555",
		              "url" => "https://otis_jenkins/facebook.com"
);
$userDataTest8 = new UserData($invalidUser);
$test2 = (empty($userDataTest8->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for date of birth is: ". $userDataTest8->getError('dateOfBirth') ."<br>";
echo "The object is: $userDataTest8<br>";
?>

<h2>It should have an error when the gender is empty</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "Otis",
		              "lastName" => "Jenkins",
		              "address" => "123 Thug Lane",
		              "neighborhood" => "Woodcrest",
		              "dateOfBirth" => "1989-01",
		              "gender" => "",
		              "comedy" => "checked",
		              "email" => "thugnasty@gmail.com",
		              "phone" => "(210) 555 - 5555",
		              "url" => "https://otis_jenkins/facebook.com"
);
$userDataTest9 = new UserData($invalidUser);
$test2 = (empty($userDataTest9->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for gender is: ". $userDataTest9->getError('gender') ."<br>";
echo "The object is: $userDataTest9<br>";
?>

<h2>It should have an error when the comedy checkbox is unchecked</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "Otis",
		              "lastName" => "Jenkins",
		              "address" => "123 Thug Lane",
		              "neighborhood" => "Woodcrest",
		              "dateOfBirth" => "1989-01",
		              "gender" => "male",
		              "comedy" => "",
		              "email" => "thugnasty@gmail.com",
		              "phone" => "(210) 555 - 5555",
		              "url" => "https://otis_jenkins/facebook.com"
);
$userDataTest10 = new UserData($invalidUser);
$test2 = (empty($userDataTest10->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for comedy is: ". $userDataTest10->getError('genres') ."<br>";
echo "The object is: $userDataTest10<br>";
?>

<h2>It should have an error when the email isnt in the format of text@text.com</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "Otis",
		              "lastName" => "Jenkins",
		              "address" => "123 Thug Lane",
		              "neighborhood" => "Woodcrest",
		              "dateOfBirth" => "1989-01",
		              "gender" => "male",
		              "comedy" => "checked",
		              "email" => "thugnasty.gmail.com",
		              "phone" => "(210) 555 - 5555",
		              "url" => "https://otis_jenkins/facebook.com"
);
$userDataTest11 = new UserData($invalidUser);
$test2 = (empty($userDataTest11->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for email is: ". $userDataTest11->getError('email') ."<br>";
echo "The object is: $userDataTest11<br>";
?>

<h2>It should have an error when the email isnt in the format (xxx) xxx - xxxx</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
		              "picture" => "../images/thugnificent.jpg",
		              "firstName" => "Otis",
		              "lastName" => "Jenkins",
		              "address" => "123 Thug Lane",
		              "neighborhood" => "Woodcrest",
		              "dateOfBirth" => "1989-01",
		              "gender" => "male",
		              "comedy" => "checked",
		              "email" => "thugnasty@gmail.com",
		              "phone" => "2105555555",
		              "url" => "https://otis_jenkins/facebook.com"
);
$userDataTest12 = new UserData($invalidUser);
$test2 = (empty($userDataTest12->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for phone is: ". $userDataTest12->getError('phone') ."<br>";
echo "The object is: $userDataTest12<br>";
?>

<h2>It should have an error when the url isnt in the format http:// or https://text.com</h2>
<?php 
$invalidUser = array( "userName" => "Thugnificent",
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
		              "url" => "otis_jenkins/facebook.com"
);
$userDataTest13 = new UserData($invalidUser);
$test2 = (empty($userDataTest13->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for url is: ". $userDataTest13->getError('url') ."<br>";
echo "The object is: $userDataTest13<br>";
?>
</body>
</html>
