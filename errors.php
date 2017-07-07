<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
}
?>
<title>Error page | The Hub </title>
<!-- intro section -->
<div id="intro" class="text-xs-center">
  <div class="text-center" id="intro-section">
    <img src="img/thehub.ico.jpg" alt="website logo" width="60" height="60">
    <div class="col-md-6 container">
    <h2 class="animated fadeIn" style="color: indigo; font-family: fantasy; font-size: 32px;">OOOPS !</h2>
    <p class="animated fadeIn">Ask programming questions and get all the answers you need.
       Contribute to our open source community and find developers for your project.
       Sell or buy templates and applications made by members of our community.
       Have access to a wide range of source codes to make your projects easier.
       Join our tutorial groups and learn something new about a particular programming field.
       Pair up with other coders, and receive all the latest from the world of programming</p>
     </div>
     <button class="btn btn-md indigo" type="submit"><a href="register.php" style="color: white;">Sign me up</a></button>
     <button class="btn btn-sm transparent" type="submit"><a href="read.php">Explore</a></button><hr>
     <button class="btn btn-lg red" type="submit"><a href="fair.intro.php" style="color: white"  onmouseover="toastr.info('Jarvis DevCon is the hubs first ever programming fair to come to our doorstep. Join developers from across the country and share ideas and collaborate for projects');">Register for Jarvis DevCon</a></button>
  </div>
</div>
<!-- /. intro section -->
<?php

if (!loggedin()) {
include 'footer.php';
}else {
  include 'loggedin.footer.php';
}
?>
