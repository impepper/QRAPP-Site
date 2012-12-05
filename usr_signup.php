<?php 

require_once("models/config.php");

securePage($_SERVER['PHP_SELF']);

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: app_admin.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$email = trim($_POST["email"]);
	$username = trim($_POST["username"]);
	$displayname = trim($_POST["displayname"]);
	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);
	$captcha = md5($_POST["captcha"]);
	
	
	if ($captcha != $_SESSION['captcha'])
	{
		$errors[] = lang("CAPTCHA_FAIL");
	}
	if(minMaxRange(5,25,$username))
	{
		$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
	}
	if(!ctype_alnum($username)){
		$errors[] = lang("ACCOUNT_USER_INVALID_CHARACTERS");
	}
	if(minMaxRange(5,25,$displayname))
	{
		$errors[] = lang("ACCOUNT_DISPLAY_CHAR_LIMIT",array(5,25));
	}
	if(!ctype_alnum($displayname)){
		$errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
	}
	if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
	{
		$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
	}
	else if($password != $confirm_pass)
	{
		$errors[] = lang("ACCOUNT_PASS_MISMATCH");
	}
	if(!isValidEmail($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	//End data validation
	if(count($errors) == 0)
	{	
		//Construct a user object
		$user = new User($username,$displayname,$password,$email);
		
		//Checking this flag tells us whether there were any errors such as possible data duplication occured
		if(!$user->status)
		{
			if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
			if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
			if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
		}
		else
		{
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			if(!$user->userCakeAddUser())
			{
				if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
				if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
			}
		}
	}
	if(count($errors) == 0) {
		$successes[] = $user->success;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/userPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->

<!-- CSS for jQuery UI 1.8.23 -->
<link href="styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />

<!-- CSS for jQuery UI 1.7.3
<link href="styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->

<!-- CSS for Portal -->
<link href="styles/mcms_main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
</style>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="jsSection" -->

<!-- js for jQuery UI 1.8.23 -->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>

<!-- js for jQuery UI 1.7.3
<script src="http://code.jquery.com/jquery-1.3.2.min.js"> </script>
<script src=""scripts/jquert/jquery-ui-1.7.3.custom.min.js"> </script>
-->

<!-- js customized -->
<script src='scripts/funcs.js'> </script>

<!-- js for plugins -->

<!-- js for ACS 
<script type="text/javascript" src="scripts/cocoafish/cocoafish-1.2.min.js"></script>
<script type="text/javascript" src="acs_management/acs_sdk.js"></script>
-->
<script type="text/javascript">
$(function(){
	$(':submit').button()
	$(':text').text()
	$(':password').text()
})
</script>
<!-- InstanceEndEditable -->
</head>

<body class="oneColLiqCtr">

<div id="container" class="shadow-surround-dark-5">
  <div id="mcmsHeader">
    <?php include("includes/header.html"); ?> 
  </div>
  
  <div id="mainContent">
		<div id="slideSection" class="shadow-under-dark-5">
      <div id="blockSpacing"></div>	
      
      <!-- 首頁的SLide Bar -->
      <!-- InstanceBeginEditable name="slideBar" -->
		<!-- InstanceEndEditable -->
      
      <div id="blockSpacing"></div>
    </div>
    <!-- 功能特色區塊 -->
		<!-- InstanceBeginEditable name="beforeDocContent" -->
    <?php 
		echo resultBlock($errors,$successes);
		?>
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
    <!-- InstanceBeginEditable name="docContent" -->
    <div id='regbox'>
		<!--
    <form id="form1" name="form1" method="post" action="">
    -->
    <?php echo"<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>" ?>
        <p>
        <label><?php echo lang("USER_SETTING_USERNAME") ?>:</label>
        <input type='text' name='username' />
        </p>
        <p>
        <label><?php echo lang("USER_SETTING_DISPLAYNAME") ?>:</label>
        <input type='text' name='displayname' />
        </p>
        <p>
        <label><?php echo lang("USER_SETTING_PASSWORD") ?>:</label>
        <input type='password' name='password' />
        </p>
        <p>
        <label><?php echo lang("USER_SETTING_PASS_CONFIRM") ?>:</label>
        <input type='password' name='passwordc' />
        </p>
        <p>
        <label><?php echo lang("USER_SETTING_EMAIL") ?>:</label>
        <input type='text' name='email' />
        </p>
        <p>
        <label><?php echo lang("APP_CAPTCHA") ?>:</label>
        <img src='models/captcha.php'>
        </p>
        <label><?php echo lang("APP_CAPTCHA_ENTER") ?>:</label>
        <input name='captcha' type='text'>
        </p>
        <label>&nbsp;<br>
        <input type='submit' value=<?php echo "'".lang("SITE_LINKS_REGISTER")."'" ?> />
        </p> 
		  </form>
      </div>
    <!-- InstanceEndEditable -->
    </div>
    
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>

<!-- end #mainContent -->
  </div>
  <!-- 頁面底部連結區塊 -->
  <div id="siteLinks">
  	<!--
    <div id="blockSpacing"></div>
    -->
		<?php include("includes/sitelinks.html"); ?>
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>	
  </div>

  <div id="blockSpacing"></div>
  <!-- Footer 區塊 -->
  <div id="mcmsFooter">
    <?php include("includes/footer.html"); ?>
  </div>  
  <div id="blockSpacing" ></div>
  
<!-- end #container -->
</div>

<div id="blockSpacing"></div>

<!-- Javascript Area -->
<!-- InstanceBeginEditable name="jsBodySection" -->
<script type="text/javascript">

</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
<?php
//mysql_free_result($db_recset_user);
?>
