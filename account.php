<head>
  <title> Profile | The Hub </title>
<script type="text/javascript">
//ajax function to be called later in the code
function codeContribution () {
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
  xmlhttp.open('POST', 'source.code.profile.php', true)
  xmlhttp.send ();
}
</script>
</head>

<?php
require ('core.inc.php');
include('connect.php');
//checking whether or not the user is logged into an account
if (loggedin()) {
 include ('headerlogin.php');
}else {
  //if not logged in, do not show user page. Kill page and return error message
 echo '<div class="card card-block text-center"><h5 style="color:red; font-style:bold;"> Unauthorised entry. </h5></div>';
 die();
}
 ?>
 <!--main wrapper-->
<div class="container-fluid row">
  <div class="col-md-4">
  <!--Card-->
      <div class="card card-cascade narrower">

          <!--Card image-->
          <div class="hm-white-slight">
            <?php
            //selecting user details from profile table in database using email addresses saved as sessions
            $sql= "SELECT * FROM profile WHERE session ='".$_SESSION['email']."' ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($link, $sql);
            while (@$row = mysqli_fetch_array($result)) {
              //selecting image name from profile table and searching through directory to see if image name exists
            $img = $row['profile_pic'];
            $dirname = 'profile/'.$img;
            $images = glob ($dirname."*");
            if ($images) {
              //displaying image onto card after image name is found in directory
              echo '<img src="'.@$images[0].'" class="img-fluid" alt="profile picture">';
            }
          }
             ?>
              <a>
                  <div class="mask waves-effect waves-light"></div>
              </a>
              <!--link to upload profile picture unto card -->
              <a class="button" href="upload.profile.pic.php"><i class="fa fa-camera"></i>upload Profile Photo </a>
          </div>
          <!--/.Card image-->

          <!--Card content-->
        <div class="card-block text-center">
          <?php
          //selecting details of user from registration table using email saved as sessions
          $sql= "SELECT * FROM registration WHERE email ='".$_SESSION['email']."'";
          $result = mysqli_query($link, $sql);
          //saving row data into a variable and then outputting columns onto page
          while (@$row = mysqli_fetch_array($result)) {
            echo '  <!--Title-->
              <h4 class="card-title"><strong>'.$row["first_name"].' '.$row["last_name"].'</strong></h4>
              <h5>'.$row["PhoneNumber"].'</h5>
              <p class="card-text">My expertise lie in the following fields: '.$row["Abilities"].' </p>';
          }
           ?>
            <!-- Switch -->
            <h6>Available for employment</h6>
              <div class="switch">
                <label>
                  Yes
                  <input type="checkbox">
                  <span class="lever"></span>
                  No
                </label>
              </div>

        </div>
        <!--/.Card content-->

      </div>
      <!--/.Card-->
</div>
<!--ajax function called into the following div-->
<div class="col-md-8"  id="typeOfQuery">
  <!--same form used in read.php to input user data into one table in database to be used by both pages -->
     <form action="read.php" method="POST" enctype="multipart/form-data">
       <div class="row">
        <div class="input-group md-form">
       <textarea class="md-textarea text-center" name="text" placeholder="Contribute to our open source community by posting relevant and appropriate content here. All posts here also appear inside our imteractive section, where it is available for all members to read" id="text" required></textarea></div>
       <button type="submit" class="btn-indigo btn-block btn"  name="submit">Post</button></div><hr>
     </form>
     <p>View your source codes contributions
       <!--calling ajax funtion to reload this div to source code page when button is clicked-->
       <button class="btn btn-md indigo" type="submit"><a onclick="codeContribution()" onmouseover="toastr.info('View your source code files contribution within the community');" style="color: white;">here</a></button>
</p><hr>
     <p><div class="alert alert-info alert-dismissable">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     See your posts here.
     </div></p> <hr>
  <?php
  //selecting data from table profile in database using email stored in session and ordering by magnitude
  $sql= "SELECT * FROM profile WHERE session = '".$_SESSION['email']."'  ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($link, $sql);
  //fetching rows
  while (@$row = mysqli_fetch_array($result)) {
    //selecting image from directory using corresponding image name from database table
  $img = $row['profile_pic'];
  $dirname = 'profile/'.$img;
  $images = glob ($dirname."*");
  if ($images) {
    //if the image exists, select from table prog_new where the user posts are stored.
    //selecting data column by column using logged in user's email saved as session
      $sql= "SELECT * FROM prog_new WHERE session = '".$_SESSION['email']."'  ORDER BY id DESC";
      $result = mysqli_query($link, $sql);
      //fetching rows in table prog_new
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
<!--/ajax div end-->
</div>
<!--/wrapper end-->
<?php
include ('loggedin.footer.php');
 ?>
