<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../'); // Point to root directory
$dotenv->load();

use Twilio\Rest\Client;

function sendSMS($to, $message) {
    // Replace with your actual Twilio credentials
    $sid = $_ENV['TWILIO_ACCOUNT_SID'];
    $token = $_ENV['TWILIO_AUTH_TOKEN'];

    if (!$sid || !$token) {
        throw new Exception("Twilio SID or Auth Token not set.");
    }
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
