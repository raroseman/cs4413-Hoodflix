<?php
class SignupController {
	public static function run() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$user = new User ( $_POST );
			$userData = new UserData( $_POST );
			if ($user->getErrorCount() == 0 && $userData->getErrorCount() == 0) {
				HomeView::show();
			} else {
				SignupView::show( $user, $userData );	
			}
		} else {
			SignupView::show( null, null );	
		}
	}
}
?>