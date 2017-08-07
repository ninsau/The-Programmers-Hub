<?php
require ('core.inc.php');
include('connect.php');
if (isset($_GET['search_user'])&&!empty($_GET['search_user'])) {
  $user = mysqli_real_escape_string($link, $_GET['search_user']);

  /*What this page does is that, using a similar algorith like what is found in profile.find.php,
  it saves a session using the search keyword as session variable, and then throws that session variable
  to the account.php file to fetch user info. I'm using two search algorithms at the same time.
  It seems like a waste, and I'm still trying to figure out a better way of doing it.*/


  $sql= "SELECT * FROM registration WHERE first_name ='".$user."'";
  $result = mysqli_query($link, $sql);
   $count = mysqli_num_rows($result);
   //from here onwards, the code does pretty much the same thing
   //it checks to see if the user exists in the database then passes the user's email to the session variable and then calls the header for the access page
  if ($count==1) {
    while (@$row = mysqli_fetch_array($result)) {
    $name =  $row['email'];
   $_SESSION['profile'] = $name;
   header ('Location: profiles');
   }
  }else {
    $sql= "SELECT * FROM registration WHERE last_name ='".$user."'";
    $result = mysqli_query($link, $sql);
     $count = mysqli_num_rows($result);
     if ($count==1) {
       while (@$row = mysqli_fetch_array($result)) {
       $name =  $row['email'];
      $_SESSION['profile'] = $name;
      header ('Location: profiles');
     }
   }else {
       $sql= "SELECT * FROM registration WHERE email ='".$user."'";
       $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if ($count==1) {
          while (@$row = mysqli_fetch_array($result)) {
          $name =  $row['email'];
         $_SESSION['profile'] = $name;
         header ('Location: profiles');
        }
      }else {
          $sql= "SELECT * FROM registration WHERE PhoneNumber ='".$user."'";
          $result = mysqli_query($link, $sql);
           $count = mysqli_num_rows($result);
           if ($count==1) {
             while (@$row = mysqli_fetch_array($result)) {
             $name =  $row['email'];
            $_SESSION['profile'] = $name;
            header ('Location: profiles');
           }
         }else {
           if(loggedin()) {
             include ('headerlogin.php');
           }else {
             include_once ('header.php');
           }
             echo '<div class="alert alert-info">
               Profile does not exist. Please try with another keyword
             </div>';
             include 'footer.php';
           }
        }
     }
  }
  }


 ?>
