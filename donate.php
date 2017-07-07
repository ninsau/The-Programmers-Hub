<title>Support the programmers hub by donating today </title>
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
     <h2 class="animated fadeIn">Support Us.</h2>
     <p class="animated fadeIn">The Programmer's Hub is an open source programming community focused on encouraging more people to program and also to improve
     the standard of programmers and the quality of code.</p>
     <p class="animated fadeIn">As a programming community, we do outreach programs mainly with orphanages where we teach code and also donate foodstuff and clothing.</p>
     <p class="animated fadeIn">You can join our community and engage with programmers of all levels and ages, and also participate in our programming
     tutorials, ask programming questions and get answers, and also join hundreds of sub communitites.</p>
     <p class="animated fadeIn">We've come far in these few months but we still have a long way to go.</p>
     <p class="animated fadeIn">Support us by helping us pay for food and transportation during our outreach programs,and also help us pay for our
     servers and domain. Donate to us as regularly as you can afford : </p>
     <a href="http://theprogrammershub.net/donate/" style="color: white;"><button class="btn indigo" type="submit">GHC 5</button></a>
     <a href="http://theprogrammershub.net/donate/"><button class="btn black" type="submit">GHC 10</button></a>
     <a href="http://theprogrammershub.net/donate/" style="color: white;"><button class="btn red" type="submit">GHC 15</button></a>
     <a href="http://theprogrammershub.net/donate/"><button class="btn green" type="submit">GHC 20</button></a>
     <h4 style="font-family: monospace">Thanks for supporting Us!</h4>
      </div>
   </div>
 </div>
 <?php
 if (!loggedin()) {
 include 'footer.php';
 }else {
   include 'loggedin.footer.php';
 }
  ?>
