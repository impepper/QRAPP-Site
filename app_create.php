<?php 

require_once("models/config.php");

securePage($_SERVER['PHP_SELF']);

//Prevent the user visiting the logged in page if he/she is already logged in
if(!isUserLoggedIn()) { header("Location: usr_login.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	//$title = trim($_POST["title"]);
	$title = preg_replace("/\s/e" , "_" , trim($_POST["title"]));
	$description = trim($_POST["description"]);
	$captcha = md5($_POST["captcha"]);
	$password = trim($_POST["password"]);
	$username = trim($_POST["username"]);

	if($password == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
	}

	$userdetails = fetchUserDetails($username);
	//Hash the password and use the salt from the database to compare the password.
	$entered_pass = generateHash($password,$userdetails["password"]);
	if($entered_pass != $userdetails["password"])
	{
		//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
		$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
	}	
	if ($captcha != $_SESSION['captcha'])
	{
		$errors[] = lang("CAPTCHA_FAIL");
	}
	if(minMaxRange(3,25,$title))
	{
		$errors[] = lang("APP_TITLE_CHAR_LIMIT",array(3,25));
	}
	if(minMaxRange(5,200,$description))
	{
		$errors[] = lang("APP_DESCRIPTION_CHAR_LIMIT",array(5,200));
	}
	//End data validation
	if(count($errors) == 0)
	{	
		//Construct a user object
		$app = new App($loggedInUser->user_id,$title,$description);
		
		//Checking this flag tells us whether there were any errors such as possible data duplication occured
		if(!$app->status)
		{
			if($app->appTitle_taken) $errors[] = lang("APP_TITLE_IN_USE",array($title));
		}
		else
		{
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			if(!$app->AddApp())
			{
				if($app->sql_failure)  $errors[] = lang("SQL_ERROR");
			}
		}
	}
	if(count($errors) == 0) {
		$successes[] = $app->success;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/userPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS - Create your own App</title>
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

<!-- js for ACS -->
<script type="text/javascript" src="scripts/cocoafish/cocoafish-1.2.min.js"></script>
<script type="text/javascript" src="acs_management/acs_sdk.js"></script>

<script type="text/javascript">
$(function(){
	$(':button').button();
	$(':text').text();
	$(':password').text();
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
    <?php echo"<form name='newApp' action='".$_SERVER['PHP_SELF']."' method='post'>" ?>
         <?php echo"<input type='hidden' name='username' value='".$loggedInUser->username."'>"; ?>
        <p>
        <label><?php echo lang("APP_TITLE") ?>:</label>
        <input type='text' name='title' />
        </p>
        <p>
        <label><?php echo lang("APP_DESC") ?>:</label>
        <input type='text' name='description' />
        </p>
        <p>
        <label><?php echo lang("APP_CAPTCHA") ?>:</label>
        <img src='models/captcha.php'>
        </p>
        <label><?php echo lang("APP_CAPTCHA_ENTER") ?>:</label>
        <input name='captcha' type='text'>
        </p>
        <p>
        <label><?php echo lang("APP_PASSWORD") ?>:</label>
        <input type='password' name='password' />
        </p>        
        <label>&nbsp;<br>
        <input type='submit' value=<?php echo "'".lang("APP_CREATE")."'" ?>/>
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
<?php if ((!empty($_POST)) && (count($errors) == 0))
{
	
	echo "<script type='text/javascript'>";
	//echo "sdk_user_create('".$loggedInUser->email."','".$loggedInUser->displayname."','".$loggedInUser->lastname."','".$password."','".$password."',false,'".$app->app_id.'.'.$loggedInUser->email."','acs_management/mcms_basic/main.php')";
	echo "sdk_user_create('','".$loggedInUser->displayname."','".$loggedInUser->lastname."','".$password."','".$password."',false,'".$app->app_id.'.'.$loggedInUser->email."','acs_management/mcms_basic/main.php',".$loggedInUser->accounttype.")";	
	echo "</script>";
}
?>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
