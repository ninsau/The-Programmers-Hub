<?php
require ('core.inc.php');
include 'connect.php';
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
}
 ?>
<title>Getting started with programming | The Programmer's Hub </title>
<div id="intro" class="text-xs-center" style="margin-top: 5px;">
  <div class="text-center" id="intro-section">
    <img src="img/thehub.ico.jpg" alt="website logo" width="60" height="60">
    <div class="col-md-6 container">
    <h2>Hello and Welcome!</h2>
    <p class="animated fadeIn">With simplified notes and short video tutorials, we are going to help you learn to code and become an advanced programmer. No need to move from one place to another looking for programming materials anymore.
    Get all the help you need from right here. Before we begin, let's get you signed up on platforms you are going to need as a programmer.</p>
</div>
</div>
</div>
<div class="container-fluid" style="background-color: #1C2331; padding-top: 15px; margin-bottom: -25px;">
<div class="row">
  <div class="col-sm-4">
    <div class="col-sm-10">
      <h4 class="feature-title animated zoomIn" style="color:white;"><i class="fa fa-github fa-2x"></i>  Join Github</h4>
      <p class="grey-text">Github is a web-based git and internet hosting service. It's basically used to work on code - make revisions and updates to code. Github also fosters collaboration for projects. The programmer's Hub has its own <a href="https://www.github.com/CBlay/The-Programmers-Hub">repository</a> where we keep all our source codes.</p>
    <a href="https://www.github.com/CBlay/The-Programmers-Hub" target="_blank"><button class="btn btn-lg btn-outline-primary btn-rounded">Join github and contribute</button></a>
  </div>
      <div style="height:30px;"></div>
  </div>
  <div class="col-sm-4">
    <div class="col-sm-10">
      <h4 class="feature-title animated bounceIn" style="color:white;"><i class="fa fa-comment-o fa-2x"></i>  Gitter</h4>
      <p class="grey-text">Gitter is designed to make community messaging, collaboration and discovery as smooth and simple as possible. The Programmer's Hub has all its community discussions on Gitter. Download Gitter on iOS or Android and join the community discussions now.</p>
      <a href="https://gitter.im/The-Programmers-Hub/Lobby?at=597bc11d2723db8d5e56d54b" target="_blank"><button class="btn btn-lg btn-outline-secondary btn-rounded">Chat with the community</button></a>
  </div>
      <div style="height:30px;"></div>
  </div>
  <div class="col-sm-4">
    <div class="col-sm-10">
      <h4 class="feature-title animated slideInRight" style="color:white;"><i class="fa fa-code fa-2x"></i>  Let's code</h4>
      <p class="grey-text">Enough talk. You are now ready to start learning how to code.</p>
      <button class="btn btn-lg btn-outline-info btn-rounded" type="button" data-toggle="modal" data-target="#frameModalBottom" >Enter Classroom</button>
  </div>
      <div style="height:30px;"></div>
  </div>
</div>
</div>

<!-- Frame Modal Bottom -->
<div class="modal fade bottom" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-notify modal-success modal-frame modal-bottom" role="document">
  <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">One last step</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <p><span style="color: indigo; font-family: georgia;">Hubbot says : </span>Choose the programming language that you will like to begin learning.</p>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" href="map" class="btn btn-primary-modal">PHP</a>
                <a type="button" href="cmap" class="btn btn-primary-modal">C programming</a>
            </div>
        </div>
        <!--/.Content-->
    </div></div>
</script>
<?php include 'footer.php'; ?>
