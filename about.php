<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
} ?>
 <title> About Us | The Hub </title>
 <!-- intro section -->
 <div id="intro" class="text-xs-center">
   <div class="text-center" id="intro-section">
     <img src="img/thehub.ico.jpg" width="60" height="60">
     <div class="col-md-6 container">
       <h2>Stats</h2>
       <p>Founded: <strong id="dte" style="color: indigo"></strong> days ago</p>
       <?php
       include ('connect.php');
       $query = "SELECT * FROM registration";
       $query_run = mysqli_query($link, $query);
       @$count = mysqli_num_rows($query_run);
       ?>
       <p>Registered members: <strong style="color: indigo"><?php echo $count ?></strong> members</p>
     <h2>About Us</h2>
     <p>We are an open source community interested in improving the quality of programmers and
     the programs they write. Find like minded programmers to help you work on your projects
     and provide you with the best of assistance you can get. Review the numerous amount of free source
      from our platform and add to your projects and development. Find the right group
    of developers to work on your startups or companies. Contribute to our community and have unlimited access to sell
    your templates and applications.</p>
    <h3>Our Mission</h3>
    <p>Our mission is to provide programmers, and the programming community as a whole,
    reliable and quality source codes and tools to help make more dependable finished
    products for this rapidly advanving technological world.</p>
    <h3>Links</h3>
    <ul>
        <li><a href="https://www.facebook.com/theprogrammershubgh/"><i class="fa fa-facebook"></i> Facebook</a></li>
        <li><a href="https://twitter.com/ProgrammerHub"><i class="fa fa-twitter"></i> Twitter</a></li>
        <li><a href="https://instagram.com/theprogrammershub"><i class="fa fa-instagram"></i> Instagram</a></li>
        <li><a href="https://www.github.com/CBlay/The-Programmers-Hub"><i class="fa fa-github"></i> GitHub</a></li>
    </ul>
    <h2>Founder</h2>
    <p><a href="https://www.github.com/CBlay">Cassidy</a> started <a href="http://theprogrammershub.net">The Programmer's Hub</a> as a whatsApp based group that focused on peer-to-peer review of code. He has remained one of the many contributers to this platform. </p>
      </div>
   </div>
 </div>
 <script>
  var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
  var firstDate = new Date(2017,00,18);
  var secondDate = new Date();
  var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
  document.getElementById("dte").innerHTML = diffDays;</script>
 <?php
 if (!loggedin()) {
 include 'footer.php';
 }else {
   include 'loggedin.footer.php';
 }
  ?>
