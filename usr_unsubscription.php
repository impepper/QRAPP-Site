<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);

//Prevent the user visiting the logged in page if he/she is already logged in
if(!isUserLoggedIn()) { header("Location: usr_login.php"); die(); }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/userPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS - User Login</title>
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
		<?php echo resultBlock($errors,$successes); ?>
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
    <!-- InstanceBeginEditable name="docContent" -->
    <div id="ac_upgrade">
    	<h2><?php echo lang("SUBSCRIBE_CANCEL_TITLE"); ?></h2>
        <?php echo lang("SUBSCRIBE_CANCEL_DESC"); ?>
    	<br /><br /><br />
<center><table><tr><td>
		<form action='ppal/ppal_unsubscription.php' method='post'>
            <input name='' type='submit' value=<?php echo "'".lang("SUBSCRIBE_CANCEL_BTN_YES")."'"; ?> />
            <?php
				global $mysqli,$db_table_prefix;
				$stmt = $mysqli->prepare("SELECT profile_id,period FROM ".$db_table_prefix."users_paypal WHERE id=? ORDER BY create_stamp desc LIMIT 1" );	
				$stmt->bind_param("i", $loggedInUser->user_id);
				$stmt->execute();	
				$stmt->bind_result($result_profileID,$result_period);
				$stmt->fetch();			
				echo "<input name='profileID_confirmed' type='hidden' value='".$result_profileID."' />";
				echo "<input name='period_confirmed' type='hidden' value='".$result_period."' />";
				echo "<input name='userID_confirmed' type='hidden' value='".$loggedInUser->user_id."' />";
				$stmt->close();
            ?>
            
        </form>
        </td><td>
		<form action='ppal/ppal_unsubscription.php' method='post'>
        	<input name='' type='submit' value=<?php echo "'".lang("SUBSCRIBE_CANCEL_BTN_NO")."'"; ?> />
        	<input name='profileID_confirmed' type='hidden' value='cancel' />
        </form> 
     	</td></tr></table></center>   
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
$("#mainContent").css('height',450);
</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
