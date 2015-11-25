<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Basic tests for User Registration View</title>
</head>
<body>
<h1>Review Controller Test</h1>

<?php
include_once("../controllers/ReviewController.class.php");
include_once("../views/ReviewView.class.php");
?>

<h2>It should call call the run method for the input from $GET</h2>
<?php 
$_SERVER ["REQUEST_METHOD"] = "GET";
$_GET = array( "movieTitle" => "Friday",
		       "reviewedBy" => "Thugnificent",
		       "reviewedOn" => "2015-10",
		       "review" => "A+! Great Movie!"
             );
ReviewController::run();
?>
</body>
</html>