<?php
class ProfileController {
	public static function run() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			if ($user->getErrorCount() == 0) {
				HomeView::show( );	
			} else {
				ProfileView::show( );
			}
		} else {
			ProfileView::show( );
		}
	}
}
?>