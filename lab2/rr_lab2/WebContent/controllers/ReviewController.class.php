<?php
class ReviewController {
	public static function run() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$user = new User ( $_POST );
			$userData = new UserData( $_POST );
			if ($user->getErrorCount() == 0 && $userData->getErrorCount() == 0) {
				HomeView::show();
			} else {
				ReviewView::show( $user, $userData );
			}
		} else {
			ReviewView::show( null, null );	
		}
	}
}
?>