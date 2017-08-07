<title>Find Profile - The Hub </title>
<?php
require ('core.inc.php');
include('connect.php');
if(loggedin()) {
  include ('headerlogin.php');
}else {
  include_once ('header.php');
}
if (isset($_GET['search_user'])&&!empty($_GET['search_user'])) {
  $user = mysqli_real_escape_string($link, $_GET['search_user']);
//retrieving search data and then searching the database to see if said data exists
  $sql= "SELECT * FROM registration WHERE first_name ='".$user."'";
  //searching through the database column to see if first name exists, if it does exixt and it's more than 0 name, it displays all the available names on a card
  $result = mysqli_query($link, $sql);
   $count = mysqli_num_rows($result);
  if ($count>0) {
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
  }else {
    //if the name searched for isn't found in the first name column, the search then tries with the second column and then repeats the process
    $sql= "SELECT * FROM registration WHERE last_name ='".$user."'";
    $result = mysqli_query($link, $sql);
     $count = mysqli_num_rows($result);
     //saving first algorithm...just for future refernce
    /* if ($count==1) {
       while (@$row = mysqli_fetch_array($result)) {
       $name =  $row['email'];
      $_SESSION['profile'] = $name;
      header ('Location: access.profile.php');
     }
   }*/if ($count>0) {
     while (@$row = mysqli_fetch_array($result)) {
       $name =  $row['email'];
      $_SESSION['profile'] = $name;
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
   }else {
     //same as above...loop continues till end
       $sql= "SELECT * FROM registration WHERE email ='".$user."'";
       $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
      /*  if ($count==1) {
          while (@$row = mysqli_fetch_array($result)) {
          $name =  $row['email'];
         $_SESSION['profile'] = $name;
         header ('Location: access.profile.php');
        }
      }*/if ($count>0) {
        while (@$row = mysqli_fetch_array($result)) {
          $name =  $row['email'];
         $_SESSION['profile'] = $name;
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
      }else {
          $sql= "SELECT * FROM registration WHERE PhoneNumber ='".$user."'";
          $result = mysqli_query($link, $sql);
           $count = mysqli_num_rows($result);
           /*if ($count==1) {
             while (@$row = mysqli_fetch_array($result)) {
             $name =  $row['email'];
            $_SESSION['profile'] = $name;
            header ('Location: access.profile.php');
           }
         }*/if ($count>0) {
           while (@$row = mysqli_fetch_array($result)) {
             $name =  $row['email'];
            $_SESSION['profile'] = $name;
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
         }else {
           //if all the above commands have run and there's still no record, an error messasge is sent to the user
             echo '<div class="col-md-4 text-center"><h5 style="color:red; font-style:bold;"> Profile does not exist. Please check the profile name and try again. Try the user\'s first name, last name, email, or phone number. Do not search all together </h5></div>';
           }
        }
     }
  }
  }else {
    echo '<h5 style="color:red; font-style:bold;"> Error. Please check and try again </h5>';
    die();
  }
 include 'footer.php';
 ?>
