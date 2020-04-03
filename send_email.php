<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
//require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
 require("./sendgrid/sendgrid-php.php");
// If not using Composer, uncomment the above line
$email = new \SendGrid\Mail\Mail();
$email->setFrom("test@example.com", "Lista RSS");
$email->setSubject("Your requested feed");
$email->addTo($_GET['email'], "You");
$email->addContent(
    "text/plain", "test".$_GET['debug']
);
$email->addContent(
    "text/html", "".$_GET['debug']
);
$sendgridkey = "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";

$sendgrid = new \SendGrid($sendgridkey);
try {
    $response = $sendgrid->send($email);
   
	echo "Sent";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>




