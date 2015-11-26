<html>
<head>
<meta charset="utf-8">
<title>Basic tests for ReviewView</title>
</head>
<body>
<h1>ReviewView Test</h1>

<?php
include_once("../models/ReviewData.class.php");
include_once("../views/ReviewView.class.php");
?>

<h2>It should call show when $reviewData has an input</h2>
<?php 

$testReviewData = array( "movieTitle" => "Friday",
		                 "reviewedBy" => "Thugnificent",
		                 "reviewedOn" => "2015-10",
		                 "review" => "A+! Great Movie!"
);

$reviewDataTest = new ReviewData($testReviewData);
ReviewView::show($reviewDataTest);
?>
</body>
</html>