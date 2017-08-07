<?php 	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Thank you for contacting us. We will get back to you as early as possible '
	);

    $name       = @trim(stripslashes($_POST['name']));
    $email      = @trim(stripslashes($_POST['email']));
    $subject    = @trim(stripslashes($_POST['subject']));
    $message    = @trim(stripslashes($_POST['message']));

    $email_from = $email;
    $email_to = 'cassidyblay@gmail.com';

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die; ?>
