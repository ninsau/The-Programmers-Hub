<?php
require ('core.inc.php');
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
} ?>
 <title> Know more about our programming community | The Programmer's Hub </title>
 <div class="container-fluid" style="background-color: #1C2331; padding-top: 55px; margin-top: -22px; margin-bottom: -22px;">
<div class="row">
  <div class="col-md-4"></div>
<div class="row col-md-8">
  <div class="col-sm-8">
    <div class="col-sm-10">
      <h4 class="feature-title animated zoomIn" style="color:white;"><i class="fa fa-magic fa-2x"></i>  Founded</h4>
      <p class="grey-text">The Programmer's Hub community was founded some </strong> <strong id="dte" style="color: white;"></strong> days ago</p>
  </div>
      <div style="height:30px;"></div>
  </div>
  <div class="col-sm-8">
    <div class="col-sm-10">
      <h4 class="feature-title animated bounceIn" style="color:white;"><i class="fa fa-users fa-2x"></i>  Community</h4>
      <?php
      include ('connect.php');
      $query = "SELECT * FROM registration";
      $query_run = mysqli_query($link, $query);
      @$count = mysqli_num_rows($query_run);
      ?>
      <p class="grey-text">We've got about <strong style="color: white;"><?php echo $count ?></strong> registered members who learn to code and interact daily with our platform.</p>
  </div>
      <div style="height:30px;"></div>
  </div>
  <div class="col-sm-8">
    <div class="col-sm-10">
      <h4 class="feature-title animated slideInRight" style="color:white;"><i class="fa fa-code fa-2x"></i>  Our story</h4>
      <p class="grey-text">We are an open source community interested in improving the quality of programmers and
      the programs they write. Our community started as a WhatsApp based group that focused on peer-to-peer review of code. Now, we are a community committed to teaching code and improving the coding skills of individuals.</p>
  </div>
      <div style="height:30px;"></div>
  </div>
  <div class="col-sm-8">
    <div class="col-sm-10">
      <h4 class="feature-title animated slideInRight" style="color:white;"><i class="fa fa-star-o fa-2x"></i>  Our mission</h4>
      <p class="grey-text">Our mission is to provide programmers, and the programming community as a whole,
      reliable and quality hands-on tutorials to help make them more equipped to make dependable finished
      products for this rapidly advancing technological world.</p>
  </div>
      <div style="height:30px;"></div>
  </div>
  <div class="col-sm-8">
    <div class="col-sm-10">
      <h4 class="feature-title animated slideInRight" style="color:white;"><i class="fa fa-link fa-2x"></i>  Links</h4>
      <p class="grey-text">  <ul class="inline-ul">
              <li><a href="https://www.facebook.com/theprogrammershubgh/" target="_blank"><i class="fa fa-facebook"></i> Facebook | </a></li>
              <li><a href="https://twitter.com/ProgrammerHub" target="_blank"><i class="fa fa-twitter"></i> Twitter |</a></li>
              <li><a href="https://instagram.com/theprogrammershub" target="_blank"><i class="fa fa-instagram"></i> Instagram |</a></li>
              <li><a href="https://www.github.com/CBlay/The-Programmers-Hub" target="_blank"><i class="fa fa-github"></i> GitHub</a></li>
          </ul></p>
  </div>
      <div style="height:30px;"></div>
  </div>
  <div class="col-sm-8">
    <div class="col-sm-10">
      <h4 class="feature-title animated slideInRight" style="color:white;"><i class="fa fa-pencil fa-2x"></i>  Founder</h4>
      <p class="grey-text"><a href="https://www.github.com/CBlay" target="_blank">Cassidy</a> started <a href="http://theprogrammershub.net">The Programmer's Hub</a> as a whatsApp based group that focused on peer-to-peer review of code. He is a primarily a full-stack web developer with a focus on backend, and has remained one of the many contributers to this platform.</p>
  </div>
      <div style="height:30px;"></div>
  </div>
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
 include 'footer.php';
  ?>
