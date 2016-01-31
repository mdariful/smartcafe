<?php
//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
  //Email information
  $to_email = "info@smartcafe.it";
  $email = $_REQUEST['email'];
  $subject = "E-mail inviato utilizzando il modulo di contatto";
  $message = $_REQUEST['message'];
  
  //send email
  mail($to_email, "$subject", $message, "From:" . $email);}
?>
