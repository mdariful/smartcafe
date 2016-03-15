<?php
# Try running this locally.
# Include the Autoloader (see "Libraries" for install instructions)
require './vendor/autoload.php';
use Mailgun\Mailgun;

	# Instantiate the client.
	$to_email = "md.ariful@email.com";
  	$email = $_REQUEST['email'];
  	$subject = "E-mail inviato utilizzando il modulo di contatto";
  	$message = $_REQUEST['message'];
	
	$mgClient = new Mailgun('key-03bd9b3fe55bc00a3d7438d6efbf6eae');
	$domain = "sandbox3ac41b71f55843e49b3d2a9c06d14775.mailgun.org";

	# Make the call to the client.
	$result = $mgClient->sendMessage("$domain",
	  array('from'    => $email,
	        'to'      => $to_email,
	        'subject' => $subject,
	        'text'    => $message));
?>