<?php
require ('core.inc.php');
include ('headerlogin.php');
include('connect.php');
if(loggedIn()) {
$sql= "SELECT * FROM registration WHERE email ='".$_SESSION['email']."'";
  $result = mysqli_query($link, $sql);
  while (@$row = mysqli_fetch_array($result)) {

  if($_POST)
{

$fnm= $_POST["fnm"];
$lnm= $_POST["lnm"];
$phn= $_POST["phn"];
$abi= $_POST["abi"];

$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;


 if(trim($fnm)=="")
      {
$err1=1;
}
 if(trim($lnm)=="")
      {
$err2=1;
}
if(trim($phn)=="")
      {
$err3=1;
}
if(trim($abi)=="")
      {
$err4=1;
}
$error = $err1+$err2+$err3+$err4;


if ($error == 0){
  $res = "UPDATE registration SET first_name='".$fnm."', last_name='".$lnm."', PhoneNumber='".$phn."', Abilities='".$abi."' WHERE email='".$_SESSION['email']."'";
  $result = mysqli_query($link, $res);
if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>

Updated Successfully!

</div>";
 echo "<meta http-equiv='refresh' content='0'>";
}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
Some Problem Occure. Please Try Again Later !

</div>";
}
} else {

if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>

First Name Can Not Be Empty!!!

</div>";
}
if ($err2 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>

Last Name Can Not Be Empty!!!

</div>";

}
if ($err3 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>

Phone Number Can Not Be Empty!!!

</div>";

}
if ($err4 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>

Abilities Can Not Be Empty!!!

</div>";

}
}



}
    echo '<section class="section">
     <div class="inner text-center">
<h4 class="title text-white uppercase" style="position: relative; color:#000000!important;">Update your Profile -'. $ufnm .'</h4>
</div>
  <div class="col-md-6 col-md-offset-3 col-sm-12">





<form action="" method="post" id="proForm" name="proForm">







First Name:
<input class="form-control input-lg" name="fnm" type="text" value="'.$row['first_name'].'" required><br><br>
Last Name:
<input class="form-control input-lg" name="lnm" type="text" value="'.$row['last_name'].'" required><br><br>
Phone Number:
<input class="form-control input-lg" name="phn" type="tel" value="'.$row['PhoneNumber'].'" required><br><br>
Abilities (Programming Skills):
<input class="form-control input-lg" name="abi" type="text" value="'.$row['Abilities'].'" required><br><br>


<button type="submit" class="btn btn-success btn-block">CHANGE</button>

</form>


</div>



      <section>';
  }
}else {
  die("Unauthorised entry");
}
 include 'footer.php';
 ?>
</body>
</html>
