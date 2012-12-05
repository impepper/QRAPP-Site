<?php
/*
UserCake Version: 2.0.1
http://usercake.com
*/

/*
%m1% - Dymamic markers which are replaced at run time by the relevant index.
*/

$lang = array();

//Account
$lang = array_merge($lang,array(
	"ACCOUNT_SPECIFY_USERNAME" 		=> "Please enter your username",
	"ACCOUNT_SPECIFY_PASSWORD" 		=> "Please enter your password",
	"ACCOUNT_SPECIFY_EMAIL"			=> "Please enter your email address",
	"ACCOUNT_INVALID_EMAIL"			=> "Invalid email address",
	"ACCOUNT_USER_OR_EMAIL_INVALID"		=> "Username or email address is invalid",
	"ACCOUNT_USER_OR_PASS_INVALID"		=> "Username or password is invalid",
	"ACCOUNT_ALREADY_ACTIVE"		=> "Your account is already activated",
	"ACCOUNT_INACTIVE"			=> "Your account is in-active. Check your emails / spam folder for account activation instructions",
	"ACCOUNT_USER_CHAR_LIMIT"		=> "Your username must be between %m1% and %m2% characters in length",
	"ACCOUNT_DISPLAY_CHAR_LIMIT"		=> "Your display name must be between %m1% and %m2% characters in length",
	"ACCOUNT_PASS_CHAR_LIMIT"		=> "Your password must be between %m1% and %m2% characters in length",
	"ACCOUNT_TITLE_CHAR_LIMIT"		=> "Titles must be between %m1% and %m2% characters in length",
	"ACCOUNT_PASS_MISMATCH"			=> "Your password and confirmation password must match",
	"ACCOUNT_DISPLAY_INVALID_CHARACTERS"	=> "Display name can only include alpha-numeric characters",
	"ACCOUNT_USERNAME_IN_USE"		=> "Username %m1% is already in use",
	"ACCOUNT_DISPLAYNAME_IN_USE"		=> "Display name %m1% is already in use",
	"ACCOUNT_EMAIL_IN_USE"			=> "Email %m1% is already in use",
	"ACCOUNT_LINK_ALREADY_SENT"		=> "An activation email has already been sent to this email address in the last %m1% hour(s)",
	"ACCOUNT_NEW_ACTIVATION_SENT"		=> "We have emailed you a new activation link, please check your email",
	"ACCOUNT_SPECIFY_NEW_PASSWORD"		=> "Please enter your new password",	
	"ACCOUNT_SPECIFY_CONFIRM_PASSWORD"	=> "Please confirm your new password",
	"ACCOUNT_NEW_PASSWORD_LENGTH"		=> "New password must be between %m1% and %m2% characters in length",	
	"ACCOUNT_PASSWORD_INVALID"		=> "Current password doesn't match the one we have on record",	
	"ACCOUNT_DETAILS_UPDATED"		=> "Account details updated",
	"ACCOUNT_ACTIVATION_MESSAGE"		=> "You will need to activate your account before you can login. Please follow the link below to activate your account. \n\n
	%m1%activate-account.php?token=%m2%",							
	"ACCOUNT_ACTIVATION_COMPLETE"		=> "You have successfully activated your account. You can now login <a href=\"usr_login.php\">here</a>.",
	"ACCOUNT_REGISTRATION_COMPLETE_TYPE1"	=> "You have successfully registered. You can now login <a href=\"usr_login.php\">here</a>.",
	"ACCOUNT_REGISTRATION_COMPLETE_TYPE2"	=> "You have successfully registered. You will soon receive an activation email. 
	You must activate your account before logging in.",
	"ACCOUNT_PASSWORD_NOTHING_TO_UPDATE"	=> "You cannot update with the same password",
	"ACCOUNT_PASSWORD_UPDATED"		=> "Account password updated",
	"ACCOUNT_EMAIL_UPDATED"			=> "Account email updated",
	"ACCOUNT_TOKEN_NOT_FOUND"		=> "Token does not exist / Account is already activated",
	"ACCOUNT_USER_INVALID_CHARACTERS"	=> "Username can only include alpha-numeric characters",
	"ACCOUNT_DELETIONS_SUCCESSFUL"		=> "You have successfully deleted %m1% users",
	"ACCOUNT_MANUALLY_ACTIVATED"		=> "%m1%'s account has been manually activated",
	"ACCOUNT_DISPLAYNAME_UPDATED"		=> "Displayname changed to %m1%",
	"ACCOUNT_TITLE_UPDATED"			=> "%m1%'s title changed to %m2%",
	"ACCOUNT_PERMISSION_ADDED"		=> "Added access to %m1% permission levels",
	"ACCOUNT_PERMISSION_REMOVED"		=> "Removed access from %m1% permission levels",
	"ACCOUNT_FIRST_LAST_NAME_UPDATED"		=> "Account First/Last name updated",
	));

