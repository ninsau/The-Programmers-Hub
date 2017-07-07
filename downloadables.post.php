<title> Upload file | The Hub </title>
<?php
require ('core.inc.php');
include ('connect.php');
$sql = "CREATE TABLE downloadables( `id` INT(11) NOT NULL AUTO_INCREMENT , `session` VARCHAR(50) NOT NULL , `text1` TEXT(250) NOT NULL, `pic` VARCHAR(50) NOT NULL, `name` VARCHAR(25) NOT NULL , file_name VARCHAR(40) NOT NULL, PRIMARY KEY (`id`))";
$run = mysqli_query($link, $sql);


if (!loggedin()) {
  include_once ('header.php');
  echo "<div class=\"alert alert-info alert-dismissable\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
  Log into your account to contribute.
  </div>";
  die();
}else {
include ('headerlogin.php');
//Uploading files from webpage to directory
  $target_dir = "downloadables/";
  @$target_file = $target_dir.basename ($_FILES ["fileToUpload"]["name"]);
  $upLoadOk = 1;
  $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if (isset($_POST['submit'])) {
      //validating upload description
      $source_info = htmlspecialchars(mysqli_real_escape_string($link, $_POST['submit']));

      if ($_FILES["fileToUpload"] ["size"] > 50000000) {
        //restricting upload file size to 50mb
        echo " <div class=\"alert alert-danger alert-dismissable\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
    Sorry,Your file size is too large. Try with a file at least 50mb.
      </div> <br>";
        $uploadOK = 0;
        }
      if ($FileType == "txt" && $FileType == "htm" && $FileType == "html" && $FileType == "xml" && $FileType == "php" && $FileType == "js" ) {
          echo " <div class=\"alert alert-danger alert-dismissable\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
      Sorry, .txt, .htm(l), .xml, .js, .php files are NOT allowed. Try again.
        </div>";
          $uploadOK = 0;
        }
      if (@$uploadOK === 0) {
        //returning to last location upon upload fail
        $lastloc = $_SERVER['HTTP_REFERER'];
        echo "<div class=\"alert alert-warning alert-dismissable\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
      Failed to upload ".basename($_FILES["fileToUpload"]["name"]). "! Try again.
      </div> <p>Click <a href=\"$lastloc\">here</a> to return ";
      die();
      }else {
        if (move_uploaded_file($_FILES ["fileToUpload"]["tmp_name"], $target_file)) {
          $basename = basename($_FILES["fileToUpload"]["name"]);

          //moving uploaded files to directory
            if (isset($_POST['text'])&&!empty('text')) {
              $text = htmlspecialchars(mysqli_real_escape_string($link, $_POST['text']));
              $session = $session = $_SESSION['email'];

              $sql= "SELECT * FROM registration WHERE email = '$session'";
              $result = mysqli_query($link, $sql);
              while (@$row = mysqli_fetch_array($result)) {
                $name = $row['first_name'];

              $sql= "SELECT * FROM profile WHERE session = '$session'";
              $result = mysqli_query($link, $sql);
              while (@$row = mysqli_fetch_array($result)) {
                $pic = $row['profile_pic'];

           $query = "INSERT INTO downloadables(id, session, text1, pic, name, file_name) VALUES ('', '".$session."', '".$text."', '".$pic."', '".$name."', '".$basename."')";
           if ($query_run = mysqli_query($link, $query)) {
             echo "<div class=\"alert alert-success alert-dismissable\">
           <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
           The file ".basename($_FILES["fileToUpload"]["name"]). " has been uploaded. Successfully!
           </div> <p>Click <a href=\"downloadables.php\">here</a> to return ";
           die();
         }else {
           echo "Sorry. An error occurred. We will work on fixing it as soon as possible. Thank you.";
         }
}
}
            }
          }else {
            echo "There was an error uploading your file";
          }
        }
      }
      echo ' <div id="intro" class="text-xs-center">
         <div class="text-center" id="intro-section">
           <img src="img/thehub.ico.jpg" width="60" height="60">
           <div class="col-md-6 container" style="margin-top: 100px;">
             <h2 style="font-size: 15px;">Post files for memebers to download here</h2>
           <form action="downloadables.post.php" method="POST" enctype="multipart/form-data">
             <div class="input-group md-form">
             <textarea class="md-textarea text-center" maxlength="250" name="text" placeholder="Add a description to the uploaded file. Not more than 250 words" id="text" required></textarea>
             </div>
                 <div class="btn btn-indigo btn-sm">
                     <span>Choose file</span>
                     <input type="file" name="fileToUpload">
                 </div>
             <button type="submit" class="btn-indigo btn btn-block"  name="submit">Post</button><br><br>
           </form>
            </div>
             </div>
       </div>';
include 'loggedin.footer.php';
}
 ?>
