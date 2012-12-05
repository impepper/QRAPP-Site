<?php require_once("models/config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/mainPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS, my mini mobile CMS</title>
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
    <div id="mainSlides"></div>
		<!-- InstanceEndEditable -->
      
      <div id="blockSpacing"></div>
		</div>
    <!-- 功能特色區塊 -->
		<!-- InstanceBeginEditable name="beforeDocContent" -->
    <div id="featureContent">
      <table>
        <tr>
          <td width="47%"><div class="featureBox"><table>
            <tr >
              <td rowspan="2" width="70"><div class="border-feathurebox"><img src="images/feature-Icon-easy.png" width="96" height="96" /></div></td>
              <td height="40" class="featureTitle"><?php echo lang("PAGE_FEATURE_BOX_HEADER_1"); ?></td>
            </tr>
            <tr>
              <td class="topdown desctext"><p><?php echo lang("PAGE_FEATURE_BOX_CONTENT_1"); ?></p></td>
            </tr>
          </table></div></td>
          <td width="6%"></td>
          <td width="47%"><div class="featureBox"><table>
            <tr >
              <td rowspan="2" width="70"><div class="border-feathurebox"><img src="images/feature-Icon-modulize.png" width="96" height="96" /></div></td>
              <td height="40" class="featureTitle"><?php echo lang("PAGE_FEATURE_BOX_HEADER_2"); ?></td>
            </tr>
            
            <tr>
              <td class="topdown desctext"><?php echo lang("PAGE_FEATURE_BOX_CONTENT_2"); ?></td>
            </tr>
          </table></div></td>
        </tr>
        <!-- <tr><td colspan="2" align="center">devider</td></tr> -->
        <tr>
          <td width="47%"><table class="featureBox">
            <tr >
              <td rowspan="2" width="70"><div class="border-feathurebox"><img src="images/feature-Icon-realtime.png" width="96" height="96" /></div></td>
              <td height="40" class="featureTitle"><p><?php echo lang("PAGE_FEATURE_BOX_HEADER_3"); ?></p></td>
            </tr>
            <tr>
              <td class="topdown desctext"><?php echo lang("PAGE_FEATURE_BOX_CONTENT_3"); ?></td>
            </tr>
          </table></td>
          <td width="6%"></td>
          <td width="47%"><table class="featureBox">
            <tr >
              <td rowspan="2" width="70"><div class="border-feathurebox"><img src="images/feature-Icon-platform.png" width="96" height="96" /></div></td>
              <td height="40" class="featureTitle"><?php echo lang("PAGE_FEATURE_BOX_HEADER_4"); ?></td>
            </tr>
            <tr>
              <td class="topdown desctext"><?php echo lang("PAGE_FEATURE_BOX_CONTENT_4"); ?></td>
            </tr>
          </table></td>
        </tr>
      </table>
   	</div>
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox" >
    <!-- InstanceBeginEditable name="docContent" -->
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
