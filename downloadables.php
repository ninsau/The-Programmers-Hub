<head>
  <title>Store Downloadables| The Hub</title>
</head>
<!-- intro section -->
<div id="intro" class="text-xs-center" style="margin-top:100px;">
  <div class="text-center" id="intro-section">
    <img src="img/thehub.ico.jpg" width="60" height="60">
    <div class="col-md-6 container">
    <h2>Files available for download</h2>
    <button class="btn btn-lg indigo" type="submit"><a href="downloadables.post.php" style="color :white;">Click here to post your files</a></button>
     </div><hr>
  </div>
</div>
<!-- /. intro section -->
<?php
require ('core.inc.php');
include ('connect.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
}
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
Browse through available downloadable files below !
</div> ";
      $sql= "SELECT * FROM downloadables ORDER BY id DESC";
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
              <p>View file: <a href="downloadables/'.$row['file_name'].'">'.$row['file_name'].'</a></p>
              </div>
              </div>
              </div>
              </div><hr>';
      }
    }
    if (!loggedin()) {
    include 'footer.php';
    }else {
      include 'loggedin.footer.php';
    } ?>
