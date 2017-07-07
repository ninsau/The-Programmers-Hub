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
 <div class="container-fluid" style="background-color: #263238; margin-top: -50px; padding-top: 45px">
 <div class="text-xs-center">
   <div class="text-center">
     <img src="img/thehub.ico.jpg" alt="website logo" width="60" height="60">
     <div class="col-md-6 container">
     <h2 class="animated fadeInLeftBig" style="color: white; font-family: Georgia;">The hub is a playground for programmers across platform.</h2>
     <p class="animated fadeInRightBig grey-text">Learn to code for free and interact with a community of programmers of different levels and skillset.</p>
      </div>
      <a style="color: white;" type="button" data-toggle="modal" data-target="#modalRegister" alt="Become a member of our community today. Click here to register now!"><button class="btn btn-lg green btn-rounded animated bounce infinite" type="submit">Sign Up Now !</button></a>
 </div>
 </div><hr>
</div>
 <div class="container-fluid" style="background-color: #1C2331; margin-top: -20px; padding-top: 15px;">
    <div class="row">
      <div class="col-sm-4">
        <div class="col-sm-10">
          <h4 class="feature-title animated zoomIn" style="color:white;"><i class="fa fa-code yellow-text fa-2x"></i>  Find source codes</h4>
          <p class="grey-text">Get access to source code files for your projects for free</p>
        <a href="web.php"><button class="btn btn-lg btn-outline-primary btn-rounded">Get source codes</button></a>
      </div>
          <div style="height:30px;"></div>
      </div>
      <div class="col-sm-4">
        <div class="col-sm-10">
          <h4 class="feature-title animated bounceIn" style="color:white;"><i class="fa fa-window-restore brown-text fa-2x"></i>  Cliff</h4>
          <p class="grey-text">Remotely work efficiently and securely with your team</p>
          <a href="cliff"><button class="btn btn-lg btn-outline-secondary btn-rounded">Try Cliff</button></a>
      </div>
          <div style="height:30px;"></div>
      </div>
      <div class="col-sm-4">
        <div class="col-sm-10">
          <h4 class="feature-title animated slideInRight" style="color:white;"><i class="fa fa-comment-o green-text fa-2x"></i>  Join our forum</h4>
          <p class="grey-text">See updates and community discussions here</p>
          <a href="read.php"><button class="btn btn-lg btn-outline-info btn-rounded">Join Discussion</button></a>
      </div>
          <div style="height:30px;"></div>
      </div>
    </div>
</div>
 <div class="col-md-12" style="margin-top: 40px;"></div>
 <div class="container-fluid">
 <div class="row">
     <!--first column-->
     <div class="col-sm-3">
       <div class="col-sm-10">
         <h4 class="feature-title animated rotateIn"><i class="fa fa-eye red-text fa-2x"></i>  Our Mission</h4>
         <p class="grey-text">Our <a href="about.php">mission</a> is to provide programmers, and the programming community as a whole, reliable and quality source codes and tools to help make more dependable finished products for this rapidly advancing technological world.</p>
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
