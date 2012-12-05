<?php 

require_once("models/config.php");

securePage($_SERVER['PHP_SELF']);

//Prevent the user visiting the logged in page if he/she is already logged in
//if(isUserLoggedIn()) { header("Location: userCake/account.php"); die(); }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/userPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS - Your Apps</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->

<!-- CSS for jQuery UI 1.8.23 -->
<link href="styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />

<!-- CSS for jQuery UI 1.7.3
<link href="styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->

<!-- CSS for Portal -->
<link href="styles/mcms_main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
</style>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="jsSection" -->

<!-- js for jQuery UI 1.8.23 -->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>

<!-- js for jQuery UI 1.7.3
<script src="http://code.jquery.com/jquery-1.3.2.min.js"> </script>
<script src=""scripts/jquert/jquery-ui-1.7.3.custom.min.js"> </script>
-->

<!-- js customized -->
<script src='scripts/funcs.js'> </script>
<script src="scripts/jquery.qrcode/jquery.qrcode.min.js"></script>

<!-- js for plugins -->

<!-- js for ACS -->
<script type="text/javascript" src="scripts/cocoafish/cocoafish-1.2.min.js"></script>
<script type="text/javascript" src="acs_management/acs_sdk.js"></script>

<script type="text/javascript">
$(function(){
	sdk_user_logout(false);
	$(':button').button();
	$(':text').text();
	$(':password').text();
	var password = $( "#app_password" );
	var appid;
	var apptitle;
	var apppdesctext;
	var new_apppdesctext;
	$('#appTiles a[name="detailinfo"]').bind('click',function(e){
			appid=$(this).attr('apptitle');
			apptitle=$("a[name='apptitle_"+appid+"']").text();
			appdesctext=$("tr[name='description_"+appid+"'] td").text();
			appfield=$("a[name='apptitle_"+appid+"']").attr('customfield');
			$('#dialog-appdetail h2').text(apptitle);
			$('#dialog-appdetail  p').text(appdesctext).addClass('left-top-down').css('height',180);
			$('#qrcode').text('').qrcode({width: 256,height: 256,text: "http://mcms.fuihan.com/"+appfield});
			$( "#dialog-appdetail" ).dialog( "open" );	
	});

	$('#appTiles a[name="qrcodeonly"]').bind('click',function(e){
			$('#qrcodeonly').text('').qrcode({width: 256,height: 256,text: "http://mcms.fuihan.com/"+appfield+"="});
			$( "#dialog-qrcodeonly" ).dialog( "open" );	
	});
	$('#appTiles a[name="appedit"]').bind('click',function(e){
			appid=$(this).attr('apptitle');
			apptitle=$("a[name='apptitle_"+appid+"']").text();
			appdesctext=$("tr[name='description_"+appid+"'] td").text();		
			$( "#dialog-appedit textarea" ).text(appdesctext);
			$( "#dialog-appedit" ).dialog( "open" );	
	});	
	$( "#dialog-pass" ).dialog({
		autoOpen: false,
		height: 300,
		width: 350,
		modal: true,
		buttons: {
			"Manage My App": function() {
				//sdk_user_login(appfield,password.val(),'acs_management/mcms_basic/main.php');
				window.location='app_login.php?appid='+appfield+'&pw='+password.val()+'&ref=acs_management/mcms_basic/main.php'
				$( this ).dialog( "close" );
			}
		},
		close: function() {}
	});
	
	$( "#dialog-appdetail" ).dialog({
		autoOpen: false,
		height: 500,
		width: 650,
		modal: true,
		buttons: {
			"Manage My Content": function() {
				$( "#dialog-pass" ).dialog( "open" );
			},		
			"Close": function() {
				$( this ).dialog( "close" );
			}
		},
		close: function() {}
	});	

	$( "#dialog-qrcodeonly" ).dialog({
		autoOpen: false,
		height: 300,
		width: 400,
		modal: true,
		buttons: {
			"Close": function() {
				$( this ).dialog( "close" );
			}
		},		
		close: function() {}
	});	
		$( "#dialog-appedit" ).dialog({
		autoOpen: false,
		height: 400,
		width: 550,
		modal: true,
		buttons: {
			"Modify": function() {
				//$( "#dialog-pass" ).dialog( "open" );
				new_apppdesctext = $( "#dialog-appedit textarea" ).val();
				
				$.get("app_modify.php",{using_apptitle:apptitle,new_description:new_apppdesctext});
				$("tr[name='description_"+appid+"'] td").text(new_apppdesctext);
				$( this ).dialog( "close" );
				//return false;
				
			}
			,		
			"Cancel": function() {
				$( this ).dialog( "close" );
			}
		},
		close: function(){
			$('#dialog-appdetail  p').text(new_apppdesctext);
		}
		
	});	

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
		<?php 
			//echo resultBlock($errors,$successes);
		?>
    <!--  section for FB Sending Codes  -->
    <div id="fb-root"></div>
    
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=538456682835078";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>    
    
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
    <!-- InstanceBeginEditable name="docContent" -->
    <h2><?php echo lang("APP_MANAGER_TITLE"); ?></h2> <br />   
    <div id='divcolumns'>
		<?php
      $db_row = fetchUserApps($loggedInUser->user_id);
			
			if (count($db_row) > 0){ 
				foreach ($db_row as $key_name => $key_value) { 
				  //$crypted_id = $db_row[$key_name]['app_id'] .".".$loggedInUser->email ;
					//$crypted_id = crypt($db_row[$key_name]['app_id'] .".".$loggedInUser->email,'xup6ru4cj/6');
					//$crypted_id = mcrypt_encrypt(MCRYPT_DES, 'xup6ru4cj', $db_row[$key_name]['app_id'] .".".$loggedInUser->email, MCRYPT_MODE_EBC);
					$crypted_id = base64_encode('&content='.$db_row[$key_name]['app_id'] .".".$loggedInUser->email);
					echo "<div id='appTiles' name='Tile'>";
					echo "<div id='appInfoBox'>";					
						echo "<table width='90%' border='0' cellspacing='5' cellpadding='5'>";
							echo "<tr>";
								echo "<td><a name='apptitle_".$crypted_id."'  customfield='".$crypted_id."' href='#'>".$db_row[$key_name]['title'] ."</a></td>";
							echo "</tr>";
							echo "<tr name='description_".$crypted_id."'>";
								echo "<td>".$db_row[$key_name]['description']."</td>";
							echo "</tr>";
						echo "</table>";
					echo "</div>";					
						echo "<div id='appEditbar'><a name='appedit' apptitle='".$crypted_id."' href='#'><img src='images/gear.png' alt='Edit App Description' width='25px' height='25px'></a></div>";							
						
						echo "<div id='appToolbar'><table width='100%'><tr><td align='left'><a name='detailinfo' apptitle='".$crypted_id."' href='#111'><img src='images/detailed.png' alt='View Details' width='35px' height='35px'></a>&nbsp;</td><td aligh='right'>Sharing: <img name='app' linkurl='http://mcms.fuihan.com/content/".$crypted_id."' src='images/fb.png' alt='View Details' width='28px' height='28px'></td></tr></table>&nbsp;&nbsp;</div>";
						
						/* 包含將連結寄送給好友的機制
						echo "<div id='appToolbar'><table width='100%'><tr><td align='left'><a name='detailinfo' apptitle='".$crypted_id."' href='#111'><img src='images/detailed.png' alt='View Details' width='35px' height='35px'></a>&nbsp;</td><td aligh='right'>Sharing: <div class='fb-send' data-href='http://mcms.fuihan.com/content/".$crypted_id."'></div><img name='app' linkurl='http://mcms.fuihan.com/content/".$crypted_id."' src='images/fb.png' alt='View Details' width='28px' height='28px'></td></tr></table>&nbsp;&nbsp;</div>";
						
						/*只有發佈在動態活動的功能
						echo "<div id='appToolbar'><table width='100%'><tr><td align='left'><a name='detailinfo' apptitle='".$crypted_id."' href='#111'><img src='images/detailed.png' alt='View Details' width='35px' height='35px'></a>&nbsp;</td><td aligh='right'>Sharing: <img name='app' linkurl='http://mcms.fuihan.com/content/".$crypted_id."' src='images/fb.png' alt='View Details' width='28px' height='28px'></td></tr></table>&nbsp;&nbsp;</div>";

						
						echo "<div id='appToolbar'><table width='100%'><tr><td align='left'><a name='detailinfo' apptitle='".$crypted_id."' href='#111'><img src='images/detailed.png' alt='View Details' width='35px' height='35px'></a>&nbsp;</td><td aligh='right'>Sharing: <a name='fb_share' type='icon_link' href='http://mcms.fuihan.com/content/".$crypted_id."'>分享</a><script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script><img src='images/fb.png' alt='View Details' width='28px' height='28px'></td></tr></table>&nbsp;&nbsp;</div>";
						
						echo "<div id='appToolbar'><table width='100%'><tr><td align='left'><a name='detailinfo' apptitle='".$crypted_id."' href='#111'><img src='images/detailed.png' alt='View Details' width='35px' height='35px'></a>&nbsp;</td><td aligh='right'>Sharing: "."<a name='qrcodeonly' apptitle='".$crypted_id."' href='http://mcms.fuihan.com/content/".$crypted_id."'><img src='images/fb.png' alt='View Details' width='28px' height='28px'></a></td></tr></table>&nbsp;&nbsp;</div>";
						*/
				echo "</div>";			
				};
			};
    ?>
    <?php 
			/*
			檢查使勇者的等級，如果還可以增加程式的話就提供新增功能
			*/
			if (true){
				echo '<div id="create_new_app" name="Tile" class="border-rounded-dashed-1">';
				echo '<input type="button" value="Create Your App" onclick='.'parent.location="app_create.php"'.'>';
				echo '</div>';
			}
			 
		?>
    <!--
      <div id="create_new_app" name='Tile' class="border-rounded-dashed-1">
      <input type="button" value="Create Your App" onclick="parent.location='app_create.php'">
      </div>
     -->
    </div>
    <br />
    <div id="dialog-pass" title="Passowrd Confirm">
      <p class="validateTips">Please Input passord to manage your app</p>
        <label for="password">Password</label>
        <input type="password" name="password" id="app_password" value="" class="text ui-widget-content ui-corner-all" />
    </div> 
    <div id="dialog-appdetail" title=' '>
    	<img src='' /><h2>APP Title</h2>
      <hr />
      <table width="100%"><tr><td>
      <p>Description of this app</p>
			</td><td width="128"><div id='qrcode'></div>
      </td></tr></table>
    </div>
    <div id="dialog-qrcodeonly" title=' '>
			<div id='qrcodeonly'></div>
    </div>
    <div id="dialog-appedit" title='Modify My Description' >
      <br /><h4 class='left-top-down'>Please modify your content description below:</h4><br />
      <!--
      <form>
      <fieldset>
          <input type="textarea" name="email" id="new_desc" value="" class="text ui-widget-content ui-corner-all" />
      </fieldset>
      </form>
      -->
      <textarea rows="5" cols="50"> The cat was playing in the garden. </textarea>			
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
<!-- InstanceBeginEditable name="jsBodySection" -->
<script type="text/javascript">

$('#divcolumns div[name="Tile"]').addClass('border-rounded-solid-1');
var first = $('<div[name="Tile"] />').addClass('divcolumn').addClass('div_column_left');
var mid = $('<div[name="Tile"] />').addClass('divcolumn').addClass('div_column_mid');
var last = $('<div[name="Tile"] />').addClass('divcolumn').addClass('div_column_right');

var fElems = $('#divcolumns div[name="Tile"]:nth-child(3n+1)');
var mElems = $('#divcolumns div[name="Tile"]:nth-child(3n+2)');
var lElems = $('#divcolumns div[name="Tile"]:nth-child(3n+3)');

fElems.appendTo(first);
mElems.appendTo(mid);
lElems.appendTo(last);

$('#create_new_app').addClass('border-rounded-dashed-1');

$('#divcolumns').append(first,mid,last);
var thirtypc= ($('#divcolumns div[name="Tile"]:nth-child(3n+1)').length+1)*($("#appTiles").height());
//alert($('#divcolumns div[name="Tile"]:nth-child(3n+1)').length+'/'+$("#appTiles").height());
$("#mainContent").css('height',thirtypc);

$('div[id="appToolbar"],div[id="appEditbar"]').fadeOut('fast');


$('div[id="appTiles"]').hover(ToolBar_OnHover, ToolBar_OnBlur);

function ToolBar_OnHover() {
  $(this).children('div[id="appToolbar"],div[id="appEditbar"]').fadeIn('slow');
}

function ToolBar_OnBlur() {
    $(this).children('div[id="appToolbar"],div[id="appEditbar"]').fadeOut('fast');
}

/*
(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=538456682835078";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
*/
			$("img[name='app']").bind('click',function(){
				var appid=$(this).attr('linkurl')
				//alert (appid) 
				postToFeed(appid);
			})
			

      FB.init({appId: "538456682835078", status: true, cookie: true});

      function postToFeed(app_url) {

        // calling the API ...
        var obj = {
          method: 'feed',
          link: app_url,
          picture: 'http://mcms.fuihan.com/styles/images/header_applogo.png',
          name: 'mCMS',
          caption: '我的迷你行動內容 my mini mobile CMS',
          description: '將你的網站內容發佈在行動裝置中 Turn your content into Mobile App.  '
        };

        function callback(response) {
          //document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
      }
</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>