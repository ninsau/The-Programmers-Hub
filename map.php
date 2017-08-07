<?php
require ('core.inc.php');
include 'connect.php';
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
}
 ?>
<title>Map to learning PHP to become an advanced Developer | The Programmer's Hub </title>
<script>
function searchTut () {
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  }else {
    xmlhttp = new ActiveObject('Microsoft.XMLHTTP');
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('result').innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open('GET', 'phpsearchtutorials?tut='+document.getElementById('tuts').value, true)
  xmlhttp.send ();
}
</script>
<div class="text-xs-center" style="margin-top: 5px;">
  <div class="text-center">
    <div class="col-md-6 container">
    <h2 style="font-size: 18px; font-family: geogia; color: indigo;">Click on topic to enter classroom | PHP</h2>
    <p style="font-family: georgia;">New tutorial videos are added as often as possible till course is complete <span style="color: red;">*</span></p>
     <p class="col-md-6 center">
     <form action="phpsearchtutorials" method="get">
       <div class="md-form input-group">
   <input type="text" id="tuts" class="form-control inherit" name="tut" onkeyup="searchTut();" placeholder="Search tutorial" required>
   <button class="btn btn-indigo btn-md" type="submit"><i class="fa fa-search"></i></button>
 </form></div>
     </p>
</div>
</div></div>
 <div class="center " id="result"></div><hr class="container">
<div class="col-md-12"></div>
<?php
$sql= "SELECT * FROM phptuts ORDER BY id ASC";
$result = mysqli_query($link, $sql);
while (@$row = mysqli_fetch_array($result)) {
echo '
<div class="container-fluid col-md-6 center"><i class="fa fa-circle-thin grey-text"></i><a style="margin-left: 22px; font-family: Georgia; font-size: 18px;" href="phpclassroom?tut='.$row['id'].'">'.$row['title'].'</a></div>';
}
 include 'footer.php';
?>
