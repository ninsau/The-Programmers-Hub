<?php
ob_start();
//starting session
session_start();
//name of currently open file
 $current_file = $_SERVER['SCRIPT_NAME'];
 //function to create session after successful login
function loggedIn () {
  if (isset($_SESSION['email'])&&!empty($_SESSION['email'])) {
    return true;
  }else {
    return false;
  }
}

//error handler function
/*function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
}

//set error handler
set_error_handler("customError");

//trigger error
echo($test);*/
 ?>