//Configuration
$lang = array_merge($lang,array(
	"CONFIG_NAME_CHAR_LIMIT"		=> "Site name must be between %m1% and %m2% characters in length",
	"CONFIG_URL_CHAR_LIMIT"			=> "Site name must be between %m1% and %m2% characters in length",
	"CONFIG_EMAIL_CHAR_LIMIT"		=> "Site name must be between %m1% and %m2% characters in length",
	"CONFIG_ACTIVATION_TRUE_FALSE"		=> "Email activation must be either `true` or `false`",
	"CONFIG_ACTIVATION_RESEND_RANGE"	=> "Activation Threshold must be between %m1% and %m2% hours",
	"CONFIG_LANGUAGE_CHAR_LIMIT"		=> "Language path must be between %m1% and %m2% characters in length",
	"CONFIG_LANGUAGE_INVALID"		=> "There is no file for the language key `%m1%`",
	"CONFIG_TEMPLATE_CHAR_LIMIT"		=> "Template path must be between %m1% and %m2% characters in length",
	"CONFIG_TEMPLATE_INVALID"		=> "There is no file for the template key `%m1%`",
	"CONFIG_EMAIL_INVALID"			=> "The email you have entered is not valid",
	"CONFIG_INVALID_URL_END"		=> "Please include the ending / in your site's URL",
	"CONFIG_UPDATE_SUCCESSFUL"		=> "Your site's configuration has been updated. You may need to load a new page for all the settings to take effect",
	));

//Forgot Password
$lang = array_merge($lang,array(
	"FORGOTPASS_INVALID_TOKEN"		=> "Your activation token is not valid",
	"FORGOTPASS_NEW_PASS_EMAIL"		=> "We have emailed you a new password",
	"FORGOTPASS_REQUEST_CANNED"		=> "Lost password request cancelled",
	"FORGOTPASS_REQUEST_EXISTS"		=> "There is already a outstanding lost password request on this account",
	"FORGOTPASS_REQUEST_SUCCESS"		=> "We have emailed you instructions on how to regain access to your account",
	));

//Mail
$lang = array_merge($lang,array(
	"MAIL_ERROR"				=> "Fatal error attempting mail, contact your server administrator",
	"MAIL_TEMPLATE_BUILD_ERROR"		=> "Error building email template",
	"MAIL_TEMPLATE_DIRECTORY_ERROR"		=> "Unable to open mail-templates directory. Perhaps try setting the mail directory to %m1%",
	"MAIL_TEMPLATE_FILE_EMPTY"		=> "Template file is empty... nothing to send",
	));

//Miscellaneous
$lang = array_merge($lang,array(
	"CAPTCHA_FAIL"				=> "Failed security question",
	"CONFIRM"				=> "Confirm",
	"DENY"					=> "Deny",
	"SUCCESS"				=> "Success",
	"ERROR"					=> "Error",
	"NOTHING_TO_UPDATE"			=> "Nothing to update",
	"SQL_ERROR"				=> "Fatal SQL error",
	"FEATURE_DISABLED"			=> "This feature is currently disabled",
	"PAGE_PRIVATE_TOGGLED"			=> "This page is now %m1%",
	"PAGE_ACCESS_REMOVED"			=> "Page access removed for %m1% permission level(s)",
	"PAGE_ACCESS_ADDED"			=> "Page access added for %m1% permission level(s)",
	));

