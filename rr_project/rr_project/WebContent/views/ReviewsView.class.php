<?php
class ReviewsView {
	
	public static function showAll() {
		$_SESSION['styles'] = array('site.css');
	
		if (array_key_exists('headertitle', $_SESSION)) {
			MasterView::showHeader();
		}
		MasterView::showNavBar();

		$reviews = (array_key_exists('reviews', $_SESSION)) ? $_SESSION['reviews'] : array();
		$base = (array_key_exists('base', $_SESSION)) ? $_SESSION['base'] : "";
	
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<h1>h00dFliX Reviews</h1>";
		echo "<table style=width:25%>";
		echo "<thead>";
		echo "<tr><th>reviewId</th><th>movie Title</th><th>Reviewed By</th><th>Reviewed On</th><th>Review</th></tr>";
		echo "</thead>";
		echo "<tbody>";
		foreach ($reviews as $review) {
			echo '<tr>';
			echo '<td>'.$review->getReviewId().'</td>';
			echo '<td>'.$review->getMovieTitle().'</td>';
			echo '<td>'.$review->getUserName().'</td>';
			echo '<td>'.$review->getReviewedOn().'</td>';
			echo '<td>'.$review->getReview().'</td>';
			//echo '<td><a href="/'.$base.'/user/show/'.$user->getUserId().'">Show</a></td>';
			//echo '<td><a href="/'.$base.'/user/update/'.$user->getUserId().'">Update</a></td>';
			echo '</tr>';
		}
		echo "</tbody>";
		echo "</table>";
	
		MasterView::showPageEnd();
	}
}