<?php

class RequestMovieView {

  public static function show( $movieData ) {  
  	MasterView::showHeader();
  	MasterView::showNavBar();
  	echo "<br>";
  	echo "<br>";
  	echo "<br>";
?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Request FliX</title>
	</head>
	<body>
		<form method="post">
			<section>
				<h1>Request FliX</h1>
					Movie Title <input type="text" name="movieTitle" <?php if (!is_null($movieData)) { echo 'value = "'. $movieData->getMovieTitle() .'"'; }?>> <?php if (!is_null($movieData)) {echo $movieData->getError('movieTitle');}?><br><br>	
					Release Date <input type="text" name="releaseDate"<?php if (!is_null($movieData)) { echo 'value = "'. $movieData->getReleaseDate() .'"'; }?>> <?php if (!is_null($movieData)) {echo $movieData->getError('releaseDate');}?><br><br>
			</section>		
			<input type="submit" name="submit"><br>
		</form>
	</body>
	</html>

<?php
	}
}		
?>