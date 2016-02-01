<?php
  //Email information
 // $to_email = "info@smartcafe.it";
  //$email = $_REQUEST['email'];
  //$subject = "E-mail inviato utilizzando il modulo di contatto";
  //$message = $_REQUEST['message'];
 
//function is_valid_email($email) {
//  return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
//}

//if (!is_valid_email($email)) {
 // exit;
//}
  //send email
 // mail($to_email, "$subject", $message, "From:" . $email);
$to      = "info@smartcafe.it";
$subject = "Email inviato da smartcafe.it"
$body = $_REQUEST["message"];
$email = $_REQUEST["email"];

$dodgy_strings = array(
                "content-type:"
                ,"mime-version:"
                ,"multipart/mixed"
                ,"bcc:"
);

function is_valid_email($email) {
  return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
}

function contains_bad_str($str_to_test) {
  $bad_strings = array(
                "content-type:"
                ,"mime-version:"
                ,"multipart/mixed"
		,"Content-Transfer-Encoding:"
                ,"bcc:"
		,"cc:"
		,"to:"
  );
  
  foreach($bad_strings as $bad_string) {
    if(eregi($bad_string, strtolower($str_to_test))) {
      //echo "$bad_string found. Suspected injection attempt - mail not being sent.";
      exit;
    }
  }
}

function contains_newlines($str_to_test) {
   if(preg_match("/(%0A|%0D|\\n+|\\r+)/i", $str_to_test) != 0) {
     //echo "newline found in $str_to_test. Suspected injection attempt - mail not being sent.";
     exit;
   }
} 

if($_SERVER['REQUEST_METHOD'] != "POST"){
   //echo("Unauthorized attempt to access page.");
   exit;
}

if (!is_valid_email($email)) {
  //echo 'Invalid email submitted - mail not being sent.';
  exit;
}

contains_bad_str($email);
contains_bad_str($subject);
contains_bad_str($body);

contains_newlines($email);
contains_newlines($subject);

$headers = "From: $email";
mail($to, $subject, $body, $headers);
//echo "Thanks for submitting.";
?>
