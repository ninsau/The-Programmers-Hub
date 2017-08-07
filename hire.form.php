<?php
require ('core.inc.php');
include ('connect.php');

$sql = "CREATE TABLE job_ad ( `id` INT(11) NOT NULL AUTO_INCREMENT , `email` VARCHAR(50) NOT NULL , `first_name` VARCHAR(50) NOT NULL , `last_name` VARCHAR(50) NOT NULL , `skill` TEXT NOT NULL , `location` VARCHAR(30) NOT NULL , `phone` INT(15) NOT NULL , `text1` TEXT NOT NULL , PRIMARY KEY (`id`))";
$run = mysqli_query($link, $sql);
if (isset($_POST['email'])&&isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['skill'])&&isset($_POST['location'])&&isset($_POST['phone'])&&isset($_POST['text'])) {

  $email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
  $first_name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['first_name']));
  $last_name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['last_name']));
  $skill = htmlspecialchars(mysqli_real_escape_string($link, $_POST['skill']));
  $location = htmlspecialchars(mysqli_real_escape_string($link, $_POST['location']));
  $phone = htmlspecialchars(mysqli_real_escape_string($link, $_POST['phone']));
  $text1 = htmlspecialchars(mysqli_real_escape_string($link, $_POST['text']));


   $query = "INSERT INTO job_ad(id, email, first_name, last_name, skill, location, phone, text1) VALUES ('', '".$email."', '".$first_name."', '".$last_name."', '".$skill."', '".$location."', '".$phone."', '".$text1."')";
if ($query_run = mysqli_query($link, $query)) {
 	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
Ad added Successfully!
</div> <p>Click <a href=\"work\">here</a> to return ";
die();
 }
 }
 ?>

 <title>Job Ad | The Hub </title>
<div class="card">
   <div class="card-block">
<div class="hero-unit">
<div class="container">
<div class="col-md-6 pull-right">
  <div class="text-xs-center">
         <h3><i class="fa fa-address-book"></i>Your details for job eligibility</h3>
         <hr class="mt-2 mb-2">
     </div>
      <form action="hire.form.php" method="post">
<div class="md-form"><i class="fa fa-envelope prefix"></i>
<input type="text" class="form-control" placeholder="Email" name="email" required autofocus>
</div>
<div class="md-form"><i class="fa fa-pencil prefix"></i>
<input type="text" class="form-control" placeholder="First Name" name="first_name" required></div>
<div class="md-form"><i class="fa fa-pencil prefix"></i>
<input type="text" class="form-control" placeholder="Last Name" name="last_name" required></div>
<div class="md-form"><i class="fa fa-briefcase prefix"></i>
<input type="text" class="form-control" maxlength="250" placeholder="skill set" name="skill" required>
<small id="skills" class="form-text text-muted">Add your skill set here. Separate with commas</small>
</div>
<div class="md-form"><i class="fa fa-map prefix"></i>
<input type="text" class="form-control" placeholder="your location" name="location" required>
</div>
<small id="location" class="form-text text-muted">Add the location within which you want the job to be</small>
<div class="md-form"><i class="fa fa-phone prefix"></i>
<input type="tel" class="form-control" placeholder="phone number" name="phone" required>
</div>
<div class="input-group md-form">
<textarea class="md-textarea text-center" maxlength="250" name="text" placeholder="Anything you want to add? Not more than 250 words" id="text" required></textarea>
</div>
<div class="md-form">
<button class="btn btn-indigo btn-lg btn-block" type="submit">Submit</button></div>
</form>
</div><!--.col-md-6-->
</div><!--.container-->
</div><!--.hero-unit-->
</div>
</div>
