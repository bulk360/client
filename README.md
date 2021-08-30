# Bulk360 SMS Client
PHP Client for send SMS using bulk360's API

The latest version V2.x implements OAuth2.0 Client Credentials.

In previous version, user credentials from our portal is required for each API triggered, this posts security threat by exposing account details in URL. And it shares the same credentials from API access and Web Portal access, this way, if user trigger forget password and updated their password, API will fail immediately. 


Installation\
composer require bulk360/client


To send sms\
> use bulk360\client;
> require_once "./vendor/autoload.php";
>
> // Please whitelist your IP and enable API in sms.360.my before you call this 
>
> $smsClient = new client('YOUR_APP_KEY', 'YOUR_APP_SECRET');
> $response = $smsClient->send([
>				'from'	=> '68068',
>				'to'	=> '60123240066',
>				'text'	=> 'Hi from Package 2.0'
>			]);


To check account balance\
> use bulk360\client;
> require_once "./vendor/autoload.php";
>
> // Please whitelist your IP and enable API in sms.360.my before you call this 
>
> $smsClient = new client('YOUR_APP_KEY', 'YOUR_APP_SECRET');
> $response = $smsClient->balance([
>				'country'	=> '65'
>			]);