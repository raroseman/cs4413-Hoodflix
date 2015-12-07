<?php
include_once("Messages.class.php");
class MovieData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $movieTitle;
	private $releaseDate;
	private $returnBy;
	private $copyAvailable;
	
	public function __construct($formInput = null) {
		$this->formInput = $formInput;
		Messages::reset();
		$this->initialize();
	}

	public function getError($errorName) {
		if (isset($this->errors[$errorName]))
			return $this->errors[$errorName];
		else
			return "";
	}

	public function setError($errorName, $errorValue) {
		// Sets a particular error value and increments error count
		$this->errors[$errorName] =  Messages::getError($errorValue);
		$this->errorCount ++;
	}

	public function getErrorCount() {
		return $this->errorCount;
	}

	public function getErrors() {
		return $this->errors;
	}

	public function setMovieId($id) {
		// Set the value of the userId to $id
		$this->movieId = $id;
	}
	
	public function getMovieTitle() {
		return $this->movieTitle;
	}
	
	public function getReleaseDate() {
		return $this->releaseDate;
	}
	
	public function getReturnBy() {
		return $this->returnBy;
	}
	
	public function getCopyAvailable() {
		return $this->copyAvailable;
	}
	
	public function makeCopyAvailable() {
		return true;
	}
	
	public function makeCopyUnavailable() {
		return false;
	}
	
	public function getMovieId() {
		return $this->movieId;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("movieTitle" => $this->movieTitle,
				            "releaseDate" => $this->releaseDate,
				            "returnBy" => $this->returnBy,
		                     "copyAvailable" => $this->copyAvailable
		); 
		return $paramArray;
	}

	public function __toString() {
		$str = "Movie Title: ".$this->movieTitle." Release date: ".$this->releaseDate." Return By: ".$this->returnBy." Copy available: ".$this->copyAvailable;
		return $str;
	}
	
	private function extractForm($valueName) {
		// Extract a stripped value from the form array
		$value = "";
		if (isset($this->formInput[$valueName])) {
			$value = trim($this->formInput[$valueName]);
			$value = stripslashes ($value);
			$value = htmlspecialchars ($value);
			return $value;
		}
	}
	
	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		if (is_null($this->formInput))
			$this->initializeEmpty();
		else { 	 
		   $this->validateMovieTitle();
		   $this->validateReleaseDate();
		   $this->validateReturnBy();
		   $this->validateCopyAvailable();
		}
	}

	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
	 	$this->userName = "";
	}

	private function validateUserName() {
		// Username should only contain letters, numbers, dashes and underscore
		$this->userName = $this->extractForm('reviewedBy');
		if (empty($this->userName)) 
			$this->setError('userName', 'USER_NAME_EMPTY');
		elseif (!filter_var($this->userName, FILTER_VALIDATE_REGEXP,
			array("options"=>array("regexp" =>"/^([a-zA-Z0-9\-\_])+$/i")) )) {
			$this->setError('userName', 'USER_NAME_HAS_INVALID_CHARS');
		}
	}	
	
	private function validateMovieTitle() {
		$this->movieTitle = $this->extractForm('movieTitle');
		if (empty($this->movieTitle))
			$this->setError('movieTitle', 'MOVIE_TITLE_EMPTY');
	}
	
	private function validateReleaseDate() {
		$this->releaseDate = $this->extractForm('releaseDate');
		if (empty($this->releaseDate))
			$this->setError('releaseDate', 'RELEASE_DATE_EMPTY');
	}
	
	private function validateReturnBy() {
		$this->returnBy = $this->extractForm('returnBy');
		//if (empty($this->returnBy))
		//	$this->setError('returnBy', 'RETURN_BY_EMPTY');
	}
	
	private function validateCopyAvailable() {
		$this->copyAvailable = $this->extractForm('copyAvailable');
		//if (empty($this->copyAvailable))
		//	$this->setError('copyAvailable', 'COPY_AVAILABLE_EMPTY');
	}
}
?>