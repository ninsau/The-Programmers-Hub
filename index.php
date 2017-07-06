<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
} ?>
 <head>
   <title>The Programmer's Hub - An open source community for programmers and computer enthusiasts </title>
 </head>
 <div class="text-xs-center" style="margin-top: 5px;">
   <div class="text-center">
     <img src="img/thehub.ico.jpg" alt="website logo" width="60" height="60">
     <div class="col-md-6 container">
     <h2 class="animated fadeInLeftBig" style="color: indigo; font-family: monospace;">The hub is a playground for programmers across platform.</h2>
     <p class="animated fadeInRightBig">Learn to code for free and interact with a community of programmers of different levels and skillset.</p>
      </div>
      <a style="color: white;" type="button" data-toggle="modal" data-target="#modalRegister" alt="Become a member of our community today. Click here to register now!"><button class="btn btn-lg black animated bounce infinite" type="submit">Sign Up Now !</button></a>
 </div>
 </div><hr>
 <!-- /. intro section -->
 <div class="container-fluid">
 <div class="row">
     <!--first column-->
     <div class="col-sm-3">
       <div class="col-sm-10">
         <h4 class="feature-title animated rotateIn"><i class="fa fa-eye red-text fa-2x"></i>  Our Mission</h4>
         <p class="grey-text">Our <a href="about.php">mission</a> is to provide programmers, and the programming community as a whole, reliable and quality source codes and tools to help make more dependable finished products for this rapidly advanving technological world.</p>
     </div>
         <div style="height:30px;"></div>
     </div>
     <!--second column-->
     <div class="col-sm-3">
       <div class="col-sm-10">
         <h4 class="feature-title animated rollIn"><i class="fa fa-globe blue-text fa-2x"></i>  Community</h4>
         <p class="grey-text">Meet programmers from all over, all ages, and all levels. Interact and work together on projects. Find answers to all your programming related questions, and contribute to our open source community. Join any one of our <a href="cliff/">forums</a> now</p>
     </div>
         <div style="height:30px;"></div>
     </div>
     <!--third column-->
     <div class="col-sm-3">
       <div class="col-sm-10">
         <h4 class="feature-title animated slideInRight"><i class="fa fa-book green-text fa-2x"></i>  Learn</h4>
         <p class="grey-text">Join our <a href="php.page.php">tutorial sessions</a> and learn how to program and develop swift and efficient programs. Use our specially designed carriculum that employs the use of several mediums of teaching to help you learn programming with ease and in style.</div>
         <div style="height:30px;"></div>
     </div>
     <!--fourth column-->
     <div class="col-sm-3">
       <div class="col-sm-10">
         <h4 class="feature-title animated zoomInDown"><i class="fa fa-magic cyan-text fa-2x"></i>  Simplicity</h4>
         <p class="grey-text">Our platform is built to allow you easy access to all our resources. Find and use tools from our platform to make development easy. Get access to <a href="work.php">job listings</a>, source code files, code editors, forums, and use for your developments.
         </div>
         <div style="height:30px;"></div>
     </div>
 </div>
 </div>
 <div class="col-md-12" style="margin-top: 15px;"></div>

 <?php
 if (!loggedin()) {
 include 'footer.php';
 }else {
   include 'loggedin.footer.php';
 }
  ?>
