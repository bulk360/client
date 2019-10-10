<?php
use bulk360\client;
require_once "./src/client.php";

// Please whitelist your IP and enable API in sms.360.my before you call this 

$smsClient = new client('YOUR_EMAIL_ADD', 'YOUR_PASSWOR');
$response = $smsClient->send([
				'to'	=> '60123240066',
				'text'	=> 'Hi from Package 1.3'
			]);
$responseDetails = $smsClient->handleResponse($response);
print_r($responseDetails);

$status = $smsClient->status;
$refID = $smsClient->refID;

