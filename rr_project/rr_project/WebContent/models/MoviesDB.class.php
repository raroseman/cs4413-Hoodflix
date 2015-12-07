<?php
class MoviesDB {
	
	public static function addMovie($movie) {
		// Inserts $review into the Reviews table and returns reviewId
		$query = "INSERT INTO Movies (movieTitle, releaseDate, returnBy, copyAvailable)
		                      VALUES(:movieTitle, :releaseDate, :returnBy, :copyAvailable)";
		try {
			$db = Database::getDB ();
			if (is_null($movie) || $movie->getErrorCount() > 0)
				return $movie;
			//$movies = MoviesDB::getMoviesBy('movieTitle', $movie->getMovieTitle());
			//if (is_null($movies) || empty($movies)) {
			//	$movie->setError('movieTitle', 'MOVIE_TITLE_DOES_NOT_EXIST');
			//	return $movie;
			//}
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<h1>h00dFliX Reviews</h1>";
			$statement = $db->prepare ($query);
			$statement->bindValue(":movieTitle", $movie->getMovieTitle());					
			$statement->bindValue(":releaseDate", $movie->getReleaseDate());
			$statement->bindValue(":returnBy", $movie->getReturnBy());	
			$statement->bindValue(":copyAvailable", $movie->makeCopyAvailable());
			$statement->execute ();		
			$statement->closeCursor();
			$returnId = $db->lastInsertId("movieId");
			$movie->setMovieId($returnId);
		} catch (Exception $e) { // Not permanent error handling
			echo $e;
			$movie->setError('movieId', 'MOVIE_IDENTITY_INVALID');
		}
		return $movie;
	}
	
	public static function getMoviesRowSetsBy($type = null, $value = null) {
		// Returns the rows of Users whose $type field has value $value
		$allowedTypes = ["movieId", "movieTitle", "releaseDate", "returnBy", "copyAvailable"];
		$moviesRowSets = array();
		try {
			$db = Database::getDB ();
			$query = "SELECT movieId, movieTitle, releaseDate, returnBy, copyAvailable FROM Movies";
			if (!is_null($type)) {
				if (!in_array($type, $allowedTypes))
					throw new PDOException("$type not an allowed search criterion for Movies");
				$query = $query. " WHERE ($type = :$type)";
				$statement = $db->prepare($query);
				$statement->bindParam(":$type", $value);
			} else
				$statement = $db->prepare($query);
			$statement->execute ();
			$moviesRowSets = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor ();
		} catch (Exception $e) { // Not permanent error handling
			echo "<p>Error getting user rows by $type: " . $e->getMessage () . "</p>";
		}
		return $moviesRowSets;
	}
	
	/*public static function getMoviesRowSetsBy($type = null, $value = null) {
		// Returns the rows of Reviews whose $type field has value $value
		$allowedTypes = ["movieId", "movieTitle", "releaseDate", "returnBy", "copyAvailable"];
		$typeAlias = array("reviewerName" => "Users.userName");
		$reviewRowSets = array();
		try {
			$db = Database::getDB ();
			$query = "SELECT Reviews.reviewId, Reviews.submissionId, 
					  Reviews.score, Reviews.reviewerId, Users.userName as reviewerName, Reviews.review
	   		          FROM Reviews LEFT JOIN Users ON Reviews.reviewerId = Users.userId";
			if (!is_null($type)) {
			    if (!in_array($type, $allowedTypes))
					throw new PDOException("$type not an allowed search criterion for Reviews");
				$typeValue = (isset($typeAlias[$type]))?$typeAlias[$type]:$type; 
			    $query = $query. " WHERE ($typeValue = :$type)";
			    $statement = $db->prepare($query);
			    $statement->bindParam(":$type", $value);
			} else 
				$statement = $db->prepare($query);
			$statement->execute ();
			$reviewRowSets = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor ();
		} catch (Exception $e) { // Not permanent error handling
		
		}
		return $reviewRowSets;
	}*/

	public static function getMoviesArray($rowSets) {
		// Return an array of Review objects extracted from $rowSets
		$movies = array();
		foreach ($rowSets as $moviesRow ) {
			$movie = new MovieData($moviesRow);
			$movie->setMovieId($moviesRow['movieId']);
			array_push ($movies, $movie);
		}
		return $movies;
	}
	
	public static function getMoviesBy($type=null, $value=null) {
		// Returns Review objects whose $type field has value $value
		$movieRows = MoviesDB::getMoviesRowSetsBy($type, $value);
		return MoviesDB::getMoviesArray($movieRows);
	}
	
	public static function getReviewValues($rowSets, $column) {
		// Returns an array of values from $column extracted from $rowSets
		$reviewValues = array();
		foreach ($rowSets as $reviewRow )  {
			$reviewValue = $reviewRow[$column];
			array_push ($reviewValues, $reviewValue);
		}
		return $reviewValues;
	}
	
	public static function getReviewValuesBy($column, $type=null, $value=null) {
		// Returns the $column of Reviews whose $type field has value $value
		$reviewRows = ReviewsDB::getReviewRowSetsBy($type, $value);
		return ReviewsDB::getReviewValues($reviewRows, $column);
	}
	
	public static function updateMovies($movie) {
		// Update a review 
		try {
			$_SESSION['movie'] = $movie;
			$db = Database::getDB ();
			if (is_null($movie) || $movie->getErrorCount() > 0)
				return $movie;
	  	    $checkMovie = MoviesDB::getMoviesBy('movieId', $movie->getMovieId());
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    echo "<br>";
	  	    print_r($checkMovie);
		    if (empty($checkMovie))
		    	$movie->setError('movieId', 'MOVIE_DOES_NOT_EXIST');	
		    /*elseif ($checkMovie[0]->getSubmissionId() != $movie->getSubmissionId())
		        $movie->setError('movieId', 'REVIEW_HAS_WRONG_SUBMISSION_ID');
		    elseif ($checkMovie[0]->getreviewerName() != $movie->getReviewerName())
		        $movie->setError('movieId', 'REVIEWER_NAME_DOES_NOT_MATCH');*/
		    if ($movie->getErrorCount() > 0)
		    	echo "<br>";
		    	echo "<br>";
		    	echo "<br>";
		    	print_r($movie);
		    	return $movie;
		    
	    	$query = "UPDATE Movies SET copyAvailable = :copyAvailable
	    			                 WHERE movieTitle = :movieTitle";
		
			$statement = $db->prepare ($query);
			//$statement->bindValue(":movieId", $movie->getMovieId());
			$statement->bindValue(":movieTitle", $movie->getMovieTitle());
			$statement->bindValue(":copyAvailable", $movie->makeCopyUnavailable());
			$statement->execute ();
			$statement->closeCursor();
		} catch (Exception $e) { // Not permanent error handling
			$movie->setError('movieId', 'MOVIE_COULD_NOT_BE_UPDATED');
		}
		return $movie;
	}
}
?>