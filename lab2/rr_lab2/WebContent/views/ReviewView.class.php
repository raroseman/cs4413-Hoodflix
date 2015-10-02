<?php

class ReviewView {

  public static function show( ) {  
		
?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Review</title>
	</head>
	<body>
		<form action="login" method="post">
			<section>
				<h1>fliX Reviews</h1>
					Movie Title <input type="text" name="movieTitle" > <br><br>	
					Reviewed By <input type="text" name="reviewedBy"> <br><br>
					Reviewed On <input type="month" name="reviewedOn" tabindex="16"> <br><br>
					Review <br><br><textarea name="message" rows="10" cols="30" tabindex="21"></textarea>
			</section>
				
			<input type="submit" name="submit"><br>
		</form>
	</body>
	</html>

<?php
	}
}		
?>