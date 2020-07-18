<?php
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
$username   = "smartieangie";
$apiKey     = "22b65c1a15137d5eff3f98298c5b59d03749e1663e7a7ac30a67259bd72932e1";

// Initialize the SDK
$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms        = $AT->sms();

// Set the numbers you want to send to in international format
$recipients = "+254702755729";

// Set your message
$message    = "Mpesa Payment recieved. Your parking spot has been reserved for you";

// Set your shortCode or senderId
$from       = "Parking";

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        'from'    => $from
    ]);

    print_r($result);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>