<?php
include 'core.inc.php';
include ('connect.php');
$query = "SELECT * FROM registration ORDER BY reg_id DESC ";
$query_run = mysqli_query($link, $query);
while (@$row = mysqli_fetch_array($query_run)) {
echo $row['reg_id'].':'.$row['email'].' : '.$row['first_name'].' : '.$row['last_name'].'<br>';
}?>
<?php
 echo $pre_loc;
 ?>
