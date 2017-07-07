<title>Users | The Hub </title>
<?php
require ('core.inc.php');
include('connect.php');
if(loggedin()) {
  include ('headerlogin.php');
}else {
  include_once ('header.php');
}
            $sql= "SELECT * FROM registration";
            $result = mysqli_query($link, $sql);
            while (@$row = mysqli_fetch_array($result)) {
              echo '
              <div class="container-fluid">
              <div class="card-group">
                 <!--Card-->
                 <div class="card card-personal">
              <!--Card content-->
              <div class="card-block">
              <a><h4 class="card-title">'.$row["first_name"].' '.$row["last_name"].'</h4></a>
              <!--Text-->
              <p class="card-text">'.$row['first_name'].'\'s expertise lie in the following fields: '.$row["Abilities"].'</p>

             <hr>
             <a class="card-meta"><i class="fa fa-user"></i>'.$row["PhoneNumber"].'</a>
             <p class="card-meta float-right"><a href="verify.user.php?search_user='.$row['email'].'"> View Profile</a></p>
             </div>
             <!--/.Card content-->
             </div>
             <!--/.Card-->
         </div><br>
         <!--/Card group-->
         </div>
             ';

            }
             ?>

<?php
if (!loggedin()) {
include 'footer.php';
}else {
  include 'loggedin.footer.php';
}
 ?>
