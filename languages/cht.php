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
	"ACCOUNT_SPECIFY_USERNAME" 		=> "請輸入使用者名稱",
	"ACCOUNT_SPECIFY_PASSWORD" 		=> "請輸入密碼",
	"ACCOUNT_SPECIFY_EMAIL"			=> "請輸入電子郵件信箱",
	"ACCOUNT_INVALID_EMAIL"			=> "非有效電子郵件信箱",
	"ACCOUNT_USER_OR_EMAIL_INVALID"		=> "非有效之使用者名稱或電子郵件信箱",
	"ACCOUNT_USER_OR_PASS_INVALID"		=> "非有效之使用者名稱或密碼",
	"ACCOUNT_ALREADY_ACTIVE"		=> "你的使用者帳號已經啟用",
	"ACCOUNT_INACTIVE"			=> "你的使用者帳號已經暫停使用，請檢查你的郵件信箱以獲得帳戶啟用資訊",
	"ACCOUNT_USER_CHAR_LIMIT"		=> "你的使用者帳號文字長度必須介於 %m1% ～ %m2% 個字元",
	"ACCOUNT_DISPLAY_CHAR_LIMIT"		=> "你的顯示名稱文字長度必須介於 %m1% ～ %m2% 個字元",
	"ACCOUNT_PASS_CHAR_LIMIT"		=> "你的密碼文字長度必須介於 %m1% ～ %m2% 個字元",
	"ACCOUNT_TITLE_CHAR_LIMIT"		=> "Titles must be between %m1% and %m2% characters in length",
	"ACCOUNT_PASS_MISMATCH"			=> "你所輸入的密碼確認資料與你所輸入的密碼不符",
	"ACCOUNT_DISPLAY_INVALID_CHARACTERS"	=> "顯示名稱僅能使用英文以及數字字元",
	"ACCOUNT_USERNAME_IN_USE"		=> "使用者名稱 %m1% 已被使用",
	"ACCOUNT_DISPLAYNAME_IN_USE"		=> "顯示名稱 %m1% 已被使用",
	"ACCOUNT_EMAIL_IN_USE"			=> "電子郵件信箱 %m1% 已被使用",
	"ACCOUNT_LINK_ALREADY_SENT"		=> "帳戶啟動資訊已經於 %m1% 小時前郵寄至你的電子郵件信箱中",
	"ACCOUNT_NEW_ACTIVATION_SENT"		=> "我們已經重新郵寄一份帳戶啟動資訊至你的電子郵件信箱，請檢查你的郵件",
	"ACCOUNT_SPECIFY_NEW_PASSWORD"		=> "請輸入你的新密碼",	
	"ACCOUNT_SPECIFY_CONFIRM_PASSWORD"	=> "請確認你的新密碼",
	"ACCOUNT_NEW_PASSWORD_LENGTH"		=> "新的密碼文字長度必須介於 %m1% ～ %m2% 個字元",	
	"ACCOUNT_PASSWORD_INVALID"		=> "目前所使用的密碼與我們的資料庫不符",	
	"ACCOUNT_DETAILS_UPDATED"		=> "帳戶資訊已更新",
	"ACCOUNT_ACTIVATION_MESSAGE"		=> "在登入之前你必須先啟用你的帳號，你可以透過以下連結註冊啟用你的帳號 \n\n
	%m1%activate-account.php?token=%m2%",							
	"ACCOUNT_ACTIVATION_COMPLETE"		=> "你已順利啟動你的帳戶，你可以<a href=\"usr_login.php\">由此登入</a>",
	"ACCOUNT_REGISTRATION_COMPLETE_TYPE1"	=> "你已順利註冊並啟動你的帳戶，你可以<a href=\"usr_login.php\">由此登入</a>",
	"ACCOUNT_REGISTRATION_COMPLETE_TYPE2"	=> "你已順利註冊你的帳戶，你將會收到你的帳戶啟用信件，請依照郵件指示啟用你的帳號",
	"ACCOUNT_PASSWORD_NOTHING_TO_UPDATE"	=> "你無法更新相同的密碼資料",
	"ACCOUNT_PASSWORD_UPDATED"		=> "帳戶密碼已更新",
	"ACCOUNT_EMAIL_UPDATED"			=> "帳戶電子郵件已更新",
	"ACCOUNT_TOKEN_NOT_FOUND"		=> "Token does not exist / Account is already activated",
	"ACCOUNT_USER_INVALID_CHARACTERS"	=> "使用者名稱僅能使用英文以及數字字元",
	"ACCOUNT_DELETIONS_SUCCESSFUL"		=> "You have successfully deleted %m1% users",
	"ACCOUNT_MANUALLY_ACTIVATED"		=> "%m1%'s account has been manually activated",
	"ACCOUNT_DISPLAYNAME_UPDATED"		=> "顯示名稱已更改為 %m1%",
	"ACCOUNT_TITLE_UPDATED"			=> "%m1%'s title changed to %m2%",
	"ACCOUNT_PERMISSION_ADDED"		=> "Added access to %m1% permission levels",
	"ACCOUNT_PERMISSION_REMOVED"		=> "Removed access from %m1% permission levels",
	"ACCOUNT_FIRST_LAST_NAME_UPDATED"		=> "帳戶的姓名資料已更新",
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
	"APP_CREATION_COMPLETE_TYPE1"	=> "你已順利的創建一個新程式，你可以 <a href=\"app_admin.php\">由此進入管理系統</a>.",
	"APP_TITLE_IN_USE"		=> "程式名稱 %m1% 已被使用",
	"APP_TITLE_CHAR_LIMIT"		=> "程式名稱長度必須介於 %m1% 與 %m2% 個文字字元之間",
	"APP_DESCRIPTION_CHAR_LIMIT"		=> "程式描述長度必須介於 %m1% 與 %m2% 個文字字元之間",
	"APP_TITLE" => "程式名稱",
	"APP_DESC" => "內容描述",
	"APP_CAPTCHA" => "安全密碼",
	"APP_CAPTCHA_ENTER" => "請輸入安全密碼",
	"APP_PASSWORD" => "密碼",
	"APP_CREATE" => "建立程式",	
	"APP_MANAGER_TITLE" => "我的行動內容應用程式",
	));

