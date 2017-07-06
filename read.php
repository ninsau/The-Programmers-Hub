  <title>Read | The Hub </title>
  <?php
  require ('core.inc.php');
  include ('connect.php');
  if(loggedin()) {
    include ('headerlogin.php');
  }else {
    include_once ('header.php');
  }
   ?>
  <script type="text/javascript">
  function loadPost () {
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
    xmlhttp.open('POST', 'frontend.read.php', true)
    xmlhttp.send ();
  }
  </script>
</head>
<?php

  //creating a table to hold user input later on in our sql database
  $sqlque = "ALTER TABLE prog_new DROP `user_ip`";
  $run = mysqli_query($link, $sqlque);

  $sql = "ALTER TABLE `prog_new` ADD `post_time` VARCHAR(50) NOT NULL AFTER `session`;";
  $runn = mysqli_query($link, $sql);

  //mysql query end
  if (loggedin()) {
  echo '
  <div id="typeOfQuery">
  <div class="col-md-6 container">
  <a onclick="loadPost()" style="color: white;"><button class="btn btn-lg btn-block indigo" type="submit">Post a query</button></a>
</div>
      </div>';
  //default display when this page is loaded
}else {
  echo '<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  You need to <a href="login.php"> log in</a> to post
  </div>';;
}
    $sql= "SELECT * FROM prog_new ORDER BY id DESC";
    $result = mysqli_query($link, $sql);
    while (@$row = mysqli_fetch_array($result)) {
      echo '
      <div class="container-fluid col-lg-6">
      <section>
      <div class="mdb-feed">
        <div class="news">

             <!--Label-->
             <div class="label">
                 <img src="profile/'.@$row['profile_pic'].'" alt="Contact Person" class="rounded-circle z-depth-1-half">
             </div>
      <div class="excerpt">

                              <!--Brief-->
                              <div class="brief">
                                  <a class="name" href="verify.user.php?search_user='.$row['session'].'">'.$row['first_name'].'</a><div class="date">'.$row['post_time'].'</div>
                              </div>

                              <!--Added text-->
                              <div class="added-text"><a href="comment.find.php?comment='.$row['news'].'" style="color: black">'.$row['news'].'</a></div>

      <div class="feed-footer">
      <i class="fa fa-comment"></i>
        <a class="comment" href="comment.find.php?comment='.$row['news'].'">Add Comment</a>

      </div>
      </div>
      </div>
      </div>
      </section>
      </div>


';
  }

if (isset($_POST['text'])) {
  $text = htmlspecialchars(mysqli_real_escape_string($link, $_POST['text']));
  $session = $_SESSION['email'];
  $sql= "SELECT * FROM registration WHERE email = '$session'";
  $result = mysqli_query($link, $sql);
  while (@$row = mysqli_fetch_array($result)) {
    $name = $row['first_name'];

    $sql= "SELECT * FROM profile WHERE session = '$session'";
    $result = mysqli_query($link, $sql);
    @$row = mysqli_fetch_array($result);
      $pic = $row['profile_pic'];
      $def = 'thehub.ico.jpg';
      if ($pic == null ) {
        $pic = $def;

    date_default_timezone_set("GMT");
    $zone = date("l y/m/d - h:i a");

  $query = "INSERT INTO prog_new(id, news, session, first_name, profile_pic, post_time) VALUES ('', '".$text."', '$session', '$name', '$pic', '$zone')";
    if ($query_run = mysqli_query($link, $query)) {
      header('Location: read.php');
  }else {
    echo "Post Fail. Error occured";
  }
}
}
}
if (!loggedin()) {
include 'footer.php';
}else {
  include 'loggedin.footer.php';
}
 ?>
