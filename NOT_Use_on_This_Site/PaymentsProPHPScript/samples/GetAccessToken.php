<?php
// Include required library files.
require_once('../includes/config.php');
require_once('../includes/paypal.class.php');

// Create PayPal object.
$PayPalConfig = array('Sandbox' => $sandbox, 'DeveloperAccountEmail' => $developer_account_email, 'ApplicationID' => $application_id, 'DeviceID' => '', 
						'IPAddress' => $_SERVER['REMOTE_ADDR'], 'APIUsername' => $api_username, 'APIPassword' => $api_password, 'APISignature' => $api_signature, 'APISubject' => $api_subject);
$PayPal = new PayPal_Adaptive($PayPalConfig);

// Prepare request arrays
$GetAccessTokenFields = array(
							'Token' => 'AAAAAAAVVExe6AWkB5ZG', 					// Required.  The request token from the response to RequestPermissions
							'Verifier' => 'oL6Qp.fwlaI-Izt-MwFbRQ' 				// Required.  The verification code returned in the redirect from PayPal to the return URL.
							);

$PayPalRequestData = array('GetAccessTokenFields' => $GetAccessTokenFields);

// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->GetAccessToken($PayPalRequestData);

// Write the contents of the response array to the screen for demo purposes.
echo '<pre />';
print_r($PayPalResult);
?>