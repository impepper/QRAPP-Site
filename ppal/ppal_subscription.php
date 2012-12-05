<?php
require_once( 'functions.php' );
require_once("../models/config.php");
if(!empty($_POST)){	
	$paypal = create_mcms_subscription(trim($_POST["period"]),trim($_POST["userid"]));
}
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
		if(!empty($_POST)) {
			echo "  <div class='container'>";
			echo "<h2>帳戶升級費用</h2>";
			echo "<p><b>使用者帳戶（電子郵件）:</b> ".$loggedInUser->email." </p>";
			echo "<p><b>訂閱繳費頻率:</b> ".trim($_POST["period"])." </p>";
			echo "<p><b>訂閱升級方式:</b> ".$paypal->get_description()." </p>";
			//echo "<p><b>訂閱升級方式描述:</b>".$paypal->get_subscription_string()."</p>";
			$paypal->print_buy_button();
			echo "</div>";
		};
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
$("#mainContent").css('height',450);
</script>
</body>
</html>
