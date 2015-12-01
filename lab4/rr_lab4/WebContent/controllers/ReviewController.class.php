<?php
class ReviewController {
	public static function run() {
		$reviewData = null;
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$reviewData = new ReviewData( $_POST );
			$dbReviewData = ReviewDB::addReview($reviewData);
			if ($reviewData->getErrorCount() == 0) {
				HomeView::show();
			} else {
				ReviewView::show( $reviewData );	
			}
		} else {
			ReviewView::show( null );
		}
	}
}
?>