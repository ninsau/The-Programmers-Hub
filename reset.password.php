
 <?php
 require ('core.inc.php');
 if (loggedin()) {
   include ('headerlogin.php');
 }else {
   include ('header.php');
 }
 include ('connect.php');
 if (isset($_POST['email'])&&isset($_POST['rand'])&&isset($_POST['password'])) {
   $email = mysqli_real_escape_string($link, $_POST['email']);
   $rand = mysqli_real_escape_string($link, $_POST['rand']);
   $password = mysqli_real_escape_string($link, $_POST['password']);
   $pass_enc = md5($password);

   if (!empty($email)&&!empty($rand)&&!empty($password)) {
     $query = "SELECT * FROM reset WHERE email = '".$email."' AND randnum= '".$rand."'";
     $query_run = mysqli_query($link, $query);
    $count = mysqli_num_rows($query_run);
    if ($count==1) {
      $sql = "UPDATE registration SET password = '".$pass_enc."' WHERE email='".$email."'";
      if ($result = mysqli_query($link, $sql)) {
        echo 'Your password has been successfully updated. Click <a href="login.php">here</a> to return';
        die();
      }else {
        echo "Sorry, there was an error. Please return and try again.";
      }
    }else {
      echo "Sorry, your unique number does not exist. Please resend the query to generate new number.";
    }
  }else {
    echo "Please fill all forms before submitting";
  }
 }
  ?>

 <div class="col-md-4 right">
 <form action="reset.password.php" method="POST">
 <div class="md-form"><i class="fa fa-envelope prefix"></i>
 <input type="email" name="email" id="email" placeholder="Email" required></div>
 <div class="md-form"><i class="fa fa-number prefix"></i>
 <input type="number" name="rand" placeholder="Unique number" required></div>
 <div class="md-form"><i class="fa fa-lock prefix"></i>
 <input type="password" name="password" placeholder="New Password" required></div>
 <button type="submit" class="btn btn btn-indigo btn-block"  name="submit">Post</button><br><br>
  </div>
 </form>
</div>
<?php
if (!loggedin()) {
include 'footer.php';
}else {
  include 'loggedin.footer.php';
}
 ?>
