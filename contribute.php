<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
} ?>
 <title> How To Contribute | The Hub </title>
 <!-- intro section -->
 <div id="intro" class="text-xs-center">
   <div class="text-center" id="intro-section">
     <img src="img/thehub.ico.jpg" width="60" height="60">
     <div class="col-md-6 container">
     <h2>Contribute</h2>
     <p>Contribute to our platform by working with several developers on our <a href="https://www.github.com/CBlay/The-Programmers-Hub">Github Repository</a>.
      Build templates of applications and make source codes available to other members of the group.
    If you find a flaw in our programming or security, kindly use our contact form to address the issue.
  </p>
      </div>
   </div>
 </div>
 <!-- /. intro section -->
 <?php
 if (!loggedin()) {
 include 'footer.php';
 }else {
   include 'loggedin.footer.php';
 }   ?>
