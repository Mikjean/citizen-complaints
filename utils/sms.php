<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;

function sendSMS($to, $message) {
    // Replace with your actual Twilio credentials
    $sid = getenv('TWILIO_ACCOUNT_SID');
    $token = getenv('TWILIO_AUTH_TOKEN');
    $twilio = new Client($sid, $token);
    $twilioNumber = '+18135353313';

    try {
        $client = new Client($sid, $token);
        $client->messages->create($to, [
            'from' => $twilioNumber,
            'body' => $message
        ]);
    } catch (Exception $e) {
        error_log("SMS failed to send: " . $e->getMessage());
    }
}