//Permissions
$lang = array_merge($lang,array(
	"PERMISSION_CHAR_LIMIT"			=> "Permission names must be between %m1% and %m2% characters in length",
	"PERMISSION_NAME_IN_USE"		=> "Permission name %m1% is already in use",
	"PERMISSION_DELETIONS_SUCCESSFUL"	=> "Successfully deleted %m1% permission level(s)",
	"PERMISSION_CREATION_SUCCESSFUL"	=> "Successfully created the permission level `%m1%`",
	"PERMISSION_NAME_UPDATE"		=> "Permission level name changed to `%m1%`",
	"PERMISSION_REMOVE_PAGES"		=> "Successfully removed access to %m1% page(s)",
	"PERMISSION_ADD_PAGES"			=> "Successfully added access to %m1% page(s)",
	"PERMISSION_REMOVE_USERS"		=> "Successfully removed %m1% user(s)",
	"PERMISSION_ADD_USERS"			=> "Successfully added %m1% user(s)",
	));

//APPs
$lang = array_merge($lang,array(
	"APP_CREATION_COMPLETE_TYPE1"	=> "You have successfully created your applicatuin. You can now login <a href=\"app_admin.php\">here</a>.",
	"APP_TITLE_IN_USE"		=> "Application Title %m1% is already in use",
	"APP_TITLE_CHAR_LIMIT"		=> "Title must be between %m1% and %m2% characters in length",
	"APP_DESCRIPTION_CHAR_LIMIT"		=> "Description must be between %m1% and %m2% characters in length",
	"APP_TITLE" => "App Title",
	"APP_DESC" => "App Description",
	"APP_CAPTCHA" => "Security Code",
	"APP_CAPTCHA_ENTER" => "Enter Security Code",
	"APP_PASSWORD" => "Password",
	"APP_CREATE" => "Create App",
	"APP_MANAGER_TITLE" => "My Mobile Contents",
	));

//Account Features
$lang = array_merge($lang,array(
	"PAGE_FEATURE_BOX_HEADER_1"	=> "Easy to Build",
	"PAGE_FEATURE_BOX_CONTENT_1" => "No need llearning programming. Fill necessary datas and your app is done!",
	"PAGE_FEATURE_COMMENT_1"		=> "",
	"PAGE_FEATURE_BOX_HEADER_2"	=> "Modulized",
	"PAGE_FEATURE_BOX_CONTENT_2" => "We put most common used features as <a href=\"\">Bricks</a>. Building your apps is as easy as playing bricks!",
	"PAGE_FEATURE_COMMENT_2"		=> "",
	"PAGE_FEATURE_BOX_HEADER_3"	=> "Realtime",
	"PAGE_FEATURE_BOX_CONTENT_3" => "We provide a easy-to-use content management interface. Once your content is changed, yuor app will update right on time!",
	"PAGE_FEATURE_COMMENT_3"		=> "",
	"PAGE_FEATURE_BOX_HEADER_4"	=> "Cross-Platform",
	"PAGE_FEATURE_BOX_CONTENT_4" => "Build once, present perfectly on iOS and Android  platiforms. What is more exciting thamn this!",
	"PAGE_FEATURE_COMMENT_4"		=> "",
	"PAGE_FEATURE_BOX_HEADER_5"	=> "",
	"PAGE_FEATURE_BOX_CONTENT_5" => "",
	"PAGE_FEATURE_COMMENT_5"		=> "",	
	));

//Site Links
$lang = array_merge($lang,array(
	"SITE_LINKS_INTRO"	=> "What is mCMS",
	"SITE_LINKS_CUSTOMER" => "Who Needs mCMS",
	"SITE_LINKS_FEATUREMATRIX"		=> "Feature Matrix",
	"SITE_LINKS_LATESTNEWS"		=> "Latest News",
	"SITE_LINKS_PLANS"		=> "Plans",
	"SITE_LINKS_LOGIN"		=> "Login",
	"SITE_LINKS_MODULES"		=> "Feature Bricks",
	"SITE_LINKS_TUTORIALS"		=> "Tutorials",
	"SITE_LINKS_REGISTER"		=> "Register",
	"SITE_LINKS_USER_APPS"		=> "User Apps",
	"SITE_LINKS_USER_SETTING"		=> "User Settings",
	"SITE_LINKS_LOGOUT"		=> "Logout",
	));

