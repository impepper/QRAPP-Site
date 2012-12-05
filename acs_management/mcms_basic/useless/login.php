<?php 
	require_once("../../userCake/models/acs_config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/acsPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->

<!-- CSS for jQuery UI 1.8.23 -->
<link href="../../styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />

<!-- CSS for jQuery UI 1.7.3
<link href="../styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->

<!-- CSS for Plugins  -->
<link rel="stylesheet" type="text/css" href="../../styles/jquery_thunbmail_scroller/jquery.thumbnailScroller.css"/>

<!-- CSS for Portal -->
<link href="../../styles/mcms_acs.css" rel="stylesheet" type="text/css" />
<link href="../../styles/mcms_main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
</style>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="jsSection" -->

<!-- js for jQuery UI 1.8.23 -->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="../../scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>

<!-- js for jQuery UI 1.7.3
<script src="http://code.jquery.com/jquery-1.3.2.min.js"> </script>
<script src=""../scripts/jquert/jquery-ui-1.7.3.custom.min.js"> </script>
-->

<!-- js for plugins -->
<script type="text/javascript" src="../../scripts/jquery_thunbmail_scroller/jquery.thumbnailScroller.js"></script>

<!-- js for ACS -->
<script type="text/javascript" src="../../scripts/cocoafish/cocoafish-1.2.min.js"></script>
<script type="text/javascript" src="../acs_sdk.js"></script>

<script type="text/javascript">
$(function(){
	sdk_user_logout(false);
	$(':button').button()
	$(':text').text()
	$(':password').text()
	$('#login_btn').bind('click',function(e){
			sdk_user_login($('#login_username').val(),$('#login_password').val())
	})

	$('#loginstatus','<a href="login.htm" target="Frame_content">Log in</a>&nbsp;&nbsp;&nbsp;<a href="signup.php" target="Frame_content">Sign Up</a>');	
})
</script>
<!-- InstanceEndEditable -->
</head>

<body class="oneColLiqCtr">

<div id="container">
  <div id="mcmsHeader">
    <?php include("../../includes/header.html"); ?> 
  </div>
  
  <div id="mainContent">

    <div id="blockSpacing"></div>	
  	
    <!-- 首頁的SLide Bar -->
		<!-- InstanceBeginEditable name="slideBar" -->
		<!-- InstanceEndEditable -->
    
    <div id="blockSpacing"></div>
    
    <!-- 功能特色區塊 -->
		<!-- InstanceBeginEditable name="beforeDocContent" -->
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
    <!-- InstanceBeginEditable name="docContent" -->
    <div class="content_h_centered">
      <h1>User Login</h1>
      <form id="form1" name="form1" method="post" action="">
        <p>
          <label for="login_username">Username:</label>
          <?php
          	echo "<input name='login_username' type='text' id='login_username' value='".$loggedInUser->email."' />";
					?>
        </p>
        <p>
          <label for="login_password">Password:</label>
  
          <input name="login_password" type="password" id="login_password" value="" />
        </p>
        <p>
          <input type="button" name="login_btn" id="login_btn" value="Log In" />
        </p>
      </form>
      <p>Not a registered user? <a href="signup.php">SignUp</a>    <!-- end .content --></p>
    </div>    
		<!-- InstanceEndEditable -->
    </div>
    
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>

<!-- end #mainContent -->
  </div>
  <!-- 頁面底部連結區塊 -->
  <div id="siteLinks">
    <div id="blockSpacing"></div>
		<?php include("../../includes/sitelinks.html"); ?>
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>	
  </div>
<!-- end #container -->
</div>

<div id="blockSpacing"></div>
<div id="blockSpacing"></div>
<!-- Footer 區塊 -->
<div id="mcmsFooter">
  <?php include("../../includes/footer.html"); ?>
</div>  

<!-- Javascript Area -->
<!-- InstanceBeginEditable name="jsBodySection" -->
<script type="text/javascript">

</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
