<?php
# Try running this locally.
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;


  $to_email = "info@smartcafe.it";
  $email = $_REQUEST['email'];
  $subject = "E-mail inviato utilizzando il modulo di contatto";

  $message = "Nominativo: "+$_REQUEST['name']+"\n"+$_REQUEST['message'];

function is_valid_email($email) {
  return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
}
if (!is_valid_email($email)) {
  exit;
}else{
	# Instantiate the client.
	$mgClient = new Mailgun('key-03bd9b3fe55bc00a3d7438d6efbf6eae');
	$domain = "mg.smartcafe.it";

	# Make the call to the client.
	$result = $mgClient->sendMessage("$domain",
	  array('from'    => $email,
	        'to'      => 'Smartcafe <'+$to_email+'>',
	        'subject' => $subject,
	        'text'    => $message));
}