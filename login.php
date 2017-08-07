<?php
require ('core.inc.php');
include ('connect.php');
include_once ('header.php');
//checking to make sure users aren't already logged in.
if (!loggedIn()) {
if (isset($_POST['email'])&&isset($_POST['password'])) {
  $email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
  $password = htmlspecialchars(mysqli_real_escape_string($link, $_POST['password']));
  //encripting password with md5()
  $pass_enc = md5($password);
//selecting data from registration table in database
  $query = "SELECT * FROM registration WHERE email = '".$email."' AND password= '".$pass_enc."'";
  $query_run = mysqli_query($link, $query);
  $count = mysqli_num_rows($query_run);
//check database
  if ($count==1) {
    //initialising session last_name
    $_SESSION['email'] = $email;
    //redirecting page after successful log in
if ($pre_loc == 'http://www.theprogrammershub.net/login.php' || $pre_loc == 'http://theprogrammershub.net/login.php') {
    header('location: account.php');
  }else {
    header('location:'.$pre_loc);
  }
  }else {
    echo '<div class="alert alert-danger">
    Incorrect Email address or Password combination
    </div>';
    $sign_in = 0;
  }
}
}else {
  echo '<div class="alert alert-danger">
  You are already logged in
  </div>';
  die();
}
 ?>
 <title>Login | The Hub </title>
 <div class="text-xs-center container-fluid col-md-6">
   <div class="text-center">
     <img src="img/thehub.ico.jpg" width="60" height="60">
     <div class="col-md-8 container">
       <div class="header light-blue darken-3 white-text" style="border-radius:150px; border-style: double;">
     <h2 style="font-size: 22px; font-family: monospace">Sign in to continue using this platform</h2></div><hr>
<form action="login.php" method="post">
<div class="md-form">
    <i class="fa fa-envelope prefix"></i>
    <input type="email" name="email" placeholder="Your Email">
</div>
<div class="md-form">
    <i class="fa fa-lock prefix"></i>
    <input type="password" name="password" placeholder="Your Password">
</div>
<div class="options">
    <p>Not a member? <a href="register.php">Sign Up</a></p>
</div>
<div class="options">
  <?php
  if (@$sign_in===0) {
    echo '<a href=password.support.php>Forgotten password?</a>';
  }
  ?>
</div>
<div class="text-xs-center">
  <button class="btn btn-info" type="submit">Sign in <i class="fa fa-sign-in ml-1"></i></button></div>
</form>
</div></div></div>
<?php
include_once ('footer.php');
 ?>
