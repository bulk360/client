# Bulk360 SMS Client
PHP Client for send SMS using bulk360's API

The latest version V2.x implements OAuth2.0 Client Credentials.

In previous version, user credentials from our portal is required for each API triggered, this posts security threat by exposing account details in URL. And it shares the same credentials from API access and Web Portal access, this way, if user trigger forget password and updated their password, API will fail immediately. 


Installation\
composer require bulk360/client