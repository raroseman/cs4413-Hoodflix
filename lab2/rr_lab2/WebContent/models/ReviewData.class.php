<?php
include_once("Messages.class.php");
class ReviewData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $movieTitle;
	private $userName;
	private $reviewedOn;
	private $review;
	
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

	public function getMovieTitle() {
		return $this->movieTitle;
	}
	
	public function getUserName() {
		return $this->userName;
	}
	
	public function getReviewedOn() {
		return $this->reviewedOn;
	}
	
	public function getReview() {
		return $this->review;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("userName" => $this->userName); 
		return $paramArray;
	}

	public function __toString() {
		$str = "User name: ".$this->userName;
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
		   $this->validateUserName();
		   $this->validateReviewedOn();
		   $this->validateReview();
		}
	}

	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
	 	$this->userName = "";
	}

	private function validateUserName() {
		// Username should only contain letters, numbers, dashes and underscore
		$this->userName = $this->extractForm('userName');
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
	
	private function validateReviewedOn() {
		$this->reviewedOn = $this->extractForm('reviewedOn');
		if (empty($this->reviewedOn))
			$this->setError('reviewedOn', 'REVIEWED_ON_EMPTY');
	}
	
	private function validateReview() {
		$this->review = $this->extractForm('review');
		if (empty($this->review))
			$this->setError('review', 'REVIEW_EMPTY');
	}
}
?>