
<?php
require 'core.inc.php';
include 'connect.php';
//checking whether or not the user is logged into an account
if (loggedin()) {
 include ('headerlogin.php');
}else {
  //if not logged in, do not show user page. Kill page and return error message
 echo '<h5 style="color:red; font-style:bold;"> Unauthorised entry. </h5>';
 die();
}
$sql= "SELECT * FROM registration WHERE email ='".$_SESSION['email']."'";
$result = mysqli_query($link, $sql);
//saving row data into a variable and then outputting columns onto page
while (@$row = mysqli_fetch_array($result)) {
  echo '<title>'.$row['first_name'].' '.$row['last_name'].' | The Programmer\'s Hub</title>';
}
 ?>
 <div class="conatiner-fluid">
   <div class="row">
   <div class="col-md-5" style="margin-top: 15px; margin-left: 15px; margin-right: 15px;">
           <?php
           //selecting user details from profile table in database using email addresses saved as sessions
           $sql= "SELECT * FROM profile WHERE session ='".$_SESSION['email']."' ORDER BY id DESC LIMIT 1";
           $result = mysqli_query($link, $sql);
           while (@$row = mysqli_fetch_array($result)) {
             //selecting image name from profile table and searching through directory to see if image name exists
           $img = $row['profile_pic'];
             //displaying image onto card after image name is found in directory
             echo '<img src="profile/'.$img.'" class="img-fluid" style="height: 250px; width: 300px;" alt="profile picture">';
         }
            ?>
             <a>
                 <div class="mask waves-effect waves-light"></div>
             </a>
             <!--link to upload profile picture unto card -->
             <a class="button" href="upload.profile.pic.php"><i class="fa fa-camera"></i>upload Profile Photo </a><br><br>
             <?php
             //selecting details of user from registration table using email saved as sessions
             $sql= "SELECT * FROM registration WHERE email ='".$_SESSION['email']."'";
             $result = mysqli_query($link, $sql);
             //saving row data into a variable and then outputting columns onto page
             while (@$row = mysqli_fetch_array($result)) {
               echo '<div class="col-sm-8">
                 <h4 class="feature-title"><strong style: georgia;>'.$row["first_name"].' '.$row["last_name"].'</strong></h4>
                 <small class="grey-text">( '.$row["PhoneNumber"].' )</small><hr>
                 <p class="grey-text">My expertise lie in the following fields: '.$row["Abilities"].' </p><hr>
                 <p style="color: blue;">'.$row['email'].'</p></div>';
             }
              ?>
           </div>
           <div class="col-md-6">
             <div class="text-xs-center">
               <div class="text-center">
                 <h2 class="animated fadeInLeftBig" style="font-family: Georgia; margin-top: 15px;">Learn to code and contribute to our open source projects</h2>
                 <p class="animated fadeInRightBig grey-text">Welcome to your profile page. Know that your profile is public and anyone can look you up. Update your profile regularly to make users find you easily.</p>
                  <a style="color: white;" type="button" href="getstarted" alt="Become a member of our community today. Click here to learn to code now!"><button class="btn btn-lg green btn-rounded animated bounce infinite" type="submit">Learn to code now! !</button></a>
                  <a href="sourcecodes"><button class="btn btn-lg btn-outline-secondary btn-rounded">Get access to source code files</button></a>
                  <a href="donate"><button class="btn btn-lg btn-outline-info btn-rounded">Donate to us today</button></a>
                  <a href="https://www.github.com/CBlay/The-Programmers-Hub" target="_blank"><button class="btn btn-lg btn-outline-primary btn-rounded">Contribute to our repository on Github</button></a>
                  <a style="color: white;" type="button" href="htmleditor" ><button class="btn btn-lg blue btn-rounded" type="submit">Try our HTML code editor !</button></a>
                  <a style="color: white;" type="button" href="phpeditor"><button class="btn btn-lg cyan btn-rounded" type="submit">Run your PHP code in realtime !</button></a>
             </div>
             </div>
           </div>
</div>
</div>
<!-- Central Modal Medium Info -->
<div class="modal fade" id="centralModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Support us</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <img src="img/thehub.ico.jpg" alt="website logo" width="60" height="60">
                    <h2>Hi there !</h2>
                    <p> We are glad to see you're engaging with us. Help us to introduce programming to the Children's Home by donating a small amount of money to support our initiative.</p>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" href="donate" class="animated bounce infinite btn btn-primary-modal">Learn more <i class="fa fa-eye ml-1"></i></a>
                <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Later</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Central Modal Medium Info-->
<script type="text/javascript">
$(document).ready(function() {
  $("#centralModalInfo").modal('show');
});
</script>
<script type="text/javascript">
$(document).ready(function() {
  $('.launch-modal').click(function() {
    $('#centralModalInfo').modal({
      backdrop:'static'
    });
  });
});
</script>
<?php include 'footer.php'; ?>
