<?php
require ('core.inc.php');
if (!loggedin()) {
  include 'header.php';
}else {
  include 'headerlogin.php';
}
 ?>
 <title> Terms and Conditions | The Hub </title>
 <div id="intro" class="text-xs-center">
   <div class="text-center" id="intro-section">
     <img src="img/thehub.ico.jpg" width="60" height="60">
     <div class="col-md-6 container">
     <h2>Terms and Conditions</h2>
     <p>This community is open to computer enthusiasts and programmers of all levels, ages, religious background, race,
     and all other identification factors. Once you agree to become a member, do not discriminate or try to look
   down upon any member of this community. Contribute what your can to make this platform progressive. Theprogrammershub.net is solely
  for programming, programming sharing, and for all that has to do with computers and technologies. We reserve the right
  to revoke the membership of anyone who tries to use this platform for something other than its intended purpose.</p>
      </div>
   </div>
 </div>
 <?php
 include ('footer.php');
  ?>
