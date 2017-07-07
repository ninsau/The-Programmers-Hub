<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
} ?>
 <title> Policies | The Hub </title>
 <!-- intro section -->
 <div id="intro" class="text-xs-center">
   <div class="text-center" id="intro-section">
     <img src="img/thehub.ico.jpg" width="60" height="60">
     <div class="col-md-6 container">
     <h2>Policies</h2>
     <p>Develop, learn, share, partner up, and contribute anyhow and anyway you can to this platform.
       We have no hand in anything illegal you use this platform to do.
      Follow all the rules governing this community and contribute to making a better place on the World Wide Web.</p>
      </div>
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
