<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);

//Prevent the user visiting the logged in page if he is not logged in
if(!isUserLoggedIn()) { header("Location: usr_login.php"); die(); }

if(!empty($_POST))
{
	$errors = array();
	$successes = array();
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$password = $_POST["password"];
	$password_new = $_POST["passwordc"];
	$password_confirm = $_POST["passwordcheck"];
	
	$errors = array();
	$email = $_POST["email"];
	
	//Perform some validation
	//Feel free to edit / change as required
	
	//Confirm the hashes match before updating a users password
	$entered_pass = generateHash($password,$loggedInUser->hash_pw);
	
	if (trim($password) == ""){
		$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
	}
	else if($entered_pass != $loggedInUser->hash_pw)
	{
		//No match
		$errors[] = lang("ACCOUNT_PASSWORD_INVALID");
	}	
	if($email != $loggedInUser->email)
	{
		if(trim($email) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
		}
		else if(!isValidEmail($email))
		{
			$errors[] = lang("ACCOUNT_INVALID_EMAIL");
		}
		else if(emailExists($email))
		{
			$errors[] = lang("ACCOUNT_EMAIL_IN_USE", array($email));	
		}
		
		//End data validation
		if(count($errors) == 0)
		{
			$loggedInUser->updateEmail($email);
			$successes[] = lang("ACCOUNT_EMAIL_UPDATED");
		}
	}
	
	if (($first_name != $loggedInUser->firstname) || ($last_name != $loggedInUser->lastname))
	{
		$loggedInUser->updateUserInfo(trim($first_name),trim($last_name));
		$successes[] = lang("ACCOUNT_FIRST_LAST_NAME_UPDATED");
	}
	
	if ($password_new != "" OR $password_confirm != "")
	{
		if(trim($password_new) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_NEW_PASSWORD");
		}
		else if(trim($password_confirm) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_CONFIRM_PASSWORD");
		}
		else if(minMaxRange(8,50,$password_new))
		{	
			$errors[] = lang("ACCOUNT_NEW_PASSWORD_LENGTH",array(8,50));
		}
		else if($password_new != $password_confirm)
		{
			$errors[] = lang("ACCOUNT_PASS_MISMATCH");
		}
		
		//End data validation
		if(count($errors) == 0)
		{
			//Also prevent updating if someone attempts to update with the same password
			$entered_pass_new = generateHash($password_new,$loggedInUser->hash_pw);
			
			if($entered_pass_new == $loggedInUser->hash_pw)
			{
				//Don't update, this fool is trying to update with the same password Â¬Â¬
				$errors[] = lang("ACCOUNT_PASSWORD_NOTHING_TO_UPDATE");
			}
			else
			{
				//This function will create the new hash and update the hash_pw property.
				$loggedInUser->updatePassword($password_new);
				
				
				$successes[] = lang("ACCOUNT_PASSWORD_UPDATED");
			}
		}
	}
	if(count($errors) == 0 AND count($successes) == 0){
		$errors[] = lang("NOTHING_TO_UPDATE");
	}
} else {
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT account_type FROM ".$db_table_prefix."users WHERE id= ?" );						
	$stmt->bind_param("i",$loggedInUser->user_id );
	$stmt->execute();
	$stmt->bind_result($result_accounttype);
	$stmt->fetch();
	$loggedInUser->accounttype = $result_accounttype;
	$stmt->close();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/userPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS - User Settings</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->

<!-- CSS for jQuery UI 1.8.23 -->
<link href="styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />

<!-- CSS for jQuery UI 1.7.3
<link href="../styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
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
	$('input:text').text()
	$(':password').text()
	$('input:text, :password').addClass('my-textfield')
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
    <?php echo resultBlock($errors,$successes); ?>
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
    <!-- InstanceBeginEditable name="docContent" -->
    <div id='regbox'>
    	<?php echo "<form name='updateAccount' action='".$_SERVER['PHP_SELF']."' method='post'>" ?>
        <p>
        <label><?php echo lang("USER_SETTING_DISPLAYNAME") ?>:</label>
        <label><?php echo $loggedInUser->displayname ?></label> &nbsp;
        <label class="account_subscribe"><?php if ($loggedInUser->accounttype < 5 ) { echo "<a href='usr_subscription.php'> Romove ads in your apps? </a>"; } 
											else { echo "<a href='usr_unsubscription.php'> Unssubscription </a>";}  ?></label>
        </p>
        <p>
        <label><?php echo lang("USER_SETTING_FIRSTNAME") ?>:</label>
        <?php echo "<input type='text' name='first_name' value='".$loggedInUser->firstname."' />" ?>
        </p>        
        <p>
        <label><?php echo lang("USER_SETTING_LASTNAME") ?>:</label>
        <?php echo "<input type='text' name='last_name' value='".$loggedInUser->lastname."' />" ?>
        </p>   
        <p>
        <label><?php echo lang("USER_SETTING_PASSWORD") ?>:</label>
        <input type='password' name='password' />
        </p>
        <p>
        <label><?php echo lang("USER_SETTING_EMAIL") ?>:</label>
        <?php echo "<input type='text' name='email' value='".$loggedInUser->email."' />" ?>
        </p>
        <p>
        <label><?php echo lang("USER_SETTING_PASS_NEW") ?>:</label>
        <input type='password' name='passwordc' />
        </p>
        <p>
        <label><?php echo lang("USER_SETTING_PASS_CONFIRM") ?>:</label>
        <input type='password' name='passwordcheck' />
        </p>
        <p>
        <label>&nbsp;</label>
        <input type='submit' value=<?php echo '"'.lang("USER_SETTING_UPDATE").'"' ?> class='submit' />
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
$("#mainContent").css('height',650);
</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
