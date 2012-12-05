<?php require_once("models/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/mainPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS - Feature Matrix</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->
<!-- for jQuery UI 1.8.23
<link href="../styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />
-->
<!-- for jQuery UI 1.7.3
<link href="../styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->
<link href="styles/mcms_main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="jsSection" -->
<!-- for jQuery UI 1.8.23 -->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>
-->
<!-- for jQuery UI 1.7.3
<script src="http://code.jquery.com/jquery-1.3.2.min.js"> </script>
<script src="../scripts/jquert/jquery-ui-1.7.3.custom.min.js"> </script>
-->
<script type="text/javascript">

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
    <div id="contentSlides"></div>
		<!-- InstanceEndEditable -->
      
      <div id="blockSpacing"></div>
		</div>
    <!-- 功能特色區塊 -->
		<!-- InstanceBeginEditable name="beforeDocContent" -->
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox" >
    <!-- InstanceBeginEditable name="docContent" -->
    <h2>Feature Matrix</h2><br /><br />
    <center>
		<table width="70%" border="1" border-color="#000" cellspacing="0" cellpadding="5">
		  <tr height="50" align="center">
		    <td>&nbsp;</td>
		    <td width="130">Intro</td>
		    <td width="130">Moderate</td>
		    <td width="130">Advanced</td>
		    </tr>
		  <tr height="50" align="center">
		    <td>Devices</td>
		    <td colspan="3">iOS/Android Phone/Pad</td>
		    </tr>
		  <tr height="50" align="center">
		    <td>Ad Banners</td>
		    <td width="130">Yes</td>
		    <td width="130">No</td>
		    <td width="130">No</td>
		    </tr>
      <tr height="50" align="center">
		    <td>Contents</td>
		    <td width="130">1</td>
		    <td width="130">3</td>
		    <td width="130">unlimited</td>
		    </tr>
			<tr height="50" align="center">
		    <td>Feature Bricks</td>
		    <td width="130">2</td>
		    <td width="130">unlimited</td>
		    <td width="130">unlimited</td>
		    </tr>
      <!--
		  <tr height="50" align="center">
		    <td>Tier-2 Modules</td>
		    <td width="130">2</td>
		    <td width="130">unlimited</td>
		    <td width="130">unlimited</td>
		    </tr>
			-->
		  <tr height="50" align="center">
		    <td>Private Apps</td>
		    <td width="130">No</td>
		    <td width="130">No</td>
		    <td width="130">Yes</td>
		    </tr>
		  <tr height="50" align="center">
		    <td>&nbsp;</td>
		    <td width="130">&nbsp;</td>
		    <td width="130">&nbsp;</td>
		    <td width="130">&nbsp;</td>
		    </tr>
		  </table></center>
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
$("#mainContent").css('height',920);
</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
