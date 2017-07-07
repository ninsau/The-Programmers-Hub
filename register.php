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
//checking to make sure email address doesn't already exist in the database
  $sql= "SELECT email FROM registration WHERE email='$email'";
  $result = mysqli_query($link, $sql);
  @$count = mysqli_num_rows($result);

  if ($count>0) {
    echo '<div class="alert alert-info">
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
  header('Location: read.php');
}
 }
 }
 }else {
   echo '<div class="card card-block text-center"><h5 style="color:red; font-style:bold;"> You are already logged in. </h5></div>';
   die();
 }
 ?>
 <title>Register | The Hub </title>
<div class="card">
   <div class="card-block">
<div class="hero-unit">
<div class="container">
<div class="col-md-6 pull-right">
  <div class="text-xs-center">
         <h3><i class="fa fa-address-book"></i>Sign up to continue using this platform</h3>
         <hr class="mt-2 mb-2">
     </div>
<form action="register.php" method="post">
<div class="md-form"><i class="fa fa-envelope prefix"></i>
<input type="email" class="form-control" placeholder="Email" name="email" required autofocus>
</div>
<div class="md-form"><i class="fa fa-pencil prefix"></i>
<input type="text" class="form-control" placeholder="First Name" name="first_name" required></div>
<div class="md-form"><i class="fa fa-pencil prefix"></i>
<input type="text" class="form-control" placeholder="Last Name" name="last_name" required></div>
<div class="md-form"><i class="fa fa-lock prefix"></i>
<input type="password" class="form-control" placeholder="Password" name="password" required>
</div>
<div class="md-form"><i class="fa fa-lock prefix"></i>
<input type="password" class="form-control" placeholder="re-type Password" name="retype_password" required></div>
<div class="md-form">
<button class="btn btn-indigo btn-lg btn-block" type="submit">Submit</button></div>
</form>
</div><!--.col-md-6-->
</div><!--.container-->
</div><!--.hero-unit-->
</div>
</div>
<?php
include_once ('footer.php');
 ?>
