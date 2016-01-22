<?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = 'Smartcafe Contact Form';
        $to = 'info@smartcafe.it';
        $subject = 'Message from Contact From ';

        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
	//mail ($to, $subject, $body, $from);
?>
