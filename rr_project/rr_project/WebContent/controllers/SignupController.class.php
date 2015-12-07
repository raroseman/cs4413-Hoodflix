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
			if ($user->getErrorCount() == 0 && $userData->getErrorCount() == 0) {
				$dbUserData = UsersDB::addUser($user, $userData);
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