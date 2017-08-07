<?php
require 'core.inc.php';
if (loggedin()) {
  include ('headerlogin.php');
  include 'connect.php';
  if (isset($_GET['tut'])) {
    $tut = htmlspecialchars(mysqli_real_escape_string($link, $_GET['tut']));

    $sql= "SELECT * FROM phptuts WHERE id ='".$tut."'";
    if($result = mysqli_query($link, $sql)) {
      $_SESSION['tut']= $tut;
    }
   }
   if (@$_SESSION['tut']==null) {
     echo '<div class="alert alert-danger">
     Something went wrong. Click <a href="map">here<a> to return
     </div>';
   }
  $sql= "SELECT * FROM phptuts WHERE id='".$_SESSION['tut']."'";
  $result = mysqli_query($link, $sql);
  while (@$row = mysqli_fetch_array($result)) {
    $next = $row['id']+1;
  echo '
  <title>'.$row['title'].' | The Hub</title>
  <script type="text/javascript">
  function loadCode () {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }else {
      xmlhttp = new ActiveObject(\'Microsoft.XMLHTTP\');
    }
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById(\'code1\').innerHTML = xmlhttp.responseText;
      }
    }
    para = \'code=\'+document.getElementById(\'code\').value;
    xmlhttp.open(\'POST\', \'phpeditor.php\', true)
    xmlhttp.setRequestHeader(\'Content-type\', \'application/x-www-form-urlencoded\');
    xmlhttp.send (para);
  }
  </script>
  <div class="container-fluid" style="margin-top: 50px;">
  <div class="row">
      <!--first column-->
      <div class="col-sm-3">
        <div class="col-sm-10">
          <h4 class="feature-title">'.$row['title'].'</h4><hr>
          <p class="grey-text">'.$row['brief'].'</p>
          <p class="grey-text">Get a .txt version of the tutorial instead. Click <a href=" phpTutorials/'.$row['flink'].'.txt">here </a>to view.</p>
          <p class="grey-text">Have a question, or need more clarifcation? Use our<a href="https://gitter.im/The-Programmers-Hub/PHPTutorials" target="_blank"> forum.</a></p>
            <a href="phpclassroom?tut='.$next.'"><button class="btn-outline-info btn-block btn-rounded btn" name="submit">Next Tutorial</button></a><br>
      </div>
          <div style="height:30px;"></div>
      </div>
      <!--second column-->
      <div class="col-sm-6">
        <div class="col-sm-10">
          <h4 class="feature-title">Watch video tutorial</h4><hr>
          <p class="grey-text"><div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="'.$row['ulink'].'" allowfullscreen></iframe>
          </div>
  </p>
      </div>
          <div style="height:30px;"></div>
      </div>
      <div class="col-sm-3">
        <div class="col-sm-10">
          <h4 class="feature-title animated zoomInDown"> Run your code here</h4><hr>
          <p class="grey-text">
              <button class="btn-outline-success btn-block btn-rounded btn" onclick="loadCode()" name="submit">run code</button><br>
               <div class="input-group md-form">
              <textarea class="lg-textarea" id="code" name="code" placeholder="Your code here...(Do not include php tags) Stretch the area if you prefer" style="height: 350px; background-color: black; color: white; border-radius: 20px;" required></textarea></div>
          </p>
          </div>
          <div style="height:30px;"></div><hr>
          <div id="code1" ></div>
      </div>
  </div>
  </div>';
}
      }else {
                  include ('header.php');
                  echo '<div class="alert alert-danger">
                  Welcome to our PHP Tutorial page. You need to <a type="button" data-toggle="modal" style="color: blue;" data-target="#modalLogin">login</a> or <a type="button" data-toggle="modal" style="color: blue;" data-target="#modalRegister">register</a> to view tutorials.
                  </div>';
                }
 ?>
