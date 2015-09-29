<?php
// include ("Messages.class.php");
class UserData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $userName;
	private $picture;
	private $lastName;
	private $address;
	private $neighborhood;
	private $male;
	private $female;
	private $email;
	private $phone;
	private $url;
	
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

	public function getUserName() {
		return $this->userName;
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
		   $this->validateProfilePicture();
		   $this->validateLastName();
		   $this->validateFirstName();
		   $this->validateAddress();
		   $this->validateNeighborhood();
		   $this->validateGender();
		   $this->validateEmail();
		   $this->validatePhone();
		   $this->validateURL();
		}
	}

	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
	 	$this->userName = "";
	}
	
	private function validateProfilePicture() {
		$this->picture = $this->extractForm('picture');
		if (empty($this->picture))
			$this->setError('picture', 'PROFILE_PICTURE_EMPTY');
	}
	
	private function validateFirstName() {
		$this->firstName = $this->extractForm('firstName');
		if (empty($this->firstName))
			$this->setError('firstName', 'FIRST_NAME_EMPTY');
		elseif (!filter_var($this->firstName, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^([a-zA-Z0-9\-\_])+$/i")) )) {
			$this->setError('firstName', 'FIRST_NAME_HAS_INVALID_CHARS');
		}
	}
	
	private function validateLastName() {
		$this->lastName = $this->extractForm('lastName');
		if (empty($this->lastName))
			$this->setError('lastName', 'LAST_NAME_EMPTY');
		elseif (!filter_var($this->lastName, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^([a-zA-Z0-9\-\_])+$/i")) )) {
			$this->setError('lastName', 'LAST_NAME_HAS_INVALID_CHARS');
		}
	}
	
	private function validateAddress() {
		$this->address = $this->extractForm('address');
		if (empty($this->address))
			$this->setError('address', 'ADDRESS_EMPTY');
		elseif (!filter_var($this->address, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^[0-9]+(\s*[a-zA-Z\-]+)+$/i")) )) {
			$this->setError('address', 'ADDRESS_HAS_INVALID_FORMAT');
		}
	}
	
	private function validateNeighborhood() {
		$this->neighborhood = $this->extractForm('neighborhood');
		if (empty($this->neighborhood))
			$this->setError('neighborhood', 'NEIGHBORHOOD_NAME_EMPTY');
		elseif (!filter_var($this->lastName, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^([a-zA-Z0-9\-\_])+$/i")) )) {
			$this->setError('lastName', 'NEIGHBORHOOD_HAS_INVALID_CHARS');
		}
	}
	
	private function validateGender() {
		$this->male = $this->extractForm('male');
		$this->female = $this->extractForm('female');
		if ($this->male == null && $this->female == null)
			$this->setError('gender', 'GENDER_NOT_SET');
	}
	
	private function validateEmail() {
		$this->email = $this->extractForm('email');
		if (empty($this->email))
			return;
		elseif (!filter_var($this->email, FILTER_VALIDATE_REGEXP,
			array("options"=>array("regexp" =>"/^[a-zA-Z0-9\-\_]+@[a-zA-Z]+\.com$/i")) )) {
			$this->setError('email', 'EMAIL_HAS_INVALID_FORMAT');
		}
	}
	
	private function validatePhone() {
		$this->phone = $this->extractForm('phone');
		if (empty($this->phone))
			return;
		if (!filter_var($this->phone, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^\([0-9][0-9][0-9]\)\s[0-9][0-9][0-9]\s-\s[0-9][0-9][0-9][0-9]$/i")) )) {
					$this->setError('phone', 'PHONE_HAS_INVALID_FORMAT');
				}
	}
	
	private function validateURL() {
		$this->url = $this->extractForm('url');
		if (empty($this->url))
			return;
		if (!filter_var($this->url, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^(https:\/\/|http:\/\/)[0-9a-zA-Z\-\_\/]+\.com$/i")) )) {
					$this->setError('url', 'URL_HAS_INVALID_FORMAT');
				}
	}
}
?>