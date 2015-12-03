<?php
class UserView {
	
	public static function showAll() {
		$_SESSION['styles'] = array('site.css');
	
		if (array_key_exists('headertitle', $_SESSION)) {
			MasterView::showHeader();
		}
		MasterView::showNavBar();
	
		$users = (array_key_exists('users', $_SESSION)) ? $_SESSION['users'] : array();
		$userData = (array_key_exists('users', $_SESSION)) ? $_SESSION['users'] : array();
		$base = (array_key_exists('base', $_SESSION)) ? $_SESSION['base'] : "";
	
		echo "<h1>h00dFliX Users</h1>";
		echo "<table>";
		echo "<thead>";
		echo "<tr><th>userId</th><th>User Name</th><th>Picture</th><th>Genre</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Neighborhood</th></tr>";
		echo "</thead>";
	    print_r($users);
		echo "<tbody>";
		foreach ($users as $user) {
			echo '<tr>';
			echo '<td>'.$user->getUserId().'</td>';
			echo '<td>'.$user->getUserName().'</td>';
			echo '<td>'.$userData->getPicture().'</td>';
			echo '<td><a href="/'.$base.'/user/show/'.$user->getUserId().'">Show</a></td>';
			echo '<td><a href="/'.$base.'/user/update/'.$user->getUserId().'">Update</a></td>';
			echo '</tr>';
		}
		echo "</tbody>";
		echo "</table>";
	
		MasterView::showFooter();
		MasterView::showPageEnd();
	}
}