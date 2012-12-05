<?php
// Include required library files.
require_once('../includes/config.php');
require_once('../includes/paypal.class.php');

// Create PayPal object.
$PayPalConfig = array('Sandbox' => $sandbox, 'DeveloperAccountEmail' => $developer_account_email, 'ApplicationID' => $application_id, 'DeviceID' => $device_id, 
						'IPAddress' => $device_ip_address, 'APIUsername' => $api_username, 'APIPassword' => $api_password, 'APISignature' => $api_signature, 'APISubject' => $api_subject);
$PayPal = new PayPal_Adaptive($PayPalConfig);

// Prepare request arrays
$SPOFields = array(
				'PayKey' => 'AP-45J67861NG334130J', 							// Required.  The pay key that identifies the payment for which you want to set payment options.  
				'ShippingAddressID' => '' 					// Sender's shipping address ID.
				);
				
$DisplayOptions = array(
				'EmailHeaderImageURL' => 'http://www.angelleye.com/images/email_header_image.jpg', 			// The URL of the image that displays in the header of customer emails.  1,024 char max.  Image dimensions:  43 x 240
				'EmailMarketingImageURL' => 'http://www.angelleye.com/images/email_marketing_image.jpg', 		// The URL of the image that displays in the customer emails.  1,024 char max.  Image dimensions:  80 x 530
				'HeaderImageURL' => 'http://www.angelleye.com/header_image.jpg', 				// The URL of the image that displays in the header of a payment page.  1,024 char max.  Image dimensions:  750 x 90
				'BusinessName' => 'Angell EYE'					// The business name to display.  128 char max.
				);
						
$InstitutionCustomer = array(
				'CountryCode' => 'US', 				// Required.  2 char code of the home country of the end user.
				'DisplayName' => 'Tester Testerson', 				// Required.  The full name of the consumer as known by the institution.  200 char max.
				'InstitutionCustomerEmail' => 'test@testerson.com', 	// The email address of the consumer.  127 char max.
				'FirstName' => 'Tester', 					// Required.  The first name of the consumer.  64 char max.
				'LastName' => 'Testerson', 					// Required.  The last name of the consumer.  64 char max.
				'InstitutionCustomerID' => '1234', 		// Required.  The unique ID assigned to the consumer by the institution.  64 char max.
				'InstitutionID' => '1234'				// Required.  The unique ID assiend to the institution.  64 char max.
				);
						
$SenderOptions = array(
				'RequireShippingAddressSelection' => 'true' // Boolean.  If true, require the sender to select a shipping address during the embedded payment flow.  Default is false.
				);
					
$ReceiverOptions = array(
				'Description' => 'Test Description', 					// A description you want to associate with the payment.  1000 char max.
				'CustomID' => '123456'						// An external reference number you want to associate with the payment.  1000 char max.
				);
					
$InvoiceData = array(
				'TotalTax' => '2.50', 							// Total tax associated with the payment.
				'TotalShipping' => '5.00' 						// Total shipping associated with the payment.
				);
				
$InvoiceItems = array();
$InvoiceItem = array(
				'Name' => 'Test Widget', 								// Name of item.
				'Identifier' => '123-ABC', 						// External reference to item or item ID.
				'Price' => '30.00', 								// Total of line item.
				'ItemPrice' => '10.00',							// Price of an individual item.
				'ItemCount' => '3'							// Item QTY
				);
array_push($InvoiceItems,$InvoiceItem);

$InvoiceItem = array(
				'Name' => 'Test Widget 2', 								// Name of item.
				'Identifier' => 'ZBF-3423', 						// External reference to item or item ID.
				'Price' => '50.00', 								// Total of line item.
				'ItemPrice' => '25.00',							// Price of an individual item.
				'ItemCount' => '2'							// Item QTY
				);
array_push($InvoiceItems,$InvoiceItem);

$ReceiverIdentifier = array(
				'ReceiverIdentifierEmail' => 'test@hey.com', 	// Receiver's email address.  127 char max.
				'PhoneCountryCode' => '1', 			// Receiver's telephone number country code.  
				'PhoneNumber' => '816-256-5555',				// Receiver's telephone number.
				'PhoneExtension' => '1234'				// Receiver's telephone extension.
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