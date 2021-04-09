<?php
use bulk360\client;
require_once "./vendor/autoload.php";

// Please whitelist your IP and enable API in sms.360.my before you call this 

$smsClient = new client('mxkazYeJ0P', 'WnPXG7TnDzmzlXEYMSvzMkB3RwzqAbt9MKh91rPb');
$response = $smsClient->send([
				'from'	=> '68068',
				'to'	=> '60123240066',
				'text'	=> 'Hi from Package 2.0'
			]);
print_r($response);
echo "\n";

$json_response = json_decode($response);
print_r($json_response);

$arr_response = json_decode($response, true);
print_r($arr_response);

