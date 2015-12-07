<?php
class LoginController {
	public static function run() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$user = new User ( $_POST );
			if ($user->getErrorCount() == 0) {
				ProfileView::show( $user );	
			} else {
				LoginView::show( $user );
			}
		} else {
			LoginView::show( null );
		}
	}
}
?>