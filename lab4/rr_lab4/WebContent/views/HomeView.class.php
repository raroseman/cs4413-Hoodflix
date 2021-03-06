<?php

class HomeView {

  public static function show() {  
  	$_SESSION['headertitle'] = "h00dFliX Home Page";
  	$_SESSION['styles'] = array('jumbotron.css');
  	MasterView::showHeader();
  	MasterView::showNavbar();
  	HomeView::showDetails();
  	$_SESSION['footertitle'] = "<h3>Get your FliX on</h3>";
  	MasterView::showHomeFooter();
  	MasterView::showPageEnd();
  }
	public static function showDetails() { 
      $base = $_SESSION['base'];    
      echo '<div class="jumbotron">';
      echo '<div class="container">';
      echo '<p><img alt="h00dfliX Logo" src="images/h00dfliX_Logo.JPG"></p>';
      echo '<p>h00dflix is a free, safe alternative to torrent websites or paid streaming services that will build a stronger community by sharing your
	        movies with one another!</p>';
      echo '</div>';
      echo '</div>';
      
      echo '<div class="container">';
      echo '<div class="row">';
      echo '<div class="col-md-3">';
      echo '<h2>Request a Movie</h2>';
      echo '<p><img src = "/'.$base.'/images/request_movie.jpg"></p>';
      echo '<p><a class="btn btn-default" href="/'.$base.'/add" role="button">Get your FliX on! &raquo;</a></p>';
      echo '</div>';
      echo '<div class="col-md-3">';
      echo '<h2>View Catalog</h2>';
      echo '<p><img src = "/'.$base.'/images/movie.png"> </p>';
      echo '<p><a class="btn btn-default" href="/'.$base.'/catalog/showall" role="button">Check out our selection! &raquo;</a></p>';
      echo '</div>';
      echo '<div class="col-md-3">';
      echo '<h2>Write a Review</h2>';
      echo '<p><img src = "/'.$base.'/images/write_review.png"></p>';
      echo '<p><a class="btn btn-default" href="/'.$base.'/review/new"  role="button">What did you think? &raquo;</a></p>';
      echo '</div>';
      echo '<div class="col-md-3">';
      echo '<h2>Read Reviews</h2>';
      echo '<p><img src = "/'.$base.'/images/read_review.jpg"></p>';
      echo '<p><a class="btn btn-default" href="/'.$base.'/reviews/showall"  role="button">See what others thought! &raquo;</a></p>';
      echo '</div>';
      echo '</div>';
      
      echo '<hr>';
	  echo '<h1>The premier website for media sharing</h1>';
	  echo '<em>Welcome to the hood</em>';
	  echo '<h3><a href="/'.$base.'/request">Would you like to request to borrow a movie?</a></h3>';
	  echo '<h3><a href="/'.$base.'/user/showall">Would you like to show all users</a></h3>';
	  echo '<h3><a href="/'.$base.'/tests.html">Would you like to run the tests?</a></h3>';  
   }
}		
?>