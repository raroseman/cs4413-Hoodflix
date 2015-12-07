<?php
class SignupController {
	public static function run() {
		$user = null;
		$userData = null;
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$user = new User ( $_POST );
			//$dbUser = UsersDB::addUser($user);
			$userData = new UserData( $_POST );
			//$_POST["userId"] = $user->getUserId();
			$dbUserData = UsersDB::addUser($user, $userData);
			if ($user->getErrorCount() == 0 && $userData->getErrorCount() == 0) {
				ProfileView::show($user, $userData);
			} else {
				SignupView::show( $user, $userData );
				
			}
		} else {
			SignupView::show( null, null );	
		}
	}
}
?>