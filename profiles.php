
<?php
require ('core.inc.php');
include('connect.php');
if(loggedin()) {
  include ('headerlogin.php');
}else {
  include_once ('header.php');
}
$sql= "SELECT * FROM registration WHERE email ='".$_SESSION['profile']."'";
$result = mysqli_query($link, $sql);
//saving row data into a variable and then outputting columns onto page
while (@$row = mysqli_fetch_array($result)) {
  echo '<title>'.$row['first_name'].' '.$row['last_name'].' | The Hub</title>';
}
 ?>
 <div class="conatiner-fluid">
   <div class="row">
   <div class="col-md-5" style="margin-top: 15px; margin-left: 15px; margin-right: 15px;">
           <?php
           //selecting user details from profile table in database using email addresses saved as sessions
           $sql= "SELECT * FROM profile WHERE session ='".$_SESSION['profile']."' ORDER BY id DESC LIMIT 1";
           $result = mysqli_query($link, $sql);
           while (@$row = mysqli_fetch_array($result)) {
             //selecting image name from profile table and searching through directory to see if image name exists
           $img = $row['profile_pic'];
             //displaying image onto card after image name is found in directory
             echo '<img src="profile/'.$img.'" class="img-fluid" style="height: 250px; width: 300px;" alt="profile picture">';
         }
             //selecting details of user from registration table using email saved as sessions
             $sql= "SELECT * FROM registration WHERE email ='".$_SESSION['profile']."'";
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
                 <p class="animated fadeInRightBig grey-text">This account is public.</p>
                  <a style="color: white;" type="button" href="getstarted" alt="Become a member of our community today. Click here to learn to code now!"><button class="btn btn-lg green btn-rounded animated bounce infinite" type="submit">Learn to code now! !</button></a>
                  <a href="sourcecodes"><button class="btn btn-lg btn-outline-secondary btn-rounded">Get access to source code files</button></a>
                  <a href="donate"><button class="btn btn-lg btn-outline-info btn-rounded">Donate to us today</button></a>
                  <a href="https://www.github.com/CBlay/The-Programmers-Hub"><button class="btn btn-lg btn-outline-primary btn-rounded">Contribute to our repository on Github</button></a>
                  <a style="color: white;" type="button" href="htmleditor" ><button class="btn btn-lg blue btn-rounded" type="submit">Try our HTML code editor !</button></a>
                  <a style="color: white;" type="button" href="phpeditor"><button class="btn btn-lg cyan btn-rounded" type="submit">Run your PHP code in realtime !</button></a>
             </div>
             </div>
           </div>
</div>
</div>
<?php include 'footer.php'; ?>
