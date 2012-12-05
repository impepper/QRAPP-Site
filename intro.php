<?php require_once("models/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/mainPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS - IntroDuction</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->
<link href="styles/mcms_main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
-->
</style>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="jsSection" -->
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
    <?php echo lang("PAGE_CONTENT_INTRO"); ?>
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
