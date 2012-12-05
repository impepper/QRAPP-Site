<?php require_once("models/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/mainPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS - Signup Your New Account</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->
<!-- CSS for jQuery UI 1.8.23 -->
<link href="../../styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />

<!-- CSS for jQuery UI 1.7.3
<link href="../styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->

<!-- CSS for Plugins  -->

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

<!-- js for ACS -->
<script type="text/javascript" src="../../scripts/cocoafish/cocoafish-1.2.min.js"></script>
<script type="text/javascript" src="../acs_sdk.js"></script>

<script type="text/javascript">
$(function(){
	$(':button').button();
	$(':text').text();
	$('#btn_create').bind('click',function(e){
			sdk_user_create($('#new_useremail').val(),$('#new_userfirstname').val(),$('#new_userlastname').val(),$('#new_pass').val(),$('#new_pass_confirm').val(),false);
		})
	
	$('#loginStatus').val('Already a registered user? &nbsp;&nbsp; <a href="login.php" target="Frame_content">Log In</a>');		
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
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox" >
    <!-- InstanceBeginEditable name="docContent" -->
    <div class="content_h_centered">
      <h1>Creat New Account</h1>
      <form id="form1" name="form1" method="post" action="">
        <p>
          <label for="new_useremail">eMail:</label>
          <input type="text" name="new_useremail" id="new_useremail" />
        </p>
        <p>
          <label for="new_userfirstname">First Name:</label>
          <input type="text" name="new_userfirstname" id="new_userfirstname" />
        </p>
        <p>
          <label for="new_userlastname">Last Name:</label>
          <input type="text" name="new_userlastname" id="new_userlastname" />
        </p>
        <p>
          <label for="new_pass">Passowrd:</label>
          <input type="password" name="new_pass" id="new_pass" />
        </p>
        <p>
          <label for="new_pass">reType:</label>
          <input type="password" name="new_pass_confirm" id="new_pass_confirm" />
        </p>
        <p>
          <input name="btn_create" type="button" id="btn_create" value="Creat My Account" />
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
<!-- InstanceBeginEditable name="jsSection_body" -->
<script type="text/javascript">
</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
