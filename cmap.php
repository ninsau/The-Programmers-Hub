<?php
require ('core.inc.php');
include 'connect.php';
if (loggedin()) {
  include ('headerlogin.php');
}else {
  include ('header.php');
}
 ?>
<title>Map to learning C programming to become an advanced Developer | The Programmer's Hub </title>
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
  xmlhttp.open('GET', 'csearchtutorials?ctut='+document.getElementById('tuts').value, true)
  xmlhttp.send ();
}
</script>

<div id="intro" class="text-xs-center" style="margin-top: 5px;">
  <div class="text-center" id="intro-section">
    <div class="col-md-6 container">
      <h2 style="font-size: 18px; font-family: geogia; color: indigo;">Click on topic to enter classroom | C Programming</h2>
<p style="font-family: georgia;">New tutorial videos are added as often as possible till course is complete <span style="color: red;">*</span></p>
     <p class="col-md-6 center">
     <form action="csearchtutorials.php" method="get">
       <div class="md-form input-group">
   <input type="text" id="tuts" class="form-control inherit" name="tut" onkeyup="searchTut();" placeholder="Search tutorial" required>
   <button class="btn btn-indigo btn-md" type="submit"><i class="fa fa-search"></i></button>
 </form></div>
     </p>
</div>
</div></div>
 <div class="center " id="result"></div><hr class="container">
<?php
$sql= "SELECT * FROM ctuts ORDER BY id ASC";
$result = mysqli_query($link, $sql);
while (@$row = mysqli_fetch_array($result)) {
echo '
<div class="container-fluid col-md-6 center" ><i class="fa fa-circle-thin grey-text"></i><a style="margin-left: 22px; font-family: Georgia; font-size: 18px;" href="cclassroom?ctut='.$row['id'].'">'.$row['title'].'</a></div>';
}
 include 'footer.php';
?>
