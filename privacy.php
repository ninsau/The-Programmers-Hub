<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
} ?>
 <title> Privacy Statement | The Hub </title>
 <!-- intro section -->
 <div id="intro" class="text-xs-center">
   <div class="text-center" id="intro-section">
     <img src="img/thehub.ico.jpg" width="60" height="60">
     <div class="col-md-6 container">
     <h2>Privacy Statement</h2>
     <p>This is an open source community and as such, we do not have control over
     how your privacy is being used by other members of the community. It is therefore advicable to use
      all the neccessary precautions in securing your privacy, and also be sure not to divulge too much information
    about yourself.</p>
      </div>
   </div>
 </div>
 <!-- /. intro section -->
 <?php
 include 'footer.php';
  ?>
