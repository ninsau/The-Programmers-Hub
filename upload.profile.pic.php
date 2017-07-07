
<?php
require ('core.inc.php');
include ('connect.php');
$sql = "CREATE TABLE profile ( `id` INT(11) NOT NULL AUTO_INCREMENT , `profile_pic` VARCHAR(50) NOT NULL , `session` VARCHAR(60) NOT NULL , PRIMARY KEY (`id`))";
$run = mysqli_query($link, $sql);

$target_dir = "profile/";
@$target_file = $target_dir.basename ($_FILES ["fileToUpload"]["name"]);
$upLoadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (isset($_POST["submit"])) {
  @$check = getimagesize(@$_FILES ["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - ". $check["mime"] . ".<br>";
    $upLoadOk = 1;
  }else {
    echo "File is not an image. <br>";
    $uploadOK = 0;
  }
  if ($_FILES["fileToUpload"] ["size"] > 500000) {
    echo " Your file size is too large. <br>";
    $uploadOK = 0;
  }
if (@$uploadOK === 0) {
  $lastloc = $_SERVER['HTTP_REFERER'];
  echo ' Your file was not uploaded. <a href="'.$lastloc.'">Click here to return</a>';
}else {
    if (move_uploaded_file($_FILES ["fileToUpload"]["tmp_name"], $target_file)) {
      echo " The file ".basename($_FILES["fileToUpload"]["name"]). " has been uploaded. <br>";
        $basename = basename($_FILES["fileToUpload"]["name"]);
      $query = "INSERT INTO profile(id, profile_pic, session) VALUES ('', '".$basename."', '".$_SESSION['email']."')";
      if ($query_run = mysqli_query($link, $query)) {
        header('Location: account.php');
      }

    }else {
      echo " Sorry, There was an error uploading your file. <br>";
    }
  }
}


 ?>
 <form action="upload.profile.pic.php" method="POST" enctype="multipart/form-data">
   <input type="file" name="fileToUpload">
   <button type="submit" class="btn btn btn-primary btn-block"  name="submit">Upload</button>
 </form>
