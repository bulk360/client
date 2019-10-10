<?php


use bulk360\client;
require_once "./src/client.php";


$smsClient = new client('mark@360.my', '2018360interactivehuatah!');
$response = $smsClient->send([
				'to'	=> '60123240066',
				'text'	=> 'Hi from Package 1.3'
			]);
echo $response;