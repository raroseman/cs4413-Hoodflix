<?php
class RequestMovieController {
	public static function run() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			$movieData = new MovieData ( $_POST );
			
			$dbMovieData = MoviesDB::updateMovie($movieData);
			if ($movieData->getErrorCount() == 0) {
				HomeView::show();	
			} else {
				RequestMovieView::show( $movieData );
			}
		} else {
			RequestMovieView::show( null );
		}
	}
}
?>