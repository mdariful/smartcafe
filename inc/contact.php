<?php
  //Email information
  $to_email = "info@smartcafe.it";
  $email = $_REQUEST['email'];
  $subject = "E-mail inviato utilizzando il modulo di contatto";
  $message = $_REQUEST['message'];
 
function is_valid_email($email) {
  return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
}

if (!is_valid_email($email)) {
  exit;
}
  //send email
  mail($to_email, "$subject", $message, "From:" . $email);
?>
