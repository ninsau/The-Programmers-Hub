<?php
require ('core.inc.php');
include('connect.php');
if(loggedin()) {
  include ('headerlogin.php');
}else {
  include_once ('header.php');
}
 ?>
 <head>
   <title> View Profile | The Hub </title>
 <script type="text/javascript">
 function viewContribution () {
   if (window.XMLHttpRequest) {
     xmlhttp = new XMLHttpRequest();
   }else {
     xmlhttp = new ActiveObject('Microsoft.XMLHTTP');
   }
   xmlhttp.onreadystatechange = function () {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       document.getElementById('typeOfQuery').innerHTML = xmlhttp.responseText;
     }
   }
   xmlhttp.open('POST', 'source.code.profile.access.php', true)
   xmlhttp.send ();
 }
 </script>
 </head>
 <div class="container-fluid row">
  <div class="col-md-4">
  <!--Card-->
      <div class="card card-cascade narrower">

          <!--Card image-->
          <div class="view overlay hm-white-slight">
            <?php
            $sql= "SELECT * FROM profile WHERE session ='".$_SESSION['profile']."' ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($link, $sql);
            while (@$row = mysqli_fetch_array($result)) {
            $img = $row['profile_pic'];
            $dirname = 'profile/'.$img;
            $images = glob ($dirname."*");
            if ($images) {
              echo '<img src="'.@$images[0].'" class="img-fluid" alt="profile picture">';
            }
          }
             ?>
              <a>
                  <div class="mask waves-effect waves-light"></div>
              </a>
          </div>
          <!--/.Card image-->

          <!--Card content-->
        <div class="card-block text-center">
          <?php
          $sql= "SELECT * FROM registration WHERE email ='".$_SESSION['profile']."'";
          $result = mysqli_query($link, $sql);
          while (@$row = mysqli_fetch_array($result)) {
            echo '<!--Title-->
            <h4 class="card-title"><strong>'.$row["first_name"].' '.$row["last_name"].'</strong></h4>
            <h5>'.$row["PhoneNumber"].'</h5>

            <p class="card-text">My expertise lie in the following fields: '.$row["Abilities"].' </p>';
          }
           ?>
            <!-- Switch -->
            <h6>Available for employment</h6>
        <!--/.Card content-->

      </div>
      <!--/.Card-->
</div>
</div>
<div class="col-md-8" id="typeOfQuery">
  <p>View source codes contributions by user
    <button class="btn btn-md indigo" type="submit"><a onclick="viewContribution()" onmouseover="toastr.info('View source code files contribution by user within the community');" style="color: white;">here</a></button>
</p><hr>
  <p><div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  Contributions made by
   <?php
          $sql= "SELECT * FROM registration WHERE email ='".$_SESSION['profile']."'";
          $result = mysqli_query($link, $sql);
          while (@$row = mysqli_fetch_array($result)) {
            echo '<!--Title-->
            <h4 class="card-title"><strong>'.$row["first_name"].' '.$row["last_name"].'</strong></h4>';
          } ?>
          </div></p><hr>
  <?php
  $sql= "SELECT * FROM profile WHERE session = '".$_SESSION['profile']."'  ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($link, $sql);
  while (@$row = mysqli_fetch_array($result)) {
  $img = $row['profile_pic'];
  $dirname = 'profile/'.$img;
  $images = glob ($dirname."*");
  if ($images) {
      $sql= "SELECT * FROM prog_new WHERE session = '".$_SESSION['profile']."'  ORDER BY id DESC";
      $result = mysqli_query($link, $sql);
      while (@$row = mysqli_fetch_array($result)) {
    echo '      <div class="card card-block">
          <div class="chip">
              <img src="'.@$images[0].'" alt="Contact Person"> '.$row['first_name'].'
          </div><hr>
          <div class="col-md-8 text-center>">'.$row['news'].'</div>
          </div>
          ';
  }
}
}
   ?>
</div>

<?php
if (!loggedin()) {
include 'footer.php';
}else {
  include 'loggedin.footer.php';
}
 ?>
