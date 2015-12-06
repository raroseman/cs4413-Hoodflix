<?php
	include("includer.php");  
	session_start();
	$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	list($fill, $base, $control, $action, $arguments) =
	explode('/', $url, 5) + array("", "", "", "", null);
	$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	//echo "URL: $url <br>";
	//$urlPieces = split("/", $url);
	list($fill, $base, $control, $action, $arguments) =
	         explode('/', $url, 5) + array("", "", "", "", null);
	
	$_SESSION['base'] = $base;
	$_SESSION['control'] = $control;
	$_SESSION['action'] = $action;
	$_SESSION['arguments'] = $arguments;
	
	//print_r($urlPieces);
	//if (count($urlPieces) < 2)
	//	$control = "none";
	//else 
	//	$control = $urlPieces[2];
	
	switch ($control) {
		case "signup": 
			SignupController::run();
			break;
		case "login":
			LoginController::run();
			break;
		case "reviews":
			//ReviewController::run();
			break;
		case "profile":
			ProfileView::show();
			break;
		case "user":
			UserController::run();
			break;
		case "review":
			AddReviewController::run();
			break;
		case "request":
			RequestMovieController::run();
			break;
		case "add":
			AddMovieController::run();
			break;
		default:
			HomeView::show();
	};
?>	
