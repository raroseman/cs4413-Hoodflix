<?php
class AddReviewController {
	public static function run() {
		$action = (array_key_exists('action', $_SESSION))?$_SESSION['action']:"";
		$arguments = $_SESSION['arguments'];
		switch ($action) {
			case "new":
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
				break;
			case "show":
				$users = UsersDB::getUsersBy('userId', $arguments);
				$_SESSION['user'] = (!empty($users))?$users[0]:null;
				self::show();
				break;
			case  "showall":
				$_SESSION['reviews'] = ReviewDB::getReviewsBy();
				$_SESSION['headertitle'] = "h00dFliX Reviews";
				$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
				ReviewsView::showall();
				break;
			case "update":
				echo "Update";
				self::updateUser();
				break;
			default:
		}	
	}
}
?>