//Account Features
$lang = array_merge($lang,array(
	"PAGE_FEATURE_BOX_HEADER_1"	=> "容易建置",
	"PAGE_FEATURE_BOX_CONTENT_1" => "不需學習程式設計，不需參與手機程式的審核過程（注１），只要依照表格提供程式所需要的訊息，你的程式即已完成！",
	"PAGE_FEATURE_COMMENT_1"		=> "",
	"PAGE_FEATURE_BOX_HEADER_2"	=> "模組化管理",
	"PAGE_FEATURE_BOX_CONTENT_2" => "我們將最常用的功能，變成一塊塊的積木，你需要什麼功能，就選擇合適的功能模組，不用撰寫一條程式碼！",
	"PAGE_FEATURE_COMMENT_2"		=> "",
	"PAGE_FEATURE_BOX_HEADER_3"	=> "即時性的內容更新",
	"PAGE_FEATURE_BOX_CONTENT_3" => "我們提供後台內容管理平台，你所新增的任何資料（包含程式架構的更新），都可以在最短的時間內，呈現在你的程式中，不用再等待新版本審核的時間，你的內容，我們馬上更新！",
	"PAGE_FEATURE_COMMENT_3"		=> "",
	"PAGE_FEATURE_BOX_HEADER_4"	=> "跨平台應用",
	"PAGE_FEATURE_BOX_CONTENT_4" => "一次建置，我們讓你的內容同時可以在iOS以及Android系統的手機及平板上完美呈現，還有什麼比這個還令人行動的！",
	"PAGE_FEATURE_COMMENT_4"		=> "",
	"PAGE_FEATURE_BOX_HEADER_5"	=> "",
	"PAGE_FEATURE_BOX_CONTENT_5" => "",
	"PAGE_FEATURE_COMMENT_5"		=> "",	
	));

//Site Links
$lang = array_merge($lang,array(
	"SITE_LINKS_INTRO"	=> "什麼是 mCMS",
	"SITE_LINKS_CUSTOMER" => "誰需要 mCMS",
	"SITE_LINKS_FEATUREMATRIX"		=> "Feature Matrix",
	"SITE_LINKS_LATESTNEWS"		=> "最新訊息",
	"SITE_LINKS_PLANS"		=> "plans",
	"SITE_LINKS_LOGIN"		=> "登入",
	"SITE_LINKS_MODULES"		=> "功能模組介紹",
	"SITE_LINKS_TUTORIALS"		=> "Tutorials",
	"SITE_LINKS_REGISTER"		=> "註冊",
	"SITE_LINKS_USER_APPS"		=> "應用程式",
	"SITE_LINKS_USER_SETTING"		=> "使用者設定",
	"SITE_LINKS_LOGOUT"		=> "登出",	
	));

