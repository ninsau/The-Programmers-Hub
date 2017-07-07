<?php
include ('connect.php');
    	header('Content-type: application/json');
    	$status = array(
    		'type'=>'success',
    		'message'=>'An email has been sent to you to enable you reset your password. Visit your inbox and follow the link to reset your password.'
    	);

        $email      = @trim(stripslashes($_POST['email']));
        $subject    = 'Reset Email';

        $ran_number = rand ();
        $sql = "CREATE TABLE reset ( `id` INT(11) NOT NULL AUTO_INCREMENT , `email` VARCHAR(40) NOT NULL , `randnum` INT NOT NULL , PRIMARY KEY (`id`))";
        $run = mysqli_query($link, $sql);
        $query = "INSERT INTO reset(id, email, randnum) VALUES ('', '".$email."', '".$ran_number."')";
        $query_run = mysqli_query($link, $query);

        $message    = 'Your id to reset your password is '.$ran_number.'. Click <a href="http://theprogrammershub.net/reset.password.php"> here </a> to change your password';

        $email_from = 'The Programmer\'s Hub - Password Support';
        $email_to = $email;

        $body = 'Email: ' . $email_from . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

        $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

        echo json_encode($status);
        die;
 ?>
