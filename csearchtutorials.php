<?php
require ('core.inc.php');
include 'connect.php';
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
}

if (isset($_GET['ctut'])&&!empty($_GET['ctut'])) {
  $tut = mysqli_real_escape_string($link, $_GET['ctut']);
  $query = "SELECT * FROM ctuts WHERE title LIKE '%".$tut."%' ORDER BY id ASC";
  $query_run = mysqli_query($link, $query);
  @$count = mysqli_num_rows($query_run);
  if ($count<1) {
    echo '
    <div class="container col-md-6 text-center">
    <div class="alert alert-danger">
    No results found for "<strong>'.$tut.'</strong>". Please try another keyword
    </div></div>';
  }
  else {
    echo '
    <div class="container col-md-6 text-center">
    <div class="alert alert-info">
    '.$count .' results found for "<strong>'.$tut.'</strong>"
    </div></div>';
  }
  while (@$row = mysqli_fetch_array($query_run)) {
  echo '
  <div class="col-md-6 text-center container"><h2 style="font-family: Georgia;"><a href="cclassroom?ctut='.$row['id'].'">'.$row['title'].'</a></div>';
  }
}
 ?>
