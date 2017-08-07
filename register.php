<?php
require ('core.inc.php');
include ('connect.php');
include_once ('header.php');
//checking to make sure user isn't already loggen in
if (!loggedin()) {
if (isset($_POST['email'])&&isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['password'])&&isset($_POST['retype_password'])) {

  $email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
  $first_name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['first_name']));
  $last_name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['last_name']));
  $password = htmlspecialchars(mysqli_real_escape_string($link, $_POST['password']));
  $retype_password = htmlspecialchars(mysqli_real_escape_string($link, $_POST['retype_password']));
  $pass_enc = md5($password);
  $pass_enc2 = md5($retype_password);
  if (!empty($email)&&!empty($first_name)&&!empty($last_name)&&!empty($password)) {

//checking to make sure email address doesn't already exist in the database
  $sql= "SELECT email FROM registration WHERE email='$email'";
  $result = mysqli_query($link, $sql);
  @$count = mysqli_num_rows($result);

  if ($count>0) {
    echo '<div class="alert alert-danger">
      Email already exists.
    </div>';   }
  //checking to make sure passwords match
  elseif ($password!=$retype_password) {
    echo '<div class="alert alert-info">
      Passwords do not match.
    </div>';  }
//inserting data into database once all other requirements are satisfied
 else {
   $query = "INSERT INTO registration(reg_id, email, first_name, last_name, password, retype_password) VALUES ('', '".$email."', '".$first_name."', '".$last_name."', '".$pass_enc."', '".$pass_enc."')";
if ($query_run = mysqli_query($link, $query)) {
  //initialising session
  $_SESSION['email'] = $email;
  //redirecting page after successful registration
  if ($pre_loc == 'http://theprogrammershub.net/register.php' || $pre_loc == 'http://www.theprogrammershub.net/register.php') {
    header('location: account.php');
  }else {
    header('location:'.$pre_loc);
  }
}
 }
 }else {
   die();
 }
 }
 }else {
   echo '<div class="card card-block text-center"><h5 style="color:red; font-style:bold;"> You are already logged in. </h5></div>';
   die();
 }
 ?>
 <title>Register | The Hub </title>
 <div class="text-xs-center container-fluid col-md-6">
   <div class="text-center">
     <img src="img/thehub.ico.jpg" width="60" height="60">
     <div class="col-md-8 container">
       <div class="header light-blue darken-3 white-text" style="border-radius:150px; border-style: double;">
     <h2 style="font-size: 22px; font-family: monospace">Sign up to continue using this platform</h2></div><hr>
<form action="register.php" method="post">
<div class="md-form"><i class="fa fa-envelope prefix"></i>
<input type="email" placeholder="Email" name="email" required autofocus></div>
<div class="md-form"><i class="fa fa-pencil prefix"></i>
<input type="text" placeholder="First Name" name="first_name" required></div>
<div class="md-form"><i class="fa fa-pencil prefix"></i>
<input type="text" placeholder="Last Name" name="last_name" required></div>
<div class="md-form"><i class="fa fa-lock prefix"></i>
<input type="password" placeholder="Password" name="password" required></div>
<div class="md-form"><i class="fa fa-lock prefix"></i>
<input type="password" placeholder="re-type Password" name="retype_password" required></div>
<div class="md-form">
<button class="btn btn-info" type="submit">Sign up <i class="fa fa-sign-in ml-1"></i></button></div>
</form>
</div></div></div>
<?php
include_once ('footer.php');
 ?>
