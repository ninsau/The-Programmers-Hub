<?php
require ('core.inc.php');
include ('connect.php');
if(loggedin()) {
  include ('headerlogin.php');
}else {
  include_once ('header.php');
}

$sql = "CREATE TABLE read_comments ( `id` INT(11) NOT NULL AUTO_INCREMENT , `target` VARCHAR(300) NOT NULL , `user_session` VARCHAR(30) NOT NULL , `comment` TEXT NOT NULL , `profile_pic` VARCHAR(30) NOT NULL, `name` VARCHAR(30) NOT NULL, PRIMARY KEY (`id`))";
$runn = mysqli_query($link, $sql);

$sqlo ="ALTER TABLE read_comments ADD post_time VARCHAR(40) NOT NULL AFTER `name`";
$run0 = mysqli_query($link, $sqlo);

$comment = $_SESSION['question'];

$sql= "SELECT * FROM prog_new WHERE id ='".$comment."'";
$result = mysqli_query($link, $sql);
while (@$row = mysqli_fetch_array($result)) {
  $img = $row['profile_pic'];
  $dirname = 'profile/'.$img;
  $images = glob ($dirname."*");
  if ($images) {
echo '<div style="height: 30vh; font-family: monospace;">
<div class="flex-center container-fluid">
<section>
<div class="mdb-feed">
  <div class="news">

       <!--Label-->
       <div class="label">
           <img src="'.@$images[0].'" alt="Contact Person" class="rounded-circle z-depth-1-half">
       </div>
<div class="excerpt">

                        <!--Brief-->
                        <div class="brief">
                            <a class="name" href="verify.user.php?search_user='.$row['session'].'">'.$row['first_name'].'</a><div class="date">'.$row['post_time'].'</div>
                        </div>

                        <!--Added text-->
                        <div class="added-text animated fadeIn"><a href="comment.find.php?comment='.$row['news'].'" style="color: black">'.$row['news'].'</a></div>


</div>
</div>
</div><hr>
</section>
</div>
</div>
';
}
}
if (!loggedin()) {
  echo '<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  You need to <a href="login.php"> log in</a> to comment
  </div>';
}else {
echo '
<div class="container">
<div class="card card-block mt-1">
<form action="comment.php" method="POST" enctype="multipart/form-data">
<div class="md-form mt-1 mb-1">
  <textarea type="text" name="comment-text" id="comment-form" class="md-textarea" required></textarea>
  <label for="comment-form">Add Comment</label>
</div>
<button type="submit" name="submit" class="btn btn-primary float-right">Comment</button>
</form>
</div>
</div><hr>';
}
$sql= "SELECT * FROM read_comments WHERE target ='".$comment."'";
$result = mysqli_query($link, $sql);
while (@$row = mysqli_fetch_array($result)) {
  $img = $row['profile_pic'];
  $dirname = 'profile/'.$img;
  $images = glob ($dirname."*");
  if ($images) {
echo '<div style="font-family: sans-serif;">
<div class="flex-center container-fluid">
<div class="col-md-6">
<section>
<div class="mdb-feed">
  <div class="news">

       <!--Label-->
       <div class="label">
           <img src="'.@$images[0].'" alt="Contact Person" class="rounded-circle z-depth-1-half">
       </div>
<div class="excerpt">

                        <!--Brief-->
                        <div class="brief">
                            <a class="name" href="verify.user.php?search_user='.$row['user_session'].'">'.$row['name'].'</a><div class="date">'.$row['post_time'].'</div>
                        </div>

                        <!--Added text-->
                        <div class="added-text animated fadeIn">'.$row['comment'].'</div>

</div>
</div>
</div>
</div><hr>
</section>
</div>
</div>
';
}
}


if (isset($_POST['comment-text'])) {
  $text = htmlspecialchars(mysqli_real_escape_string($link, $_POST['comment-text']));

  $session = $_SESSION['email'];
  $sql= "SELECT * FROM registration WHERE email = '$session'";
  $result = mysqli_query($link, $sql);
  while (@$row = mysqli_fetch_array($result)) {
    $name = $row['first_name'];

    $sql= "SELECT * FROM profile WHERE session = '$session'";
    $result = mysqli_query($link, $sql);
    while (@$row = mysqli_fetch_array($result)) {
      $pic = $row['profile_pic'];

      date_default_timezone_set("GMT");
      $zone = date("l y/m/d - h:i a");

      $query = "INSERT INTO read_comments(id, target, user_session, comment, profile_pic, name, post_time) VALUES ('', '".$comment."', '".$session."', '".$text."', '".$pic."', '".$name."', '$zone')";
    if ($query_run = mysqli_query($link, $query)) {
      header('Location: comment.php');
  }else {
    echo "Post Fail. Error occured";
  }
}
}
}
if (!loggedin()) {
include 'footer.php';
}else {
  include 'loggedin.footer.php';
}
 ?>
