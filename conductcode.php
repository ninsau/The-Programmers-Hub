<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
} ?>
 <title> Code of Conduct | The Programmer's Hub </title>
 <!-- intro section -->
 <div id="intro" class="text-xs-center">
   <div class="text-center" id="intro-section">
     <img src="img/thehub.ico.jpg" width="60" height="60">
     <div class="col-md-6 container">
     <h2>Code of Conduct</h2>
     <p>Feel free to use available source code in your projects anytime and anywhere you want, but be sure
      to acknowledge the author of the source code you are using. Acknowledge The Programmers Hub community
      in any project you complete using tools and materials from this platform. Do not try to tamper with the integrity of this website.
    If you find a flaw in our programs, be sure to report to us immediately so we can fix it. Do not try to dupe or scam anyone using this platform.
  Most importantly, above all else, have fun using the resources of this community.</p>
      </div>
   </div>
 </div>
 <!-- /. intro section -->
 <?php
 include 'footer.php';  ?>
