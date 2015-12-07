<?php

class ReviewView {

  public static function show( $reviewData ) {  
  	MasterView::showHeader();
  	MasterView::showNavbar();
  	echo "<br>";
  	echo "<br>";
  	echo "<br>";
?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Review</title>
	</head>
	<body>
		<form method="post">
			<section>
				<h1>FliX Reviews</h1>
					Movie Title <input type="text" name="movieTitle" <?php if (!is_null($reviewData)) { echo 'value = "'. $reviewData->getMovieTitle() .'"'; }?>> <?php if (!is_null($reviewData)) {echo $reviewData->getError('movieTitle');}?><br><br>	
					Reviewed By <input type="text" name="reviewedBy"<?php if (!is_null($reviewData)) { echo 'value = "'. $reviewData->getUserName() .'"'; }?>> <?php if (!is_null($reviewData)) {echo $reviewData->getError('userName');}?><br><br>
					Reviewed On <input type="text" name="reviewedOn" <?php if (!is_null($reviewData)) { echo 'value = "'. $reviewData->getReviewedOn() .'"'; }?> tabindex="16"> <?php if (!is_null($reviewData)) {echo $reviewData->getError('reviewedOn');}?><br><br>
					Review <br><br><textarea name="review" rows="10" cols="30" tabindex="21"><?php if (!is_null($reviewData)) { echo $reviewData->getReview(); }?></textarea><?php if (!is_null($reviewData)) {echo $reviewData->getError('review');}?><br><br>
			</section>
				
			<input type="submit" name="submit"><br>
		</form>
	</body>
	</html>

<?php
	}
}		
?>