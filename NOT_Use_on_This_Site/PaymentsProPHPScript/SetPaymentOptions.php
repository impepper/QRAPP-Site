<?php
// Include required library files.
require_once('includes/config.php');
require_once('includes/paypal.class.php');

// Create PayPal object.
$PayPalConfig = array('Sandbox' => $sandbox, 'DeveloperAccountEmail' => $developer_account_email, 'ApplicationID' => $application_id, 'DeviceID' => $device_id, 
						'IPAddress' => $device_ip_address, 'APIUsername' => $api_username, 'APIPassword' => $api_password, 'APISignature' => $api_signature, 'APISubject' => $api_subject);
$PayPal = new PayPal_Adaptive($PayPalConfig);

// Prepare request arrays
$SPOFields = array(
				'PayKey' => '', 							// Required.  The pay key that identifies the payment for which you want to set payment options.  
				'ShippingAddressID' => '' 					// Sender's shipping address ID.
				);
				
$DisplayOptions = array(
				'EmailHeaderImageURL' => '', 			// The URL of the image that displays in the header of customer emails.  1,024 char max.  Image dimensions:  43 x 240
				'EmailMarketingImageURL' => '', 		// The URL of the image that displays in the customer emails.  1,024 char max.  Image dimensions:  80 x 530
				'HeaderImageURL' => '', 				// The URL of the image that displays in the header of a payment page.  1,024 char max.  Image dimensions:  750 x 90
				'BusinessName' => ''					// The business name to display.  128 char max.
				);
						
$InstitutionCustomer = array(
				'CountryCode' => '', 				// Required.  2 char code of the home country of the end user.
				'DisplayName' => '', 				// Required.  The full name of the consumer as known by the institution.  200 char max.
				'InstitutionCustomerEmail' => '', 	// The email address of the consumer.  127 char max.
				'FirstName' => '', 					// Required.  The first name of the consumer.  64 char max.
				'LastName' => '', 					// Required.  The last name of the consumer.  64 char max.
				'InstitutionCustomerID' => '', 		// Required.  The unique ID assigned to the consumer by the institution.  64 char max.
				'InstitutionID' => ''				// Required.  The unique ID assiend to the institution.  64 char max.
				);
						
$SenderOptions = array(
				'RequireShippingAddressSelection' => '', // Boolean.  If true, require the sender to select a shipping address during the embedded payment flow.  Default is false.
				'ReferrerCode' => ''					 // A code that identifies the partner associated with this transaction.  Max length:  32 char
				);
					
$ReceiverOptions = array(
				'Description' => '', 					// A description you want to associate with the payment.  1000 char max.
				'CustomID' => '' 						// An external reference number you want to associate with the payment.  1000 char max.
				);
					
$InvoiceData = array(
				'TotalTax' => '', 							// Total tax associated with the payment.
				'TotalShipping' => '' 						// Total shipping associated with the payment.
				);
				
$InvoiceItems = array();
$InvoiceItem = array(
				'Name' => '', 								// Name of item.
				'Identifier' => '', 						// External reference to item or item ID.
				'Price' => '', 								// Total of line item.
				'ItemPrice' => '',							// Price of an individual item.
				'ItemCount' => ''							// Item QTY
				);
array_push($InvoiceItems,$InvoiceItem);

$ReceiverIdentifier = array(
				'ReceiverIdentifierEmail' => '', 	// Receiver's email address.  127 char max.
				'PhoneCountryCode' => '', 			// Receiver's telephone number country code.
				'PhoneNumber' => '', 				// Receiver's telephone number.  
				'PhoneExtension' => ''				// Receiver's telephone extension.
				);

$PayPalRequestData = array(
				'SPOFields' => $SPOFields, 
				'DisplayOptions' => $DisplayOptions, 
				'InstitutionCustomer' => $InstitutionCustomer, 
				'SenderOptions' => $SenderOptions, 
				'ReceiverOptions' => $ReceiverOptions, 
				'InvoiceData' => $InvoiceData, 
				'InvoiceItems' => $InvoiceItems, 
				'ReceiverIdentifier' => $ReceiverIdentifier
				);

// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->SetPaymentOptions($PayPalRequestData);

// Write the contents of the response array to the screen for demo purposes.
echo '<pre />';
print_r($PayPalResult);
?>