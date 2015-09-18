<?php

class IndexView {

  public static function show() {  
		
?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Home</title>
	</head>
	<body>
	<nav>
	<a href=./SignupView.class::show()>Sign-up</a> |
	<a href="/rr_lab1/login.html">Login</a> |
	<a href="/rr_lab1/reviews.html">Reviews</a> |
	<a href="/rr_lab1/report.html">Report Misconduct</a>
	</nav>
	
	<header>
	<img alt="h00dfliX Logo" src="images/h00dfliX_Logo.JPG">
	</header>
	
	<aside>
	<section>
	<h2>h00dfliX</h2>
	h00dflix is a free, safe alternative to torrent websites or paid streaming services that will build a stronger community by sharing your
	movies with one another!
	</section>
	</aside><br>
	
	<footer>
	Copyright © 2015 Ryan Roseman. All rights reserved.
	</footer>
	</body>
	</html>
<?php
	}
}		
?>