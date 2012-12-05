<?php require_once("models/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/mainPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS - Content Modules</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->
<!-- for jQuery UI 1.8.23-->
<link href="styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />
<link href="styles/css_pirobox/style_5/style.css" rel="stylesheet" type="text/css" />

<!-- for jQuery UI 1.7.3
<link href="../styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->
<link href="styles/mcms_main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="jsSection" -->
<!-- for jQuery UI 1.8.23-->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>

<!--  for jQuery UI 1.7.3
<script src="http://code.jquery.com/jquery-1.3.2.min.js"> </script>
<script src="../scripts/jquert/jquery-ui-1.7.3.custom.min.js"> </script>
-->
<script type="text/javascript" src="scripts/pirobox_extended_v1.1beta/js/pirobox_extended_feb_2011.js"></script>

<script type="text/javascript">
$(document).ready(function() {
//$(function(){
	$.piroBox_ext({
	piro_speed :700,
	bg_alpha : 0.5,
	piro_scroll : true,
	piro_drag :false,
	piro_nav_pos: 'bottom'
});
});
</script>
<!-- InstanceEndEditable -->
</head>

<body class="oneColLiqCtr">

<div id="container">
  <div id="mcmsHeader">
    <?php include("includes/header.html"); ?> 
  </div>
  
  <div id="mainContent">

    <div id="blockSpacing"></div>	
  	
    <!-- 首頁的SLide Bar -->
		<!-- InstanceBeginEditable name="slideBar" -->
    <div id="contentSlides"></div>
		<!-- InstanceEndEditable -->
    
    <div id="blockSpacing"></div>
    
    <!-- 功能特色區塊 -->
		<!-- InstanceBeginEditable name="beforeDocContent" -->
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
    <!-- InstanceBeginEditable name="docContent" -->
    <h2><?php echo lang("SITE_LINKS_MODULES") ?></h2><br /><br />
    
    <center>
		<table width="90%" cellspacing="0" cellpadding="5">
		  <tr height="120" align="center">
		    <td width="33%"><a  href="modules/webpage.html" title="Module - Web Pages" rel="content-640-480" class="pirobox_gall1"><img src="modules/puzzle_webpage_s.png"  alt="Module - Web Pages" /></a></td>
		    <td width="33%"><a  href="modules/webvideo.html" title="Module - Web Videos" rel="content-640-480" class="pirobox_gall1"><img src="modules/puzzle_webvideo_s.png"  alt="Module - Web Videos" /></a></td>
		    <td width="33%"><a  href="modules/photo.html" title="Module - Photo Browsing" rel="content-640-480" class="pirobox_gall1"><img src="modules/puzzle_photo_s.png"  alt="Module - Photo Browsing" /></a></td>
		    </tr>
		  <tr height="120" align="center">
		    <td width="33%"><a  href="modules/table.html" title="Module - Lists" rel="content-640-480" class="pirobox_gall1"><img src="modules/puzzle_table_s.png" alt="Module - Lists" /></a></td>
		    <td width="33%"><img src="modules/puzzle.png" alt="Available Modules" /></td>
		    <td width="33%"><a  href="modules/rss_type1.html" title="Module - RSS 2.0 (Type I)" rel="content-640-480" class="pirobox_gall1"><img src="modules/puzzle_rss1_s.png"  alt="Module - RSS 2.0 (Type I)" /></a></td>
		    </tr>
		  <tr height="120" align="center">
		    <td width="33%"><a  href="modules/contact.html" title="Module - Contact Infos" rel="content-640-480" class="pirobox_gall1"><img src="modules/puzzle_contact_s.png"  alt="Module - Contact Infos" /></a></td>
		    <td width="33%"><a  href="modules/customhtml.html" title="Module - Custom HTML Pages" rel="content-640-480" class="pirobox_gall1"><img src="modules/puzzle_customhtml_s.png"  alt="Module - Custom HTML Pages" /></a></td>
		    <td width="33%"><a  href="modules/rss_type2.html" title=Module - RSS 2.0 (Type II)" rel="content-640-480" class="pirobox_gall1"><img src="modules/puzzle_rss2_s.png"  alt="Module - RSS 2.0 (Type II)" /></a></td>
		    </tr>        
		  </table></center>		<!-- InstanceEndEditable -->
    </div>
    
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>
    
<!-- end #mainContent -->
  </div>
  <!-- 頁面底部連結區塊 -->
  <div id="siteLinks">
    <div id="blockSpacing"></div>
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
<!-- InstanceBeginEditable name="jsSection_body" -->
<script type="text/javascript">
$("#mainContent").css('height',1520);
</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
