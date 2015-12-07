<?php
class ShowMoviesView {
	
	public static function showAll() {
		$_SESSION['styles'] = array('site.css');
	
		if (array_key_exists('headertitle', $_SESSION)) {
			MasterView::showHeader();
		}
		MasterView::showNavBar();

		$movies = (array_key_exists('movies', $_SESSION)) ? $_SESSION['movies'] : array();
		$base = (array_key_exists('base', $_SESSION)) ? $_SESSION['base'] : "";
	
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<h1>h00dFliX Movies</h1>";
		echo "<table style=width:25%>";
		echo "<thead>";
		echo "<tr><th>movieId</th><th>movie Title</th><th>Release Date</th><th>Return By</th><th>Copy Available</th></tr>";
		echo "</thead>";
		echo "<tbody>";
		foreach ($movies as $movie) {
			echo '<tr>';
			echo '<td>'.$movie->getMovieId().'</td>';
			echo '<td>'.$movie->getMovieTitle().'</td>';
			echo '<td>'.$movie->getReleaseDate().'</td>';
			echo '<td>'.$movie->getReturnBy().'</td>';
			echo '<td>'.$movie->getCopyAvailable().'</td>';
			//echo '<td><a href="/'.$base.'/user/show/'.$user->getUserId().'">Show</a></td>';
			//echo '<td><a href="/'.$base.'/user/update/'.$user->getUserId().'">Update</a></td>';
			echo '</tr>';
		}
		echo "</tbody>";
		echo "</table>";
	
		MasterView::showPageEnd();
	}
}