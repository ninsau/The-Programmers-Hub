<?php
require ('core.inc.php');
include('connect.php');
if (isset($_GET['comment'])&&!empty($_GET['comment'])) {
  $target = mysqli_real_escape_string($link, $_GET['comment']);

  $sql= "SELECT * FROM prog_new WHERE news ='".$target."'";
  $result = mysqli_query($link, $sql);
   $count = mysqli_num_rows($result);

  if ($count==1) {
    while (@$row = mysqli_fetch_array($result)) {
    $name =  $row['id'];
   $_SESSION['question'] = $name;
   header ('Location: comment.php');
   }
 }else {
   if(loggedin()) {
     include ('headerlogin.php');
   }else {
     include_once ('header.php');
   }
   echo '<div class="alert alert-danger">
Sorry, you cannot comment at the moment. We will work on fixing the problem as soon as possible. Thank you.
   </div>';
   die(); }
 }else {
  echo "no";
}
  ?>
