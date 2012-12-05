<?php 

require_once("models/config.php");

securePage($_SERVER['PHP_SELF']);

//Prevent the user visiting the logged in page if he/she is already logged in
//if(isUserLoggedIn()) { header("Location: userCake/account.php"); die(); }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>mCMS</title>
<!-- CSS for jQuery UI 1.8.23 -->
<link href="../../styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />
<!-- CSS for Portal -->
<link href="../../styles/mcms_main.css" rel="stylesheet" type="text/css" />
<!-- js for jQuery UI 1.8.23 -->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="../../scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>
<!-- js customized -->
<script src='../../scripts/funcs.js'> </script>
<script src="../scripts/jquery.qrcode/jquery.qrcode.min.js"></script>

<!-- js customized -->
<script src='../../scripts/funcs.js'> </script>


</head>

<body class="oneColLiqCtr">

<div id="container">
  <div id="mcmsHeader">
    <?php include("includes/header_noimage.html"); ?> 
  </div>
  
  <div id="mainContent">  
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox">

		 <h2>Welcome to mCMS</h2>
		 <?php
			 if(!empty($_GET))
				{
					$crypted_id = trim($_GET["id"]);
					echo "We are pleased to generate your content codes below:<br /><br />";
					echo "<div align='center' id='qrcode' appfileid='".$crypted_id."'>".""."</div><br /><br />";
				}   else {
				  echo "mCMS is a great Content Management System for Mobile Users.<br />";
				}
		?>
        Please <a href="index.php">Vists us</a>. 

    </div>
    
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>

<!-- end #mainContent -->
  </div>
  <!-- 頁面底部連結區塊 -->
  <div id="siteLinks">
    <div id="blockSpacing"></div>
		<?php include("includes/sitelinks.html"); ?>
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>	
  </div>
<!-- end #container -->
</div>

<div id="blockSpacing"></div>
<div id="blockSpacing"></div>
<!-- Footer 區塊 -->
<div id="mcmsFooter">
  <?php include("includes/footer.html"); ?>
</div>  

<!-- Javascript Area -->

<script type="text/javascript">
//$(function(){
	var appfield = $("#qrcode").attr("appfileid")
	$("#qrcode").qrcode({width: 256,height: 256,text: "http://mcms.fuihan.com/"+appfield});
//})

$("#mainContent").css('height',520);

</script>

</body>
</html>