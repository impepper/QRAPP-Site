<?php
date_default_timezone_set('America/Chicago');	// Update to your own timezone.
$sandbox = TRUE;	// TRUE/FALSE for test mode or not.
$domain = $sandbox ? 'http://sandbox.domain.com/' : 'http://www.domain.com/';

if($sandbox)
{
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
}

$api_version = '85.0';
$application_id = $sandbox ? 'APP-80W284485P519543T' : 'LIVE_APP_ID';	// Only required for Adaptive Payments.  You get your Live ID when your application is approved by PayPal.
$developer_account_email = 'DEVELOPER_EMAIL_ADDRESS';			// This is the email you use to sign in to http://developer.paypal.com.  Only required for Adaptive Payments.
$api_username = $sandbox ? 'SANDBOX_API_USERNAME' : 'LIVE_API_USERNAME';
$api_password = $sandbox ? 'SANDBOX_API_PASSWORD' : 'LIVE_API_PASSWORD';
$api_signature = $sandbox ? 'SANDBOX_API_SIGNATURE' : 'LIVE_API_SIGNATURE';
$api_subject = '';	// If making calls on behalf a third party, their PayPal email address or account ID goes here.

$device_id = '';
$device_ip_address = $_SERVER['REMOTE_ADDR'];
?>