//USERS Links
$lang = array_merge($lang,array(
	"USER_USERNAME"	=> "Username",
	"USER_PASSWORD" => "Password",
	"USER_TYPE_BASIC" => "Intro",
	"USER_TYPE_BASIC_DESC"	=> "<p><ul><li>Use part of our feature bricks</li><li>Build your own contents</li><li>sharing your content to friends via QR-Code</li></ul></p>",
	"USER_TYPE_BASIC_FOOTNOTE" => "*Must use our mCMS App to view these contents (iOS/Android version included)",
	"USER_TYPE_MODERATE" => "Moderate",
	"USER_TYPE_MODERATE_DESC"	=> "<p><ul><li>Use All of our feature bricks without annoying Ads</li><li>Build your own contents</li><li>sharing your content to friends via QR-Code</li></ul></p>",
	"USER_TYPE_MODERATE_FOOTNOTE" => "*Must use our mCMS App to view these contents (iOS/Android version included)",
	"USER_TYPE_ADVANCED" => "Advanced",
	"USER_TYPE_ADVANCED_DESC"	=> "<p><ul><li>Build your own Apps, including your own brands.</li><li>Use part of our feature bricks</li></ul></p><br /><br /><center><h3><a href='mailto:chihong.lin@gmail.com'>Contact Us</a></h3></center><br />",
	"USER_TYPE_ADVANCED_FOOTNOTE" => "<p>*1:You may still have to pay extra annual fee for your developer account by your app store suppliers</p>
          													<p>*2:Your app and content still have to go through all necessary procedures before announcing procedures. It is not qurenteed for verifying your app successfully.</p>",	
		));

//Page Contents
$lang = array_merge($lang,array(
	"PAGE_CONTENT_INTRO"	=> "<p>mCMS is an easy-to-build, cross-platform mobile content management system.</p>
														<p>mCMS provides users a modulized building environment to build their mobile content easily. We use cloud technologies along with intuitive user interfaces to drive our customer build their app content rapidly and update them in realtime.</p>
														<p>mCMS is now in beta testing. Please Contact us if your are interested.</p>",
	"PAGE_CONTENT_LATESTNEWS" => "<p>mCMS QR Reader, a very nice QR Code Reader, is published in ITMonth Taipei 2012. It is the first QR Software supports mCMS (2012.12.01)</p><p>mCMS is now in beta testing. Please Contact us if your are interested.</p>",
	"PAGE_CONTENT_CUSTOMER" => "<p>mCMS is an easy-to-build, cross-platform mobile content management system. It is built specificly for users :</p>
								      			<blockquote>
														<p>1. Content Holder who have no mobile development knowledges,</p>
														<p>2. Creative workers like writers and illustrators,</p>
														<p>3. Groups/Companies who need to povide personal content management platform for their customers.</p>
													</blockquote>
													<p>mCMS is now in beta testing. Please Contact us if your are interested.</p>",
		));

//USERS Settings
$lang = array_merge($lang,array(
	"USER_SETTING_DISPLAYNAME" => "Display Name",
	"USER_SETTING_USERNAME" => "Username",
	"USER_SETTING_FIRSTNAME" => "First Name",
	"USER_SETTING_LASTNAME" => "Last Name",
	"USER_SETTING_PASSWORD" => "Password",
	"USER_SETTING_EMAIL" => "Email",
	"USER_SETTING_PASS_NEW" => "New Password",
	"USER_SETTING_PASS_CONFIRM" => "Confirm Password",
	"USER_SETTING_UPDATE" => "UPDATE",
	));

//Subscriptions
$lang = array_merge($lang,array(
	"SUBSCRIBE_UNSUBSCRIPTION" => "Unssubscription",
	"SUBSCRIBE_SUBSCRIPTION" => "Remove Your Ads",
	"SUBSCRIBE_CANCEL_TITLE" => "Cancel Account Subscription",
	"SUBSCRIBE_CANCEL_DESC" => "Cancelling your account subscription will cause your Apps presented with ADs.<br /> Are you sure you want to do this?",
	"SUBSCRIBE_CANCEL_BTN_YES" => "Yes, Unscbscribe My Account !",
	"SUBSCRIBE_CANCEL_BTN_NO" => "No, I want to keep my subscription",
	"SUBSCRIBE_CANCELED" => "Your Account Subscription Has Been Cancelled",
	"SUBSCRIBE_MCMS_MONTH" => "Moderate Account Subscription: <br />USD$5.99 per month.",
	"SUBSCRIBE_MCMS_YEAR" => "Moderate Account Subscription: <br />USD$59.99 per year.",
	"SUBSCRIBE_USING_PAYPAL" => "We are using Paypal to process your subscription.",
	"SUBSCRIBE_" => "",
	"SUBSCRIBE_" => "",
	"SUBSCRIBE_" => "",
	));


?>