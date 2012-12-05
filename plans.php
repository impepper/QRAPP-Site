<?php require_once("models/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/mainPage.dwt" codeOutsideHTMLIsLocked="false" -->
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

<link href="styles/mcms_main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="jsSection" -->
<!-- for jQuery UI 1.8.23 -->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>

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
    <h2>Account Plans</h2><br /><br />
		<table width="100%" border="0" cellspacing="5" cellpadding="5">
		  <tr bgcolor="#999999" align='center' >
		    <td width="33%"><h3><?php echo lang("USER_TYPE_BASIC")?></h3></td>
		    <td width="33%"><h3><?php echo lang("USER_TYPE_MODERATE")?></h3></td>
		    <td width="33%"><h3><?php echo lang("USER_TYPE_ADVANCED")?></h3></td>
		    </tr>
		  <tr class="left-top-down" bgcolor="#EEE">
		    <td width="33%"><?php echo lang("USER_TYPE_BASIC_DESC")?></td>
        <td width="33%"><?php echo lang("USER_TYPE_MODERATE_DESC")?></td>
        <td width="33%"><?php echo lang("USER_TYPE_ADVANCED_DESC")?></td>
		    </tr>
		  <tr bgcolor="#555" class="left-top-down noticingNote">
		    <td width="33%"><?php echo lang("USER_TYPE_BASIC_FOOTNOTE")?></td>
		    <td width="33%"><?php echo lang("USER_TYPE_MODERATE_FOOTNOTE")?></td>
		    <td width="33%"><?php echo lang("USER_TYPE_ADVANCED_FOOTNOTE")?></td>
		    </tr>
		  </table>
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
$("#mainContent").css('height',960);
</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