//USERS Links
$lang = array_merge($lang,array(
	"USER_USERNAME"	=> "使用者名稱",
	"USER_PASSWORD" => "使用者密碼",
	"USER_TYPE_BASIC" => "基本",
	"USER_TYPE_BASIC_DESC"	=> "<p>可以使用部分的功能模組，並且透過後端平台建立你的內容並提供QRCode讓你可以將你的內容分享給你的朋友</p>",
	"USER_TYPE_BASIC_FOOTNOTE" => "*行動軟體平台採用本公司所發佈的mCMS App (iOS以及Android 版本)",
	"USER_TYPE_MODERATE" => "進階",
	"USER_TYPE_MODERATE_DESC"	=> "<p>可以使用所有模組且無數量的限制，並且沒有擾人的廣告</p>",
	"USER_TYPE_MODERATE_FOOTNOTE" => "*行動軟體平台採用本公司所發佈的mCMS App (iOS以及Android 版本)",
	"USER_TYPE_ADVANCED" => "專業",
	"USER_TYPE_ADVANCED_DESC"	=> "<p>建立你自己的Mobile App! 可以無限制使用包含Tier-1及Tier-2的所有模組並且以你自己的名義（注1）發佈應用軟體（注2）</p><br /><br /><center><h3><a href='mailto:chihong.lin@gmail.com'>與我們聯繫</a></h3></center><br />",
	"USER_TYPE_ADVANCED_FOOTNOTE" => "<p>*注1：根據行動軟體發佈平台規定，您仍須繳交建立程式開發者帳號時所需的相關年費</p>
          													<p>*注2：本服務僅協助您進行軟體上架程序，您的軟體及內容仍須通過相關的審核程序，本服務並不保證軟體發佈的結果成功與否</p>",	
	));

//Page Contents
$lang = array_merge($lang,array(
	"PAGE_CONTENT_INTRO"	=> "<p>mCMS 是一個易於建置、專注於行動裝置的內容管理系統。</p>
														<p>mCMS 提供一個模組化的建置環境，讓使用者可以輕易的規劃、組建自己所需要的功能，並利用最先進的雲端儲存技術，消弭使用者在建置行動軟體時所需面對的巨大隔閡，並透過參數化的版面設計以及簡單、直覺式的內容規劃，讓使用者能夠快速、即時的更新行動軟體內容。</p>
														<p>mCMS 目前已開始徵集自願者參與測試，有意者請與我們聯繫。</p>",
	"PAGE_CONTENT_LATESTNEWS" => "<p>行動閱讀工具 mCMS QR Reader，於2012年台北資訊月提供下載，他是一個非常實用的QR掃描軟體喔，也支援mCMS服務（2012.12.01）</p><p>mCMS 目前已開始徵集自願者參與測試，有意者請與我們聯繫。</p>",
	"PAGE_CONTENT_CUSTOMER" => "<p>由於 mCMS 是一個易於建置、即時更新、專注於行動裝置的內容管理系統，他特別符合以下的需求：</p>
								      			<blockquote>
														<p>一、不具備程式設計人員的內容開發商</p>
														<p>二、作家、畫家等創意工作者</p>
														<p>三、多部門，並且需要獨立帳號的機關團體 </p>
													</blockquote>
													<p>由於 mCMS 係提供一個模組化的建置環境，可以靈活的規劃、建置符合使用者需求的行動裝置軟體，我們相信，WEB 2.0 的BLOGGING模式，將會延伸至行動裝置，mCMS的誕生，將帶給大家更多的個人化軟體使用體驗。需求。</p>
													<p>mCMS 目前已開始徵集自願者參與測試，有意者請與我們聯繫。</p>",
	));												
													
													
//USERS Settings
$lang = array_merge($lang,array(
	"USER_SETTING_DISPLAYNAME" => "顯示名稱",
	"USER_SETTING_USERNAME" => "使用者名稱",
	"USER_SETTING_FIRSTNAME" => "名字",
	"USER_SETTING_LASTNAME" => "姓氏",
	"USER_SETTING_PASSWORD" => "目前密碼",
	"USER_SETTING_EMAIL" => "電子郵件帳號",
	"USER_SETTING_PASS_NEW" => "新密碼",
	"USER_SETTING_PASS_CONFIRM" => "新密碼（確認）",
	"USER_SETTING_UPDATE" => "帳戶資料更新",
	));

//Subscriptions
$lang = array_merge($lang,array(
	"SUBSCRIBE_UNSUBSCRIPTION" => "取消訂閱升級",
	"SUBSCRIBE_SUBSCRIPTION" => "訂閱升級帳戶",
	"SUBSCRIBE_CANCEL_TITLE" => "取消訂閱升級",
	"SUBSCRIBE_CANCEL_DESC" => "取消訂閱升級將會在你的程式顯示內容時同時出現擾人的廣告.<br /> 你確定你要取消訂閱升級嗎?",
	"SUBSCRIBE_CANCEL_BTN_YES" => "是的，取消訂閱我的帳戶 !",
	"SUBSCRIBE_CANCEL_BTN_NO" => "不，我希望我的內容沒有擾人的廣告",
	"SUBSCRIBE_CANCELED" => "你的帳戶已取消訂閱",
	"SUBSCRIBE_MCMS_MONTH" => "訂閱付費帳戶<br />（月繳，每月5.99美元）",
	"SUBSCRIBE_MCMS_YEAR" => "訂閱付費帳戶<br />（年繳，每年59.99美元）",
	"SUBSCRIBE_USING_PAYPAL" => "我們使用 Paypal 作為我們的線上付款機制",
	"SUBSCRIBE_" => "",
	"SUBSCRIBE_" => "",
	"SUBSCRIBE_" => "",	
	));													
	
?>