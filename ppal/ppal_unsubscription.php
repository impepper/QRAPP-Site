<?php
require_once( 'functions.php' );
require_once("../models/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mCMS</title>
<!-- CSS for jQuery UI 1.8.23 -->
<link href="../styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />

<!-- CSS for jQuery UI 1.7.3
<link href="../styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->

<!-- CSS for Portal -->
<link href="../styles/mcms_main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
</style>
<!-- js for jQuery UI 1.8.23 -->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="../scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>

<!-- js for jQuery UI 1.7.3
<script src="http://code.jquery.com/jquery-1.3.2.min.js"> </script>
<script src=""../scripts/jquert/jquery-ui-1.7.3.custom.min.js"> </script>
-->

<!-- js for plugins -->

<!-- js for ACS 
<script type="text/javascript" src="../scripts/cocoafish/cocoafish-1.2.min.js"></script>
<script type="text/javascript" src="../acs_management/acs_sdk.js"></script>
-->
<script type="text/javascript">
$(function(){
	$(':submit').button()
	$(':text').text()
	$(':password').text()
})
</script>
</head>

<body class="oneColLiqCtr">

<div id="container">
  <div id="mcmsHeader">
    <?php include("../includes/header.html"); ?> 
  </div>
  
  <div id="mainContent">

    <div id="blockSpacing"></div>	
  	
    <!-- 首頁的SLide Bar -->
		<div id="blockSpacing"></div>
    
    <!-- 功能特色區塊 -->
		<!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
	<?php 
		if (!empty($_POST) && ($_POST["profileID_confirmed"] != 'cancel')) {
				echo "  <div class='container'>";
				echo "<h2>".lang("SUBSCRIBE_CANCELED")."</h2>";				
				// 更換PAYPAL 訂閱狀態為「取消」
				$paypal = create_example_subscription();
				$paypal->manage_subscription_status( $_POST["profileID_confirmed"], 'Cancel' );
				echo "</div>";
				
				global $mysqli,$db_table_prefix;				
				//將「取消訂閱」狀態寫入USER_PAYPAL資歷表中做為記錄
				$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."users_paypal (
						id,
						period,
						profile_id,
						status,
						create_stamp,
						modify_stamp) VALUES (
						'".$_POST["userID_confirmed"]."',
						'".$_POST["period_confirmed"]."',
						'".$_POST["profileID_confirmed"]."',
						'Cancel',
						'".time()."',
						'".time()."')" );
				$stmt->execute();	
				
				//更正使用者資料的帳戶狀態為0（基本用戶）
				$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users SET account_type=0 WHERE id=?" );	
				$stmt->bind_param("i", $_POST["userID_confirmed"]);										
				$stmt->execute();
				//更正使用者資料目前的的帳戶狀態變數為0（基本用戶）
				$loggedInUser->accounttype = 0;
					
		}  else {
			header("Location: ../usr_settings.php");
		} ;
	?>
   
    </div>
    
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>

<!-- end #mainContent -->
  </div>
  <!-- 頁面底部連結區塊 -->
  <div id="siteLinks">
    <div id="blockSpacing"></div>
		<?php include("../includes/sitelinks.html"); ?>
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>	
  </div>
<!-- end #container -->
</div>

<div id="blockSpacing"></div>
<div id="blockSpacing"></div>
<!-- Footer 區塊 -->
<div id="mcmsFooter">
  <?php include("../includes/footer.html"); ?>
</div>  

<!-- Javascript Area -->
<script type="text/javascript">
$("#mainContent").css('height',350);
</script>
</body>
</html>
