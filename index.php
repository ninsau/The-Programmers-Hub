<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
} ?>
 <head>
   <title>Learn to code for free | The Programmer's Hub </title>
 </head>
 <div class="container-fluid" style="background-color: #1C2331; margin-top: -50px; padding-top: 45px">
 <div class="text-xs-center" style="padding-bottom:50px;">
   <div class="text-center">
     <img src="img/thehub.jpg" alt="website logo" width="60" height="60">
     <div class="col-md-6 container" style="padding-top:12px;">
     <h2 class="animated fadeInLeftBig" style="color: white; font-family: Georgia; font-size: 45px; padding-bottom:12px;">Learn to code for free!</h2>
     <p class="animated fadeInRightBig grey-text" style="padding-bottom:20px; font-size: 22px;">Join an open source community of programmers and computer enthusiasts and learn to code for free.</p>
      </div>
      <a style="color: white;" type="button" href="getstarted" alt="Become a member of our community today. Click here to learn to code now!"><button class="btn btn-lg green btn-rounded animated tada infinite" type="submit">Learn to code now !</button></a>
 </div>
 </div><hr>
    <div class="row" style="padding-bottom: 70px;">
      <div class="col-sm-4">
        <div class="col-sm-10">
          <h3 class="feature-title animated zoomIn" style="color:white;"><i class="fa fa-code yellow-text fa-2x"></i>  Learn PHP</h4>
          <p class="grey-text" style="font-size: 22px;">Learn to build dynamic web applications with PHP today</p>
        <a href="map"><button class="btn btn-lg btn-outline-primary btn-rounded">Start Tutorial</button></a>
      </div>
          <div style="height:30px;"></div>
      </div>
      <div class="col-sm-4">
        <div class="col-sm-10">
          <h3 class="feature-title animated bounceIn" style="color:white;"><i class="fa fa-database cyan-text fa-2x"></i>  Source Codes</h4>
          <p class="grey-text" style="font-size: 22px;">Get access to source code files to include within your projects for free</p>
          <a href="sourcecode"><button class="btn btn-lg btn-outline-secondary btn-rounded">Get files</button></a>
      </div>
          <div style="height:30px;"></div>
      </div>
      <div class="col-sm-4">
        <div class="col-sm-10">
          <h3 class="feature-title animated slideInRight" style="color:white;"><i class="fa fa-money green-text fa-2x"></i>  Donate</h4>
          <p class="grey-text" style="font-size: 22px;">Support our initiative to introduce programming to children's homes today</p>
          <a href="donate" target="_blank"><button class="btn btn-lg btn-outline-info btn-rounded">Learn more</button></a>
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
         <p class="grey-text">Our <a href="about">mission</a> is to provide programmers, and the programming community as a whole, reliable and quality source codes and tools to help make more dependable finished products for this rapidly advancing technological world.</p>
     </div>
         <div style="height:30px;"></div>
     </div>
     <!--second column-->
     <div class="col-sm-3">
       <div class="col-sm-10">
         <h4 class="feature-title animated rollIn"><i class="fa fa-globe blue-text fa-2x"></i>  Community</h4>
         <p class="grey-text">Meet programmers from all over, all ages, and all levels. Interact and work together on projects. Find answers to all your programming related questions, and contribute to our open source community. Join any one of our <a href="https://gitter.im/The-Programmers-Hub/Lobby?source=orgpage" target="_blank">forums</a> now</p>
     </div>
         <div style="height:30px;"></div>
     </div>
     <!--third column-->
     <div class="col-sm-3">
       <div class="col-sm-10">
         <h4 class="feature-title animated slideInRight"><i class="fa fa-book green-text fa-2x"></i>  Learn</h4>
         <p class="grey-text">Join our <a href="getstarted">tutorial sessions</a> and learn how to program and develop swift and efficient programs. Use our specially designed carriculum that employs the use of several mediums of teaching to help you learn programming with ease and in style.</div>
         <div style="height:30px;"></div>
     </div>
     <!--fourth column-->
     <div class="col-sm-3">
       <div class="col-sm-10">
         <h4 class="feature-title animated zoomInDown"><i class="fa fa-magic cyan-text fa-2x"></i>  Simplicity</h4>
         <p class="grey-text">Our platform is built to allow you easy access to all our resources. Find and use tools from our platform to make development easy. Get access to <a href="work">job listings</a>, source code files, code editors, forums, and use for your developments.</p>
         </div>
         <div style="height:30px;"></div>
     </div>
 </div>
 </div>
 <div class="col-md-12" style="margin-top: 15px;"></div>
 <?php
 include 'footer.php';
  ?>
