<?php

namespace bulk360; 

class client {
	protected $username;
	protected $password;
	protected $url = 'https://sms.360.my/gw/bulk360/v1.3';

	public $refID;
	public $status;

	public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
		$this->url = $this->url . "?user=$this->username&pass=$this->password&type=$this->type&from=$this->from&servid=$this->servid";
	}

	public function send($message) {
		$opts = array(
			"ssl"	=> array(
		        "verify_peer"		=> 	false,
		        "verify_peer_name"	=> 	false,
		    ),
			'http'	=> array(
				'method'			=> 	"GET",
				'header'			=> 	"Accept-language: en\r\n" .
			            			 	"Cookie: foo=bar\r\n"
			)
        );
        $to = $message['to'];
        $text = $message['text'];
		$this->url = $this->url . "&to=".$to."&text=".rawurlencode($text);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$sentResult = curl_exec($ch);
		if ($sentResult == FALSE) {
			return 'Curl failed for sending sms to bulk360.. '.curl_error($ch);
		}
		curl_close($ch);

		return $sentResult;
	}

	public function handleResponse($response) {
		if (strstr($response, 'Curl failed')) {
			$this->status = 400; 
			return 'Error';
		}

		$responseDetails = explode(",", $response);
		if (count($responseDetails) == 3) {
			$this->status = $responseDetails[0];
			$this->refID = $responseDetails[2];
		}
		else 
			$this->status = $response;
		return $responseDetails;
	}

}