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
	
	public static function getReviewRowSetsBy($type = null, $value = null) {
		// Returns the rows of Reviews whose $type field has value $value
		$allowedTypes = ["reviewId", "reviewerName", "submissionId", "score", "userId"];
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
	}

	public static function getReviewsArray($rowSets) {
		// Return an array of Review objects extracted from $rowSets
		$reviews = array();
		foreach ($rowSets as $reviewRow ) {
			$review = new Review($reviewRow);
			$review->setReviewId($reviewRow['reviewId']);
			array_push ($reviews, $review);
		}
		return $reviews;
	}
	
	public static function getMoviesBy($type=null, $value=null) {
		// Returns Review objects whose $type field has value $value
		$movieRows = MoviesDB::getReviewRowSetsBy($type, $value);
		return MoviesDB::getReviewsArray($movieRows);
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
	
	public static function updateReview($review) {
		// Update a review 
		try {
			$db = Database::getDB ();
			if (is_null($review) || $review->getErrorCount() > 0)
				return $review;
	  	    $checkReview = ReviewsDB::getReviewsBy('reviewId', $review->getReviewId());
		    if (empty($checkReview))
		    	$review->setError('reviewId', 'REVIEW_DOES_NOT_EXIST');	
		    elseif ($checkReview[0]->getSubmissionId() != $review->getSubmissionId())
		        $review->setError('reviewId', 'REVIEW_HAS_WRONG_SUBMISSION_ID');
		    elseif ($checkReview[0]->getreviewerName() != $review->getReviewerName())
		        $review->setError('reviewId', 'REVIEWER_NAME_DOES_NOT_MATCH');
		    if ($review->getErrorCount() > 0)
		    	return $review;
		    
	    	$query = "UPDATE Reviews SET review = :review, score = :score
	    			                 WHERE reviewId = :reviewId";
		
			$statement = $db->prepare ($query);
			$statement->bindValue(":review", $review->getReview());
			$statement->bindValue(":score", $review->getScore());
			$statement->bindValue(":reviewId", $review->getReviewId());
			$statement->execute ();
			$statement->closeCursor();
		} catch (Exception $e) { // Not permanent error handling
			$review->setError('reviewId', 'REVIEW_COULD_NOT_BE_UPDATED');
		}
		return $review;
	}
}
?>