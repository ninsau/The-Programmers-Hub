<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
  echo '<div class="alert alert-danger">
  To run your HTML code, you need to <a href="login.php">login</a> or <a href="register.php">register</a> .
  </div>';
  die();
}
  $handle = fopen('run.html', 'w');

  if(isset($_POST['code'])) {
    $code = $_POST['code'];

    if(fwrite($handle, $code)) {
      header('Location: run.html');
    }

  }
   ?>
   <title>HTML environment | The Hub </title>
   <div class="text-xs-center" style="margin-top: 5px;">
     <div class="text-center" id="intro-section">
       <img src="img/thehub.ico.jpg" alt="website logo" width="60" height="60">
       <div class="col-md-6 container">
       <h2>Welcome to our <strong class="animated fadeIn" style="color: indigo; font-family: monospace;">HTML environment!</strong></h2>
       <p class="animated fadeIn">Test your HTML code in real time using this HTML environment. Enjoy!</p>
   <hr>
  <form action="test.html.php" method="POST" enctype="multipart/form-data">
     <div class="input-group md-form">
    <textarea class="lg-textarea" name="code" placeholder="Stretch the area if you prefer" style="height: 200px; background-color: black; color: white;" required></textarea></div>
    <button type="submit" class="btn-indigo btn-block btn"  name="submit">run code</button>
  </form>
  </div>
  </div>
  </div>
<?php
if (loggedin()) {
  include ('footer.php');
}else {
  include ('loggedin.footer.php');
}
 ?>
