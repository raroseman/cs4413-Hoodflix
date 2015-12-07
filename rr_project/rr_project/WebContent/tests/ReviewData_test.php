<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for User</title>
</head>
<body>
<h1>Review Data Test</h1>

<?php
include_once("../views/ReviewView.class.php");
include_once("../models/ReviewData.class.php");
?>

<h2>It should call show when $reviewData has an input</h2>
<?php 
$validUser = array( "movieTitle" => "Friday",
		            "reviewedBy" => "Thugnificent",
		            "reviewedOn" => "2015-10",
		            "review" => "A+! Great Movie!"
);
$reviewTest1 = new ReviewData($validUser);
echo "The object is: $reviewTest1<br>";
$test1 = (is_object($reviewTest1))?'':
'Failed: It should create a valid object when valid input is provided<br>';
echo $test1;
$test2 = (empty($reviewTest1->getErrors()))?'':
'Failed: It should not have errors when valid input is provided<br>';
echo $test2;
?>

<h2>It should extract the parameters that went in</h2>
<?php 
$props = $reviewTest1->getParameters();
print_r($props);
?>

<h2>It should have an error when the movie title is empty</h2>
<?php 
$invalidUser = array( "movieTitle" => "",
		              "reviewedBy" => "Thugnificent",
		              "reviewedOn" => "2015-10",
		              "review" => "A+! Great Movie!"
);
$reviewTest2 = new ReviewData($invalidUser);
$test2 = (empty($reviewTest2->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for movieTitle is: ". $reviewTest2->getError('movieTitle') ."<br>";
echo "The object is: $reviewTest2<br>";
?>

<h2>It should have an error when the reviewed by contains invalid characters</h2>
<?php 
$invalidUser = array( "movieTitle" => "Friday",
		              "reviewedBy" => "Thugnifi(en7",
		              "reviewedOn" => "2015-10",
		              "review" => "A+! Great Movie!"
);
$reviewTest3 = new ReviewData($invalidUser);
$test2 = (empty($reviewTest3->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for movieTitle is: ". $reviewTest3->getError('userName') ."<br>";
echo "The object is: $reviewTest3<br>";
?>

<h2>It should have an error when the reviewed on is empty</h2>
<?php 
$invalidUser = array( "movieTitle" => "Friday",
		              "reviewedBy" => "Thugnificent",
		              "reviewedOn" => "",
		              "review" => "A+! Great Movie!"
);
$reviewTest4 = new ReviewData($invalidUser);
$test2 = (empty($reviewTest4->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for movieTitle is: ". $reviewTest4->getError('reviewedOn') ."<br>";
echo "The object is: $reviewTest4<br>";
?>

<h2>It should have an error when the review is empty</h2>
<?php 
$invalidUser = array( "movieTitle" => "Friday",
		              "reviewedBy" => "Thugnificent",
		              "reviewedOn" => "2015-10",
		              "review" => ""
);
$reviewTest5 = new ReviewData($invalidUser);
$test2 = (empty($reviewTest5->getErrors()))?'':
'Failed:It should have errors when invalid input is provided<br>';
echo $test2;
echo "The error for movieTitle is: ". $reviewTest5->getError('review') ."<br>";
echo "The object is: $reviewTest5<br>";
?>
</body>
</html>