<?php
require 'core.inc.php';
if (loggedin()) {
  include ('headerlogin.php');
  include 'connect.php';
  if (isset($_GET['ctut'])) {
    $tut = htmlspecialchars(mysqli_real_escape_string($link, $_GET['ctut']));

    $sql= "SELECT * FROM ctuts WHERE id ='".$tut."'";
    if($result = mysqli_query($link, $sql)) {
      $_SESSION['ctut']= $tut;
    }
   }
   if (@$_SESSION['ctut']==null) {
     echo '<div class="alert alert-danger">
     Something went wrong. Click <a href="c.map.php">here<a> to return
     </div>';
   }
  $sql= "SELECT * FROM ctuts WHERE id='".$_SESSION['ctut']."'";
  $result = mysqli_query($link, $sql);
  while (@$row = mysqli_fetch_array($result)) {
    $next = $row['id']+1;
  echo '
  <title>'.$row['title'].' | The Programmer\'s Hub</title>
  <div class="container-fluid" style="margin-top: 50px;">
  <div class="row">
      <!--first column-->
      <div class="col-sm-3">
        <div class="col-sm-10">
          <h4 class="feature-title">'.$row['title'].'</h4><hr>
          <p class="grey-text">'.$row['brief'].'</p>
          <p class="grey-text">Have a question, or need more clarifcation? Use our<a href="https://gitter.im/The-Programmers-Hub/Lobby?source=orgpage" target="_blank"> forum.</a></p>
            <a href="cclassroom?ctut='.$next.'"><button class="btn-outline-info btn-block btn-rounded btn" name="submit">Next Tutorial</button></a><br>
      </div>
          <div style="height:30px;"></div>
      </div>
      <!--second column-->
      <div class="col-sm-9">
        <div class="col-sm-10">
          <h4 class="feature-title">Watch video tutorial</h4><hr>
          <p class="grey-text"><div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="'.$row['ulink'].'" allowfullscreen></iframe>
          </div>
  </p>
      </div>
          <div style="height:30px;"></div>
      </div>
  </div>
  </div>';
}
      }else {
                  include ('header.php');
                  echo '<div class="alert alert-danger">
                  Welcome to our C Programming Tutorial page. You need to <a type="button" data-toggle="modal" style="color: blue;" data-target="#modalLogin">login</a> or <a type="button" data-toggle="modal" style="color: blue;" data-target="#modalRegister">register</a> to view tutorials.
                  </div>';
                }
 ?>
