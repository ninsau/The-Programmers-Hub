<head>
  <title>Hire | The Hub </title>
</head>
<!-- intro section -->
<div id="hireMe" class="text-xs-center">
  <div class="text-center" id="intro-section">
    <img src="img/thehub.ico.jpg" width="60" height="60">
    <div class="col-md-6 container">
    <h2>Find a job here</h2>
    <p>Are you looking to find work? Post your ad and make companies find you.</p>
    <button class="btn btn-md green" type="submit"><a href="hire.form.php" onmouseover="toastr.info('Click here to make yourself available for hire.');" style="color: white;">Post your ad here</a></button>
     </div>
  </div><hr>
</div>
<div class="container-fluid">
  <?php
  include 'connect.php';
  $sql= "SELECT * FROM job_ad ORDER BY id DESC";
  $result = mysqli_query($link, $sql);
  while (@$row = mysqli_fetch_array($result)) {
    echo '
     <div class="col-md-6">
    <div class="card card-block">
     <h3 style="font-size: 12px;">First Name: <strong>'.$row['first_name'].'</strong></h3>
      <h3 style="font-size: 12px;">Last Name: <strong>'.$row['last_name'].'</h3><hr>
      <h3 style="font-size: 12px;">Email: <strong>'.$row['email'].'</strong></h3>
      <h3 style="font-size: 12px;">Telephone: <strong>'.$row['phone'].'</strong></h3>
      <h3 style="font-size: 12px;">Location: <strong>'.$row['location'].'</strong></h3><hr>
      <h3 style="font-size: 12px;">Skill: <strong>'.$row['skill'].'</strong></h3>
      <h3 style="font-size: 12px;">Additions: <strong>'.$row['text1'].'</strong></h3>
      </div>
      </div><hr>';
  }
   ?>
 </div>
