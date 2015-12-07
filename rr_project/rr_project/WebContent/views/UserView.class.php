<?php
class UserView {
	
	public static function showAll() {
		$_SESSION['styles'] = array('site.css');
	
		if (array_key_exists('headertitle', $_SESSION)) {
			MasterView::showHeader();
		}
		MasterView::showNavBar();
	
		$users = (array_key_exists('users', $_SESSION)) ? $_SESSION['users'] : array();
		$base = (array_key_exists('base', $_SESSION)) ? $_SESSION['base'] : "";
		
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<h1>h00dFliX Users</h1>";
		echo "<table style=width:15%>";
		echo "<thead>";
		echo "<tr><th>userId</th><th>User Name</th></tr>";
		echo "</thead>";
		echo "<tbody>";
		foreach ($users as $user) {
			echo '<tr>';
			echo '<td>'.$user->getUserId().'</td>';
			echo '<td>'.$user->getUserName().'</td>';
			echo '</tr>';
		}
		echo "</tbody>";
		echo "</table>";
	
		MasterView::showPageEnd();
	}
}