<title>Community | The Hub </title>
<?php
require ('core.inc.php');
include ('connect.php');
if(loggedin()) {
  include ('headerlogin.php');
}else {
  include_once ('header.php');
}
 ?>
 <div class="text-xs-center">
   <div class="text-center">
     <img src="img/thehub.ico.jpg" alt="website logo" width="60" height="60">
     <div class="col-md-6 container">
     <h2 class="animated flash infinite">Become a member!</h2>
      </div>
   </div>
 </div><hr>
  <div class="container-fluid row">
   <div class="col-sm-4">
     <div class="col-sm-10">
       <h4 class="feature-title"><i class="fa fa-bullhorn green-text fa-2x"></i>  Engage with our social media platforms.</h4>
       <p class="grey-text">Engage with us on <a href="https://facebook.com/theprogrammershubgh/"><i class="fa fa-facebook"></i> facebook</a>, and follow us on <a href="https://twitter.com/ProgrammerHub/"><i class="fa fa-twitter"></i> twitter</a> and also on <a href="https://instagram.com/theprogrammershub/"><i class="fa fa-instagram"></i>instagram</a> for the latest news concerning our community.</p></div>
       <div style="height:30px;"></div>
   </div>
   <div class="col-sm-4">
     <div class="col-sm-10">
       <h4 class="feature-title"><i class="fa fa-magic blue-text fa-2x"></i>  Interract with the community.</h4>
      <p class="grey-text">Visit our <a href="https://gitter.im/The-Programmers-Hub/Lobby?source=orgpage"><i class="fa fa-comment-o"></i>chat room</a> and find out more about the community. Learn how to <a href="contribute"><i class="fa fa-database"></i>contribute </a>to our open source projects and find developers available for <a href="work"><i class="fa fa-briefcase"></i> employment.</a> Support us by <a href="donate"><i class="fa fa-money"></i> donating</a> to us today! </p>
        <div style="height:30px;"></div>
      </div>
   </div>
   <div class="col-sm-4">
     <div class="col-sm-10">
       <h4 class="feature-title"><i class="fa fa-code cyan-text fa-2x"></i>  Join our tutorial sessions and learn to code now.</h4>
      <p class="grey-text">Learn <a href="phpclassroom">PHP programming</a> today with our learning environment, and build your very own dynamic website. Also try our code editors and test your code in <a href="phpeditor"><i class="fa fa-code"></i>PHP </a> or in <a href="htmleditor"><i class="fa fa-html5"></i> HTML5</a> now. </p>
        <div style="height:30px;"></div>
   </div>
 </div>
 </div>

<?php
include 'footer.php'; ?>
