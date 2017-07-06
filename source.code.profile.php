<?php
require 'core.inc.php';
include 'connect.php';
$target_dir = "web/";
@$target_file = $target_dir.basename ($_FILES ["fileToUpload"]["name"]);
$upLoadOk = 1;
$FileType = pathinfo($target_file, PATHINFO_EXTENSION);
if ($handle = opendir($target_dir)) {
  //opening target directory
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
Browse through available source code files below !
</div> ";
  while ($files = readdir($handle)) {
    if ($files != '.' && $files != '..') {
      $sql= "SELECT * FROM web_source WHERE session = '".$_SESSION['email']."'";
      $result = mysqli_query($link, $sql);
      while (@$row = mysqli_fetch_array($result)) {
      $img = $row['pic'];
      $dirname = 'profile/'.$img;
      $images = glob ($dirname."*");
      if ($images) {
        echo ' <div class="container  col-md-4">
          <div class="row">
         <div class="card card-block">
              <div class="chip">
                  <img src="'.@$images[0].'" alt="Contact Person"> '.$row['name'].'
              </div><hr>
              <div class="text-center>"><h6><strong>Description :</strong> '.$row['text1'].'</h6></div><hr>
              <p>View file: <a href="'.$target_dir.$files.'">'.$files.'</a></p>
              </div>
              </div>
              </div>
              </div><hr>';
      }
    }
    }
  }
}
if ($handle = opendir($target_dir)) {
  //opening target directory
  while ($files = readdir($handle)) {
    if ($files != '.' && $files != '..') {
      $sql= "SELECT * FROM system_source WHERE session = '".$_SESSION['email']."'";
      $result = mysqli_query($link, $sql);
      while (@$row = mysqli_fetch_array($result)) {
      $img = $row['pic'];
      $dirname = 'profile/'.$img;
      $images = glob ($dirname."*");
      if ($images) {
        echo ' <div class="container  col-md-4">
          <div class="row">
         <div class="card card-block">
              <div class="chip">
                  <img src="'.@$images[0].'" alt="Contact Person"> '.$row['name'].'
              </div><hr>
              <div class="text-center>"><h6><strong>Description :</strong> '.$row['text1'].'</h6></div><hr>
              <p>View file: <a href="'.$target_dir.$files.'">'.$files.'</a></p>
              </div>
              </div>
              </div>
              </div><hr>';
      }
    }
    }
  }
}
if ($handle = opendir($target_dir)) {
  //opening target directory
  while ($files = readdir($handle)) {
    if ($files != '.' && $files != '..') {
      $sql= "SELECT * FROM mobile_source WHERE session = '".$_SESSION['email']."'";
      $result = mysqli_query($link, $sql);
      while (@$row = mysqli_fetch_array($result)) {
      $img = $row['pic'];
      $dirname = 'profile/'.$img;
      $images = glob ($dirname."*");
      if ($images) {
        echo ' <div class="container  col-md-4">
          <div class="row">
         <div class="card card-block">
              <div class="chip">
                  <img src="'.@$images[0].'" alt="Contact Person"> '.$row['name'].'
              </div><hr>
              <div class="text-center>"><h6><strong>Description :</strong> '.$row['text1'].'</h6></div><hr>
              <p>View file: <a href="'.$target_dir.$files.'">'.$files.'</a></p>
              </div>
              </div>
              </div>
              </div><hr>';
      }
    }
    }
  }
}
?>
