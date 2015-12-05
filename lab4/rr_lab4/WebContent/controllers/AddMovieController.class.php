<?php
class AddMovieController {
	public static function run() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$movieData = new MovieData ( $_POST );
			print_r($_POST);
			$dbMovieData = MoviesDB::addMovie($movieData);
			if ($movieData->getErrorCount() == 0) {
				HomeView::show();	
			} else {
				AddMovieView::show( $movieData );
			}
		} else {
			AddMovieView::show( null );
		}
	}
}
?>