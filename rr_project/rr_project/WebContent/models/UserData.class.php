<?php
include_once ("Messages.class.php");

class UserData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $userName;
	private $picture;
	private $genres = array();
	private $action;
	private $horror;
	private $comedy;
	private $romance;
	private $family;
	private $drama;
	private $firstName;
	private $lastName;
	private $address;
	private $neighborhood;
	private $gender;
	private $dateOfBirth;
	private $height;
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
	
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function getLastName() {
		return $this->lastName;
	}
	
	public function getAddress() {
		return $this->address;
	}
	
	public function getPicture() {
		return $this->picture;
	}
	
	public function getGenres() {
		return $this->genres;
	}
	
	public function getAction() {
		return $this->action;
	}
	
	public function getHorror() {
		return $this->horror;
	}
	
	public function getComedy() {
		return $this->comedy;
	}
	
	public function getRomance() {
		return $this->romance;
	}
	
	public function getFamily() {
		return $this->family;
	}
	
	public function getDrama() {
		return $this->drama;
	}
	
	public function getNeighborhood() {
		return $this->neighborhood;
	}
	
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}
	
	public function getGender() {
		return $this->gender;
	}
	
	public function getHeight() {
		return $this->height;
	}
	
	public function getEmail() {
		return $this->email;
	}	
	
	public function getPhone() {
		return $this->phone;
	}
	
	public function getURL() {
		return $this->url;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("userName" => $this->userName,
				            "picture" => $this->picture,
				            "firstName" => $this->firstName,
				            "lastName" => $this->lastName,
				            "address" => $this->address,
				            "neighborhood" => $this->neighborhood,
				            "dateOfBirth" => $this->dateOfBirth,
				            "gender" => $this->gender,
				            "comedy" => $this->comedy,
				            "email" => $this->email,
				            "phone" => $this->phone,
				            "url" => $this->url
		); 
		return $paramArray;
	}

	public function __toString() {
		$str = "User name: ".$this->userName." Picture: ".$this->picture." First Name: ".$this->firstName." Last Name: ".$this->lastName
		       ." Address: ".$this->address." Neighborhood: ".$this->neighborhood." Date of Birth: ".$this->dateOfBirth." Gender: ".$this->gender
		       ." Comedy: ".$this->comedy." Email: ".$this->email." Phone: ".$this->phone." URL: ".$this->url;
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
		   $this->validateUserName();
		   $this->validateProfilePicture();
		   $this->validateGenres();
		   $this->validateLastName();
		   $this->validateFirstName();
		   $this->validateAddress();
		   $this->validateNeighborhood();
		   $this->validateGender();
		   $this->validateDateOfBirth();
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
	
	private function validateProfilePicture() {
		$this->picture = $this->extractForm('picture');
		if (empty($this->picture))
			$this->setError('picture', 'PROFILE_PICTURE_EMPTY');
	}
	
	private function validateGenres() {
		$this->action = $this->extractForm('action');
		$this->horror = $this->extractForm('horror');
		$this->comedy = $this->extractForm('comedy');
		$this->romance = $this->extractForm('romance');
		$this->family = $this->extractForm('family');
		$this->drama = $this->extractForm('drama');
		array_push($this->genres, $this->action, $this->horror, $this->comedy, $this->romance, $this->family, $this->drama);
		if ($this->action == null && $this->horror == null && $this->comedy == null &&
				$this->romance == null && $this->family == null && $this->drama == null)
			$this->setError('genres', 'GENRES_NOT_SET');
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
		elseif (!filter_var($this->neighborhood, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^([a-zA-Z0-9\-\_ ])+$/i")) )) {
			$this->setError('neighborhood', 'NEIGHBORHOOD_HAS_INVALID_CHARS');
		}
	}
	
	private function validateGender() {
		$this->gender = $this->extractForm('gender');
		if (empty($this->gender))
			$this->setError('gender', 'GENDER_NOT_SET');
	}
	
	private function validateDateOfBirth() {
		$this->dateOfBirth = $this->extractForm('dateOfBirth');
		if (empty($this->dateOfBirth))
			$this->setError('dateOfBirth', 'DATE_OF_BIRTH_NOT_SET');
	}
	
	private function validateHeight() {
		$this->height = $this->extractForm('height');
		if (empty($this->height))
			$this->setError('height', 'HEIGHT_NOT_SET');
	}
	
	private function validateEmail() {
		$this->email = $this->extractForm('email');
		if (empty($this->email))
			$this->setError('email', 'EMAIL_EMPTY');
		elseif (!filter_var($this->email, FILTER_VALIDATE_REGEXP,
			array("options"=>array("regexp" =>"/^[a-zA-Z0-9\-\_]+@[a-zA-Z]+\.com$/i")) )) {
			$this->setError('email', 'EMAIL_HAS_INVALID_FORMAT');
		}
	}
	
	private function validatePhone() {
		$this->phone = $this->extractForm('phone');
		if (empty($this->phone))
			$this->setError('phone', 'PHONE_EMPTY');
		elseif (!filter_var($this->phone, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^\([0-9][0-9][0-9]\)\s[0-9][0-9][0-9]\s-\s[0-9][0-9][0-9][0-9]$/i")) )) {
					$this->setError('phone', 'PHONE_HAS_INVALID_FORMAT');
				}
	}
	
	private function validateURL() {
		$this->url = $this->extractForm('url');
		if (empty($this->url))
			$this->setError('url', 'URL_EMPTY');
		elseif (!filter_var($this->url, FILTER_VALIDATE_REGEXP,
				array("options"=>array("regexp" =>"/^(https:\/\/|http:\/\/)[0-9a-zA-Z\-\_\/]+\.com$/i")) )) {
					$this->setError('url', 'URL_HAS_INVALID_FORMAT');
				}
	}
}
?>