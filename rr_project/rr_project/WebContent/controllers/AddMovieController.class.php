<?php
class AddMovieController {
	public static function run() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$movieData = new MovieData ( $_POST );			
			if ($movieData->getErrorCount() == 0) {
				$dbMovieData = MoviesDB::addMovie($movieData);
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

