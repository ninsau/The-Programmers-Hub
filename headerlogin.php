<!DOCTYPE html>
<html lang="en">
<!--Developed by C. Blay for theprogrammershub.net -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="img/thehub.ico.jpg" type="image/x-icon">
<meta name="description" content="Learn to code for free and interact with an open source community of programmers and computer enthusiasts.">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="theprogrammershub, learn to code for free in ghana, learn, cassidy blay, computers, programming, the hub, web development, mobile development, code editors, api, source code, learn to code, learn cprogramming, learn php, jobs, the programmer's hub, the programmers hub, programmerhub, programminghub, learn to code for free">
<meta name="author" content="Cassidy Blay" />
<meta name="contact" content="cassidyblay@gmail.com" />
<meta name="copyright" content="Copyright (c)2017 The Programmer's Hub. All Rights Reserved." />
<meta property="og:title" content="Learn to code for free and interact with an open source community of programmers and computer enthusiasts">
<meta property="og:url" content="http://www.theprogrammershub.net">
<meta property="og:description" content="Learn to code for free and get help with all your programming questions.">
<meta property="og:image" content="http://www.theprogrammershub.net/img/thehub.ico.jpg">
<meta property="og:type" content="article">
<meta name="robots" content="all,follow">
<!-- css-->
<link href="css/preloader.css" rel="stylesheet">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/enhanced-modals.min.css" rel="stylesheet">
<style>
.margin {
  margin-top: 65px;
}
    .bg-skin-lp {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
    }
</style>
</head>
<body class="fixed-sn bg-skin-lp" onload="myFunction()" style="margin:0;">
  <div id="greeting" style="height: 70vh;" class="flex-center flex-column">
  <h2 class="greeting">Learn to code for free!</h2><br><br><hr></div>
  <div id="loader">
  <div class="first"></div>
  <div class="second"></div>
</div>
<div style="display:none;" id="myDiv" class="animate-bottom">
   <!--Double navigation-->
   <header>
     <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar" style="color: #263238">
            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="index"><img src="img/thehub.jpg" alt="the programmershub.net logo" class="flex-center" width=250></a>
                </div>
            </li>
            <!--/. Logo -->
            <!--search form for users -->
            <li>
              <form action="findProfile.php" method="Get">
                          <div class="md-form input-group">
                      <input type="text" class="form-control inherit" style="color: white;" name="search_user" placeholder="Find user profile" required>
                             <button class="btn btn-indigo btn-md" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    </form>
            </li>
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                  <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-code"></i>Learn<i class="fa fa-angle-down rotate-icon"></i></a>
                      <div class="collapsible-body">
                        <ul class="collapsible">
                          <li><a href="getstarted" style="color:white;" class="waves-effect">Getting started</a></li>
                          <li><a href="map" style="color:white;" class="waves-effect">PHP</a></li>
                          <li><a href="cmap" style="color:white;" class="waves-effect">C</a></li>
                        </ul>
                      </div>
                    </li>
            <ul class="collapsible"><li><a href="downloadables" style="color:white;" class="waves-effect" ><i class="fa fa-download"></i>Download</a></li></ul>
            <ul class="collapsible"><li><a href="sourcecodes" style="color:white;" class="waves-effect" ><i class="fa fa-archive"></i>Source codes</a></li></ul>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-html5"></i>Code Editors<i class="fa fa-angle-down rotate-icon"></i></a>
             <div class="collapsible-body">
              <ul class="collapsible">
              <li><a href="phpeditor" style="color:white;" class="waves-effect">PHP</a></li>
              <li><a href="jseditor" style="color:white;" class="waves-effect">Javascript</a></li>
              <li><a href="htmleditor" style="color:white;" class="waves-effect">HTML</a></li>
              </div>
            </li>
                </ul>
                <ul class="collapsible"><li><a href="donate" alt="Support by donating to the programmer's hub" style="color:white;" class="waves-effect" ><i class="fa fa-money"></i>Donate</a></li></ul>
            </li>
            <!--/. Side navigation links -->
            <div class="sidenav-bg mask-strong"></div>
        </ul>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
       <nav class="navbar fixed-top navbar-toggleable-md navbar-dark indigo scrolling-navbar double-nav">
           <!-- SideNav slide-out button -->
           <div class="float-xs-left">
               <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
           </div>
           <!-- Breadcrumb-->
           <div class="breadcrumb-dn mr-auto">
              <p> <a href="index">The Programmer's hub</a></p>
           </div>
             <ul class="nav navbar-nav ml-auto flex-row">
               <li class="nav-item">
                   <a href="index" class="nav-link"><i class="fa fa-home" title="Home"></i> <span class="hidden-sm-down">Home</span></a>
               </li>
               <li class="nav-item">
                   <a href="work" alt="Find job vacancies and make yourself available for employment here" class="nav-link"><i class="fa fa-briefcase" title="Jobs"></i> <span class="hidden-sm-down">Jobs</span></a>
               </li>
<div class="btn-group">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="account" style="color: #000000; text-align:center;"><i class="fa fa-user" title="myaccount"></i>&nbsp;&nbsp;Profile</a>
  <a class="dropdown-item" href="updateprofile" style="color: #000000;text-align:center;"><i class="fa fa-refresh" title="upprofile"></i>&nbsp;&nbsp;Update Profile</a>
        <a class="dropdown-item" href="logout" style="color: #000000;text-align:center;"><i class="fa fa-sign-out" title="logoutaccount"></i>&nbsp;&nbsp;Log Out</a>
    </div>
           </ul>
       </nav>
       <!-- /.Navbar -->
   </header>
<script type="text/javascript" src="js/jscript.js"></script>
<script type="text/javascript" src="js/enhanced-modals.min.js"></script>
        <script>
        $(".button-collapse").sideNav();
        </script>
        <script>
        var myVar;
        function myFunction() {
            myVar = setTimeout(showPage, 1200);
        }

        function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("greeting").style.display = "none";
          document.getElementById("myDiv").style.display = "block";
        }
        </script>
        <!--google analytics scripts-->
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-96580657-1', 'auto');
        ga('send', 'pageview');
        </script>
        <script>
          ((window.gitter = {}).chat = {}).options = {
            room: 'The-Programmers-Hub/Lobby?source=orgpage'
          };
        </script>
        <script src="https://sidecar.gitter.im/dist/sidecar.v1.js" async defer></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
         <script>
           var OneSignal = window.OneSignal || [];
           OneSignal.push(["init", {
             appId: "8c87c521-6aee-495b-9d75-bb6a4f8397eb",
             autoRegister: true, /* Set to true to automatically prompt visitors */
             httpPermissionRequest: {
               enable: true
             },
             notifyButton: {
                 enable: true /* Set to false to hide */
             }
           }]);
         </script>
        <div class="margin col-md-12"></div>
