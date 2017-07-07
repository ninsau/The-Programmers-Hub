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
  header('Location: account.php');
  }else {
    echo '<div class="alert alert-danger">
    Incorrect Email address or Password combination
    </div>';
    $sign_in = 0;
  }
}
}else {
  echo '<div class="card card-block text-center"><h5 style="color:red; font-style:bold;"> You are already logged in. </h5></div>';
  die();
}
 ?>
 <title>Login | The Hub </title>
 <div class="col-md-5">
<div class="text-xs-center">
    <h3 id="login-title"><i class="fa fa-lock"></i> Login to continue using this platform</h3>
    <hr class="mt-2 mb-2">
</div>
<form action="login.php" method="post">
<div class="md-form">
    <i class="fa fa-envelope prefix"></i>
    <input type="email" name="email" class="form-control" placeholder="Your Email">
</div>
<div class="md-form">
    <i class="fa fa-lock prefix"></i>
    <input type="password" name="password" class="form-control" placeholder="Your Password">
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
    <button type="submit" class="btn btn-lg btn-block btn-indigo">Login</button>
</div>
</form>
</div>
<?php
include_once ('footer.php');
 ?>
