<title> System Source | The Hub </title>
<?php
require ('core.inc.php');
include ('connect.php');
$sql = "CREATE TABLE system_source ( `id` INT(11) NOT NULL AUTO_INCREMENT , `session` VARCHAR(50) NOT NULL , `text1` TEXT(250) NOT NULL, `pic` VARCHAR(50) NOT NULL, `name` VARCHAR(25) NOT NULL , PRIMARY KEY (`id`))";
$run = mysqli_query($link, $sql);
$sqlo ="ALTER TABLE system_source ADD file_name VARCHAR(40) NOT NULL AFTER `name`";
$run0 = mysqli_query($link, $sqlo);
if (!loggedin()) {
  include_once ('header.php');
  echo "<div class=\"alert alert-info alert-dismissable\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
  Log into your account to contribute to or to view source code files.
  </div>";
  die();
}else {
include ('headerlogin.php');
//ip address grabbing
  @$cli_ip = $_SERVER['HTTP_CLIENT_IP'];//grabbing from client ip
  @$for_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];//grabbing from forwarded ip
  @$rem_addr = $_SERVER['REMOTE_ADDR'];//grabbing ip from remote address
//Uploading files from webpage to directory
  $target_dir = "system/";
  @$target_file = $target_dir.basename ($_FILES ["fileToUpload"]["name"]);
  $upLoadOk = 1;
  $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if (isset($_POST['submit'])) {
      //validating upload description
      $source_info = htmlspecialchars(mysqli_real_escape_string($link, $_POST['submit']));

      if ($_FILES["fileToUpload"] ["size"] > 500000) {
        //restricting upload file size to 500kb
        echo " <div class=\"alert alert-danger alert-dismissable\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
    Sorry,Your file size is too large. Try with a file at least 500kb.
      </div> <br>";
        $uploadOK = 0;
        }
      if ($FileType != "txt") {
          echo " <div class=\"alert alert-danger alert-dismissable\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
      Sorry, Only .txt files allowed. Try again.
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
              @$row = mysqli_fetch_array($result);
                $pic = $row['profile_pic'];
                $def = 'thehub.ico.jpg';
                if ($pic == null ) {
                  $pic = $def;

                $query = "INSERT INTO system_source(id, session, text1, pic, name, file_name) VALUES ('', '".$session."', '".$text."', '".$pic."', '".$name."', '".$basename."')";
           if ($query_run = mysqli_query($link, $query)) {
             echo "<div class=\"alert alert-success alert-dismissable\">
           <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
           The file ".basename($_FILES["fileToUpload"]["name"]). " has been uploaded. Successfully!
           </div> <p>Click <a href=\"system.php\">here</a> to return ";
           die();
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
             <h2 style="font-size: 15px;">Find or post web development source codes here</h2>
           <form action="system.php" method="POST" enctype="multipart/form-data">
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
    //the following code displays contents of uploaded file in the directory
    if ($handle = opendir($target_dir)) {
      //opening target directory
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
Browse through available source code files below !
</div> ";
$sql= "SELECT * FROM system_source ORDER BY id DESC";
$result = mysqli_query($link, $sql);
while (@$row = mysqli_fetch_array($result)) {
$img = $row['pic'];
$dirname = 'profile/'.$img;
$images = glob ($dirname."*");
if ($images) {
  echo ' <div class="container  col-md-4">
    <div class="row">
   <div class="card card-block">
        <div class="chip">
            <img src="'.@$images[0].'" alt="Contact Person"> '.$row['name'].'
        </div><hr>
        <div class="text-center>"><h6><strong>Description :</strong> '.$row['text1'].'</h6></div><hr>
        <p>View file: <a href="'.$target_dir.$row['file_name'].'">'.$row['file_name'].'</a></p>
        </div>
        </div>
        </div>
        </div><hr>';
}
}
    include_once ('loggedin.footer.php');
}
}
 ?>
