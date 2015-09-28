<?php
class SignupController {
	public static function run() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$user = new User ( $_POST );
			if ($user->getErrorCount() == 0) {
				HomeView::show();
				echo $user->getErrorCount();
			} else {
				SignupView::show( $user );
				echo $user->getErrorCount();
			}
		} else {
			SignupView::show( null );
			echo $user->getErrorCount();
		}
	}
}
?>