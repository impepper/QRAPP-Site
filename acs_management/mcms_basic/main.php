<?php include("../../models/acs_config.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/templates/acsPage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>mCMS</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="cssSection" -->

<!-- CSS for jQuery UI 1.8.23 -->
<link href="../../styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />

<!-- CSS for jQuery UI 1.7.3
<link href="../styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->

<!-- CSS for Plugins  -->
<link rel="stylesheet" type="text/css" href="../../styles/jquery_thunbmail_scroller/jquery.thumbnailScroller.css"/>

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
<!--<script type="text/javascript" src="../../scripts/redactor/redactor.js"></script> -->
<script type="text/javascript" src="../../scripts/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" src="../../scripts/jquery_thunbmail_scroller/jquery.thumbnailScroller.js"></script>

<!-- js for ACS -->
<script type="text/javascript" src="../../scripts/cocoafish/cocoafish-1.2.min.js"></script>
<script type="text/javascript" src="../acs_sdk.js"></script>

<script type="text/javascript">
/*
$.getScript("../fnc_main.js", function(){
   alert("Script loaded and executed.");
   // here you can use anything you defined in the loaded script
});
*/

//jQuery.noConflict();
(function($){
window.onload=function(){
    $("#ts2").thumbnailScroller({
        scrollerType:"hoverPrecise",
        scrollerOrientation:"horizontal",
        scrollSpeed:2,
        scrollEasing:"easeOutCirc",
        scrollEasingAmount:600,
        acceleration:4,
        scrollSpeed:800,
        noScrollCenterSpace:10,
        autoScrolling:0,
        autoScrollingSpeed:2000,
        autoScrollingEasing:"easeInOutQuad",
        autoScrollingDelay:500
    });
}
})(jQuery);

//更新、顯示錯誤訊息
function updateTips( t ) {
	var tips = $( ".validateTips" )
	tips
		.text( t )
		.addClass( "ui-state-highlight" );
	setTimeout(function() {
		tips.removeClass( "ui-state-highlight", 1500 );
	}, 500 );
}

//欄位檢查:字串長度
function checkLength( o, n, min, max ) {
	if ( o.val().length > max || o.val().length < min ) {
		o.addClass( "ui-state-error" );
		updateTips( "Length of " + n + " must be between " +
			min + " and " + max + "." );
		return false;
	} else {
		return true;
	}
}

//欄位檢查:正規運算式規則
function checkRegexp( o, regexp, n ) {
	if ( !( regexp.test( o.val() ) ) ) {
		o.addClass( "ui-state-error" );
		updateTips( n );
		return false;
	} else {
		return true;
	}		
}	

//欄位檢查:正規運算式規則（使用於電子郵件）
function checkEmailRegexp( o,  n ) {
	var regexp = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i
	if ( !( regexp.test( o.val() ) ) ) {
		o.addClass( "ui-state-error" );
		updateTips( n );
		return false;
	} else {
		return true;
	}		
}	

//Document ready////....

$(function(){

	//建立變數
	var tips = $( ".validateTips" ),
		page_title = $( "#page_title" ),
		content_title = $( "#content_title" ),
		page_link = $( "#page_link" ),
		page_icon = $('#page_icon'),
		page_show_title = $('#chk_showpagetitle'),
		content_show_title = $('#chk_showcontenttitle'),
		page_published = $('#chk_pagepublished'),
		page_parameter_1 = $('#page_link_parameters_1'),
		page_parameter_2 = $('#page_link_parameters_2'),
		page_parameter_3 = $('#page_link_parameters_3'),
		page_parameter_4 = $('#page_link_parameters_4'),
		page_type = $('#page_type'),
		webvideo_type = $('#webvideo_type'),
		webpage_content = $('#webpage_content'),
		allFields = $( [] ).add( page_title ).add( content_title ).add( page_link ).add(page_icon).add(page_show_title).add(content_show_title).add(page_parameter_1).add(page_parameter_2).add(page_parameter_3).add(page_parameter_4).add(page_type).add(webvideo_type).add(webpage_content)
		
	var new_avatar=false;
	var new_window=false;
	//Cloud User Login Status
	sdk_user_info(false)
	
	$('input:text, :password').addClass('my-textfield')
	
	//建立分頁標籤  --- 暫時移到body裡面
	//$('#tabs').tabs();
	
	//建立、更改密碼的相關動作（按鈕及文字欄位）
	$('label[for="edt_newpass_confirm"]').hide();
	$('#edt_newpass_confirm').hide();
	$('#btn_create').bind('click',function(e){
			sdk_user_create($('#new_useremail').val(),'','',$('#new_pass').val(),$('#new_pass_confirm').val(),false);
	})
	$('#edt_newpass').bind('keypress',function(){
		$('label[for="edt_newpass_confirm"]').html('Confirm:').show();
		$('#edt_newpass_confirm').val('').show();
	})
	$('#btn_update_userinfo').bind('click',function(){
		if ($('#edt_contactinfo').val()==''){new_avatar=true}
		sdk_contact_create(new_avatar);
		//sdk_user_update($('#edt_username').val(),$('#edt_useremail').val(),$('#edt_firstname').val(),$('#edt_lastname').val(),$('#edt_newpass').val(),$('#edt_newpass_confirm').val())
	})

	//修正HEADER的UER STATUS
	$('#loginstatus','Already a registered user? &nbsp;&nbsp; <a href="login.php" target="Frame_content">Log Out</a>');	
	
	//新增、更改聯絡的大頭照
	$('#edt_contactavatar').change(function(){
		new_avatar=true
		var files = this.files; // FileList object
		//alert('good')
		//建立縮圖
		// Loop through the FileList and render image files as thumbnails.
		for (var i = 0, f; f = files[i]; i++) {
	
		  // Only process image files.
		  if (!f.type.match('image.*')) {
			continue;
		  }
	
		  var reader = new FileReader();
	
		  // Closure to capture the file information.
		  reader.onload = (function(theFile) {
			return function(e) {
			  // Render thumbnail.
			  var span = document.createElement('span');
			  span.innerHTML = ['<img class="filequeuethumb" src="', e.target.result,
								'" title="', escape(theFile.name), '"/>'].join('');
			  //$('#list_'+photoindex).insertBefore(span, null);
			  $('#contactavatar').attr('src',e.target.result)
			};
		  })(f);
	
		  // Read in the image file as a data URL.
		  reader.readAsDataURL(f);
		}					
	})	
	
	
	
	
	//處理分頁頁面「PAGE」的各項功能函數
	//icon的選擇對話框
	$("#win_icon").dialog({
		autoOpen: false,
		width: "80%",
		modal: true,
		title: "Choose an icon"	
	});
	$("#win_icon img" ).bind("click",function(e){
		var iconname = e.currentTarget.alt
		$("#page_icon").val(iconname)
		//alert(iconname)
		$("#win_icon").dialog("close")
	});
	
	//設定、宣告新增PAGE的表格對話框（初始設定）
	$( "#dialog-form" ).dialog({
		autoOpen: false,
		width: 850,
		modal: true
	}).bind('dialogopen',function(){
		//顯示對話框時，依據Win_type調整顯示的欄位名稱及標題
		page_type.change();			
	});
	
	//處理物件新增的相關功能函數
	var max_win_id=$(0)
	$( "#create_new_page" ).button()
		.click(function() {
			new_window=true;
			//首先，找出最大的的win_id
			$( "#create_new_page").data("max_win_id",0)
			$('#current_pages tbody tr table tbody tr').each(function(e){
				if (parseInt($(this).attr('win_id'))>$( "#create_new_page").data("max_win_id")){
					$( "#create_new_page").data("max_win_id",$(this).attr('win_id'))
					}
				})		
			$('#current_pages tbody tr').each(function(e){
				if (parseInt($(this).attr('win_id'))>$( "#create_new_page").data("max_win_id")){
					$( "#create_new_page").data("max_win_id",$(this).attr('win_id'))
					}
				})
			//alert("Max Win_id:"+$( "#create_new_page").data("max_win_id"))
			
			//開啟對話框進行資料建立
			$( "#dialog-form" ).dialog({
				buttons: {
					"Create Page": function() {
						var bValid = true;
						allFields.removeClass( "ui-state-error" );			
						bValid = bValid && checkLength( page_title, "Page Title", 2, 16 );
						bValid = bValid && checkLength( content_title, "Content title", 2, 16 );			
						if (page_type.val() == 'TYPE_CUSTOMPAGE'){
								page_link.val($('#webpage_content').val().replace(/[\r\n\t]/g,"").replace(/"([^"]*)"/g, "'$1'"));					
							}
												
						if ( bValid ) {
							var data ='{"win_id": '+(parseInt($( "#create_new_page").data("max_win_id"))+1)+','+
							//var data ='("win_id":'+itemcount+','+
									  '"win_root_id": 0,'+
									  '"win_title":"'+page_title.val()+'",'+
									  '"win_icon":"'+page_icon.val()+'",'+
									  '"win_type":"'+page_type.val()+'",'+
										'"win_published":'+(page_published.attr('checked')?'true':'false')+','+
									  '"win_parameters":['+
										(page_show_title.attr('checked')?'true':'false')+','+
										(content_show_title.attr('checked')?'true':'false')+',"'+
										content_title.val()+'","'+
										page_link.val()+'","'+
										page_parameter_1.val()+'","'+
										page_parameter_2.val()+'","'+
										page_parameter_3.val()+'","'+
										page_parameter_4.val()+'"]}'							
							sdk_item_create(data);
							$( this ).dialog( "close" );
						}
					},
					Cancel: function() {
						$( this ).dialog( "close" );
					}
				},
				close: function() {
					$("#webpage_content_container").empty();
					new_window=false;
					allFields.val( "" ).removeClass( "ui-state-error" );
				}
			}).dialog( "open" );
	
		})
		
	$("#show_icon").bind("click", function(){
			$("#win_icon").dialog("open")
		});
	
	//當物件排序變更時顯示更新按鈕
	$( "#current_pages tbody" ).sortable({
			update:function(event,ui){
				$("#update_page_order").show()
			}
		});
	
	//修正物件排列順序功能函數
	/*
	$("#update_page_order").button().hide().bind('click',function(e){
			var tablewin_id=0;
			var in_table;
			var clientwin_id=101;
			var orderfields;
			var endtable=''
			$('#current_pages tbody tr').each(function(e) {
				//alert('length:'+$('#current_pages tbody tr').length+',Index:'+$(this).index()+' / Class:'+$(this).attr("class")+' / OBJID:'+$(this).attr("name"))
				if (typeof $(this).attr("name") != 'undefined'){
					var objid=$(this).attr("name")
				}
				
				orderfields='';

				if ( typeof $(this).attr("class")!='undefined' && typeof objid != 'undefined'){								
					if ($(this).attr("class") == "row_base" && objid.substring(0,10)!='endoftable' ){
						orderfields= '{"win_id":'+($(this).index() + 1)+', "win_root_id":0}'
					}
					if ($(this).attr("class") == "row_client" && objid.substring(0,10)!='endoftable' ){
						//alert('Base ID:'+tablewin_id+' / Client ID:'+clientwin_id)
						orderfields= '{"win_id":'+clientwin_id+', "win_root_id":'+tablewin_id+'}'
						clientwin_id+=1
					} else {
						tablewin_id=0;
						}
				}
				
				if (orderfields!=''){
					sdk_item_update_order(objid,orderfields)						 
				}

				switch ($(this).attr("win_type")){
					case "TYPE_TABLE":
						tablewin_id = ($(this).index() + 1)	
						break;
					case "TYPE_COVERFLOW":
						//tablewin_id = 0;					
					default:
						//tablewin_id = 0;
						break;
				}
			})
			$(this).hide()
		})
		*/
	$("#update_page_order").button().hide().bind('click',function(e){
			var tablewin_id=0;
			var in_table=[]
			var clientwin_id=[];
			var orderfields;
			var endtable=''
			var tablelevels=0
			in_table.push(0)
			clientwin_id.push(1)
			$('#current_pages tbody tr').each(function(e) {
				//alert('length:'+$('#current_pages tbody tr').length+',Index:'+$(this).index()+' / Class:'+$(this).attr("class")+' / OBJID:'+$(this).attr("name"))
				if (typeof $(this).attr("name") != 'undefined'){
					var objid=$(this).attr("name")
				}
				
				orderfields='';
				
				if ( typeof $(this).attr("class")!='undefined' && typeof objid != 'undefined'){				
					if (objid.substring(0,10)=='endoftable' ){
						if (tablelevels>0){	tablelevels-=1}
					} else {
						
						//in_table[tablelevels]=clientwin_id[tablelevels]
						
						if (tablelevels<=0){
							orderfields= '{"win_id":'+(clientwin_id[tablelevels])+', "win_root_id":'+in_table[0]+'}'
						} else {
							orderfields= '{"win_id":'+(clientwin_id[tablelevels])+', "win_root_id":'+in_table[tablelevels]+'}'
						}
						clientwin_id[tablelevels] += 1
					}
					//alert(orderfields)			

					//if (objid.substring(0,10)=='endoftable' ){
					//	tablelevels-=1
					//}
					
				}
				
				if (orderfields!=''){
					sdk_item_update_order(objid,orderfields)						 
				}

				switch ($(this).attr("win_type")){
					case "TYPE_TABLE":
						//tablewin_id = ($(this).index() + 1)	
						tablelevels+=1
						if (typeof clientwin_id[tablelevels] =='undefined'){
							clientwin_id[tablelevels]=tablelevels*100
						} else {
							clientwin_id[tablelevels]+=1
						}
						
						in_table[tablelevels]=clientwin_id[tablelevels-1]-1
						break;
					case "TYPE_COVERFLOW":
						//tablewin_id = 0;					
					default:
						//tablewin_id = 0;
						break;
				}
			})
			$(this).hide()
			//location.reload()
			alert('資料排序已更新完畢')
		})	
		
		
	//新增、修改物件參數時，Win_type的修正連動函數	
	page_type.bind('change',function(e){
		//預先隱藏顯示標題的參數欄位
		$("#tr_showcontenttitle").hide();
		$("#tr_showpagetitle").hide();
	
		$("#tr_pagelinkparameters1").hide()
		$("#tr_pagelinkparameters2").hide()
		$("#tr_pagelinkparameters3").hide()
		$("#tr_pagelinkparameters4").hide()			

				webpage_content.hide()
				webvideo_type.hide().bind('change',function(e){
						page_link.val('')
					})
				$('Label[for="pagelink"]').text('Page Link URL').show()
				$('Label[for="pagelinkparameters1"]').text('Link Parameters 1')
				//$("#webpage_content_container").val('')
				$("#webpage_content_container").empty();

		
		//alert(page_type.val())
		//$( "#pageinfo" ).css('width',300);
		$('Label[for="pagelinkcomment"]').html('').hide()
		$('Label[for="pagelinkparameters1comment"]').html('').hide()
		//page_link.show().val('')
		webpage_content.hide()
		webvideo_type.hide().bind('change',function(e){
				if (new_window){
					page_link.val('')
				}	
			})
		$('Label[for="pagelink"]').text('Page Link URL')
		$('Label[for="pagelinkparameters1"]').text('Link Parameters 1')
		//$("#webpage_content_container").val('')
		$("#webpage_content_container").empty();


		if (new_window){
			page_link.val('')
		}
		
		switch(page_type.val()){
			case "TYPE_WEBVIDEO":
			$('Label[for="pagelinkparameters1comment"]').html('提示：請輸入Youtube或Vimeo的影片ID<br />http://www.youtube.com/watch?v=<span style="color:red;">YFbyh0wzTS0</span><br />http://vimeo.com/<span style="color:red;">52889667</span>').show()
				page_link.hide().val('Youtube')
				webpage_content.hide().val('')
				webvideo_type.show()
					.bind('change',function(e){
						page_link.val($(this).val())
						})
				$('Label[for="pagelink"]').text('Video Source')
				$('Label[for="pagelinkparameters1"]').text('Video Clip ID')
				$("#tr_pagelinkparameters1").show()
				$("#webpage_content_container").val('')
				break;
			case "TYPE_CUSTOMPAGE":
				//$( "#pageinfo" ).css('width',400);
				page_link.hide().val('Youtube')
				webvideo_type.hide().unbind('change')
				//webpage_content.show().redactor()
				$("#webpage_content_container").append('<textarea name="webpage_content" id="webpage_content" class="tinymce" cols="40" rows="10"></textarea>')
				//$('#webpage_content').val(global_webpage_content)
				//$('#webpage_content').show().redactor()
				$('textarea.tinymce').tinymce({
                        // Location of TinyMCE script
                        script_url : '../../scripts/tinymce/jscripts/tiny_mce/tiny_mce.js',

                        // General options
                        theme : "advanced",
                        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                        // Theme options
                        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,ltr,rtl,|,fullscreen",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : true,

                        // Example content CSS (should be your site CSS)
                        content_css : "../../styles/tinymce/content.css",
/*
                        // Drop lists for link/image/media/template dialogs
                        template_external_list_url : "lists/template_list.js",
                        external_link_list_url : "lists/link_list.js",
                        external_image_list_url : "lists/image_list.js",
                        media_external_list_url : "lists/media_list.js",

                        // Replace values for the template plugin
                        template_replace_values : {
                                username : "Some User",
                                staffid : "991234"
                        }
*/
				});
				$('Label[for="pagelink"]').text('WebPage HTML Codes')
				break;
			case "TYPE_CONTACT":
				page_link.hide()
				$('Label[for="pagelink"]').hide()
				sdk_get_contatinfo(page_link)
				break;
			case "TYPE_COVERFLOW":
				page_link.hide()
				$('Label[for="pagelink"]').hide()
				break;	
			case "TYPE_ACCOUNT":
				page_link.hide()
				$('Label[for="pagelink"]').hide()
				break;
			case "TYPE_TABLE":
				page_link.hide()
				$('Label[for="pagelink"]').hide()
				break;																	
			case "TYPE_WEB":
				$('Label[for="pagelinkcomment"]').html('提示：輸入網址時，請一併填入<span style="color:red;">http://</span>或<span style="color:red;">https://</span>文字字樣').show()
				if (new_window){
						page_link.val('')
				}
				page_link.show()
				webpage_content.hide()
				webvideo_type.hide().bind('change',function(e){
						page_link.val('')
					})
				$('Label[for="pagelink"]').text('Page Link URL')
				$('Label[for="pagelinkparameters1"]').text('Link Parameters 1')
				//$("#webpage_content_container").val('')
				$("#webpage_content_container").empty();
				break;
			case "TYPE_RSS":
				$('Label[for="pagelinkcomment"]').html('提示：請使用合乎RSS XML 2.0格式的訂閱網址(****.xml)，<br />並請一併填入<span style="color:red;">http://</span>或<span style="color:red;">https://</span>文字字樣').show()
				if (new_window){
						page_link.val('')
				}
				page_link.show()
				webpage_content.hide()
				webvideo_type.hide().bind('change',function(e){
						page_link.val('')
					})
				$('Label[for="pagelink"]').text('Page Link URL')
				$('Label[for="pagelinkparameters1"]').text('Link Parameters 1')
				//$("#webpage_content_container").val('')
				$("#webpage_content_container").empty();
				break;
			case "TYPE_RSS2":
				$('Label[for="pagelinkcomment"]').html('提示：請使用合乎RSS XML 2.0格式的訂閱網址(****.xml)，<br />並請一併填入<span style="color:red;">http://</span>或<span style="color:red;">https://</span>文字字樣').show()
				if (new_window){
						page_link.val('')
				}
				page_link.show()
				webpage_content.hide()
				webvideo_type.hide().bind('change',function(e){
						page_link.val('')
					})
				$('Label[for="pagelink"]').text('Page Link URL')
				$('Label[for="pagelinkparameters1"]').text('Link Parameters 1')
				//$("#webpage_content_container").val('')
				$("#webpage_content_container").empty();
				break;				
								
			default: //RSS
				//alert('hide')
				$('Label[for="pagelinkcomment"]').html('提示：輸入網址時，請一併填入<span style="color:red;">http://</span>或<span style="color:red;">https://</span>文字字樣').show()
				break;
			}
		})

	//處理照片上傳相關功能函數
	//$("#filebrowse").hide();
	$("#dlg_photo_modify").dialog({
		autoOpen: false,
		width: "80%",
		modal: true,
		title: "Modify / Delete Photos"	
	});
	$('#cb_photowin').change(function(){
		//$('#uploaderqueue').remove('td')
			$('#filequeue tbody tr').remove()
			$(".jTscroller a").remove()
			sdk_photo_list($('#cb_photowin').val());
	})
	$('#addfilefield').click(function(){
		//var photoindex=$('tr[name="files"]').length;
		var photoindex=$(':file').length;

		var newfilefield = '<tr id="filequeuefile" height="80"><td width="75"><output id="list_'+(photoindex)+'"></output></td><td width="400">'+
							'<label for="edt_username">Description:</label><input type="text" id="edt_description_'+(photoindex)+'" />'+
							'<td><input type="file" name = "files" id="filebrowse_'+(photoindex)+'" /></td></tr>'
		$('#filequeue tbody').append(newfilefield)
	
		$('#filebrowse_'+photoindex).change( function(){
			var files = this.files; // FileList object
			// Loop through the FileList and render image files as thumbnails.
			for (var i = 0, f; f = files[i]; i++) {
			  // Only process image files.
			  if (!f.type.match('image.*')) {
				continue;
			  }
			  var reader = new FileReader();
			  // Closure to capture the file information.
			  reader.onload = (function(theFile) {
				return function(e) {
				  // Render thumbnail.
				  var span = document.createElement('span');
				  span.innerHTML = ['<img class="filequeuethumb" src="', e.target.result,
									'" title="', escape(theFile.name), '"/>'].join('');
				  document.getElementById('list_'+photoindex).insertBefore(span, null);
				};
			  })(f);
			  // Read in the image file as a data URL.
			  reader.readAsDataURL(f);
			}					
		})		
	})
	
	$('#filebrowsetrigger').click(function(){
		$("#filebrowse").change(function(){
			//alert('good')
			//$("#filebrowse").remove('#file')
			var uploadfiles= this.files;
			for (var i=0;i<uploadfiles.length;i++){
				var file=this.files[i]

				var photoindex=$(':file').length;

				var newfilefield = '<tr id="filequeuefile"><td><output id="list_'+(photoindex)+'"></output></td>'+
									'<td><input type="file" name = "files" id="filebrowse_'+(photoindex)+'" /><br>'+
									'<label for="edt_username">Description:</label><input type="text" id="edt_description_'+(photoindex)+'" /></tr>'
				$('#filequeue tbody').append(newfilefield)	
				$('#filebrowse_'+photoindex).change(function(){
					var files = evt.target.files; // FileList object
					//alert('good')
					//建立縮圖
					// Loop through the FileList and render image files as thumbnails.
					for (var i = 0, f; f = files[i]; i++) {
				
					  // Only process image files.
					  if (!f.type.match('image.*')) {
						continue;
					  }
				
					  var reader = new FileReader();
				
					  // Closure to capture the file information.
					  reader.onload = (function(theFile) {
						return function(e) {
						  // Render thumbnail.
						  var span = document.createElement('span');
						  span.innerHTML = ['<img class="filequeuethumb" src="', e.target.result,
											'" title="', escape(theFile.name), '"/>'].join('');
						  $('#list_'+photoindex).insertBefore(span, null);
						};
					  })(f);
				
					  // Read in the image file as a data URL.
					  reader.readAsDataURL(f);
					}					
				})
				
				$('#filebrowse_'+(i+1)).val(file.fileName)
			}
		}).click();
	})

	$('#sendfile').click(function(){
		$(':file').each(function(index, element) {
			if ($('#filebrowse_'+index).val()!= ''){
				//alert('filebrowse_'+index)
				var photo_fields = '{"win_id":"'+$('#cb_photowin').val()+'", "description":"'+$('#edt_description_'+index).val()+'"}'
				sdk_photo_create('filebrowse_'+index,photo_fields) 

			}
        });
	})

	
});  //End of Defalt Loading when document.ready


//建立縮圖
function h2andleFileSelect(fileid) {
	var files = fileid.files; // FileList object
	//alert('good')
	// Loop through the FileList and render image files as thumbnails.
	for (var i = 0, f; f = files[i]; i++) {

	  // Only process image files.
	  if (!f.type.match('image.*')) {
		continue;
	  }

	  var reader = new FileReader();

	  // Closure to capture the file information.
	  reader.onload = (function(theFile) {
		return function(e) {
		  // Render thumbnail.
		  var span = document.createElement('span');
		  span.innerHTML = ['<img class="filequeuethumb" src="', e.target.result,
							'" title="', escape(theFile.name), '"/>'].join('');
		  document.getElementById('list').insertBefore(span, null);
		};
	  })(f);

	  // Read in the image file as a data URL.
	  reader.readAsDataURL(f);
	}
}

//將已經上傳的照片加入縮圖列中
function add_photo_thumb(photoitem){
	//alert(photoitem)
	//alert('good')
	//alert(photoitem.id)
	
	//$(".jTscroller").append('<a href="#" linktype="photo" photoid="'+photoitem.id+'"><img src="'+photoitem.urls['square_75']+'" height="100" /></a>')
	$(".jTscroller").append('<a href="#" photoid="'+photoitem.id+'" ><img photoid="'+photoitem.id+'" src="'+photoitem.urls['square_75']+'" height="100" /></a>')

	
	$('img[photoid="'+photoitem.id+'"]').click(function(e){
		$('#edt_photo_desc').val(photoitem.custom_fields['description'])
		$('#dlg_photo_modify').dialog({
			autoOpen: false,
			height: 210,
			width: 550,
			modal: true,
			title: "Modify / Delete Photos",
			buttons: {
				"Update Description": function() {
					//alert('update')
					var photo_fields = '{"description":"'+$('#edt_photo_desc').val()+'"}'					
					sdk_photo_update(photoitem.id,photo_fields)
					$( this ).dialog( "close" );
				},
				"Delete this Photo": function() {
					var r=confirm("Really Want to Delete this Photo?");
					if (r==true)
					  {
					  	sdk_photo_delete(photoitem.id)
					  }
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					
					$( this ).dialog( "close" );
				}
			}		
		}).dialog( "open" )
		
		
		//alert(photoitem.id)
	})
	
	
    $("#ts2").thumbnailScroller({
        scrollerType:"hoverPrecise",
        scrollerOrientation:"horizontal",
        scrollSpeed:2,
        scrollEasing:"easeOutCirc",
        scrollEasingAmount:600,
        acceleration:4,
        scrollSpeed:800,
        noScrollCenterSpace:10,
        autoScrolling:0,
        autoScrollingSpeed:2000,
        autoScrollingEasing:"easeInOutQuad",
        autoScrollingDelay:500
    });



}

function remove_photo_thumb(data_id){
	$('a[photoid="'+data_id+'"]').remove('a')
}

//增加pages分頁中的視窗物件
function add_pages_row(rowindex,custome_window,user_id,tableview_root_id){
	if (typeof user_id =='undefined'){user_id=''}
	if (typeof tableview_root_id =='undefined'){tableview_root_id=0}
	//建立變數
	var tips = $( ".validateTips" ),
		page_title = $( "#page_title" ),
		content_title = $( "#content_title" ),
		page_link = $( "#page_link" ),
		page_icon = $('#page_icon'),
		page_show_title = $('#chk_showpagetitle'),
		content_show_title = $('#chk_showcontenttitle'),
		page_published = $('#chk_pagepublished'),
		page_parameter_1 = $('#page_link_parameters_1'),
		page_parameter_2 = $('#page_link_parameters_2'),
		page_parameter_3 = $('#page_link_parameters_3'),
		page_parameter_4 = $('#page_link_parameters_4'),
		page_type = $('#page_type'),
		webvideo_type = $('#webvideo_type'),
		webpage_content = $('#webpage_content'),	//	webpage_content is ready to be deleted
		allFields = $( [] ).add( page_title ).add( content_title ).add( page_link ).add(page_icon).add(page_show_title).add(content_show_title).add(page_published).add(page_parameter_1).add(page_parameter_2).add(page_parameter_3).add(page_parameter_4).add(page_type).add(webvideo_type).add(webpage_content)
	
	//win_id='+custome_window.win_id+'
	//新建列資料			
	var rowdata;
	if (custome_window.win_root_id!=0){
		//建立列表式子視窗物件資料  
		if (custome_window.win_type == 'TYPE_TABLE'){
			//建立列表式視窗物件(資料抬頭)
			rowdata = '<tr height="25" class="row_client" name="'+custome_window.id+'" win_type="'+custome_window.win_type+'"><td colspan="5"><table id="rowbase_pages" align="right"  width="95%"><thead height="25" >'
		} else {
		
			rowdata= '<tr height="25" name="'+custome_window.id+'" win_id='+custome_window.win_id+' win_root_id='+custome_window.win_root_id+' win_type="'+custome_window.win_type+'" class="row_client">'
		}
	} else {
		if (custome_window.win_type == 'TYPE_TABLE'){
			//建立列表式視窗物件(資料抬頭)
			rowdata = '<tr height="25" class="row_base" name="'+custome_window.id+'" win_type="'+custome_window.win_type+'"><td colspan="5"><table id="client_pages" class="win_client" width="100%"><thead height="25" >'
		} else {
			
			rowdata= '<tr height="25" name="'+custome_window.id+'" win_id='+custome_window.win_id+' win_root_id='+custome_window.win_root_id+' win_type="'+custome_window.win_type+'" class="row_base">'
		}
	}
	rowdata += 	("<td width='20%' align='left'>" + custome_window.win_title + "</td>" + 
				"<td width='25%'>" + custome_window.win_type + "</td>" + 
				"<td width='25%'>" + custome_window.win_parameters[2] + "</td>" +
				//"<td>" + custome_window.win_parameters[0] + "</td>"+
				//"<td>" + custome_window.win_parameters[1] + "</td>"+		
				"<td width='10%'>"+
					'<div class="page_icon_infobutton_'+rowindex+'">'+
						"<button name='"+custome_window.id+"' id='btn_win_up_"+rowindex+"'>Parameters</button></td>"+
					'</div>' +
				"<td width='20%'>"+
					'<div class="page_icon_button_'+rowindex+'">'+ 
						//'<button name="'+custome_window.id+'" id="btn_win_up_'+rowindex+'">Move Up</button>&nbsp;' +
						'<button name="'+custome_window.id+'" id="btn_win_modify_'+rowindex+'">Mofify</button>&nbsp;' +
						//'<button name="'+custome_window.id+'" id="btn_win_down_'+rowindex+'">Move Down</button>&nbsp;' +
						'&nbsp;&nbsp;&nbsp;&nbsp;'+
						'<button name="'+custome_window.id+'" id="btn_win_delete_'+rowindex+'">Delete</button>' +
					'</div>' +
				"</td>")
				
	if (custome_window.win_type == 'TYPE_TABLE'){
		//建立列表式視窗物件(資料抬頭)			
		rowdata += ("</thead><tbody><tr height='15'  name='endoftable_"+custome_window.win_id+"' class='row_client nosort'><td colspan='5'  width='100%'>End of Table Win</td></tr></tbody></table></td></tr>" )
	} else {
		rowdata += ("</tr>" )
	}
	
	
	if (custome_window.win_root_id != 0){

		//建立列表式子視窗物件資料
		$('tr[name="endoftable_'+custome_window.win_root_id+'"]').before(rowdata)
		
	} else {
		//建立一般視窗物件資料
		$( "#current_pages tbody" ).first().append(rowdata)
	}
	
	//當物件排序變更時顯示更新按鈕
	$( "#current_pages tbody,#rowbase_pages tbody,#client_pages tbody" ).sortable({
			cancel: ".nosort",
			//tolerance: 'pointer',
			//grid: [500, 120],
			//distance: 50,
			//scrollSensitivity: 100,
			connectWith: ".ui-sortable",
			//forcePlaxeHolderSize:true,
			update:function(event,ui){
				$("#update_page_order").show()
				$( "#current_pages tbody tr" ).removeClass('row_client');
				$( "#current_pages tbody tr" ).addClass('row_base');
				//$( "#current_pages tbody tr" ).removeClass('row_base');
				//$( "#current_pages tbody tr" ).addClass('row_client');
				//$( "#rowbase_pages tbody tr" ).removeClass('row_client');
				//$( "#rowbase_pages tbody tr" ).addClass('row_base');				
				$( "#current_pages tbody tr td table[id='rowbase_pages'] tbody tr" ).removeClass('row_base');
				$( "#current_pages tbody tr td table[id='rowbase_pages'] tbody tr" ).addClass('row_client');
				
				$( "#client_pages tbody tr" ).removeClass('row_base');
				$( "#client_pages tbody tr" ).addClass('row_client');	
				$('table thead tr').removeClass('row_client')
				$('table thead tr').addClass('row_base')
				//$( "#rowbase_pages tbody tr" ).addClass('row_base');
			}
		});
	
	//判斷:如果是照片視窗的話在照片分頁增加分頁的資料
	if (custome_window.win_type == 'TYPE_COVERFLOW'){
		$('#cb_photowin').append( new Option(custome_window.win_title,custome_window.id) );
		//預先載入縮圖照片一次，避免Scroller顯示問題
		//$('#filequeue tbody tr').remove()
		//$(".jTscroller a").remove()
		//sdk_photo_list($('#cb_photowin').val());		
	}
	
	//Info Buttons 模組視窗的參數資訊按鈕設定	
	$('.page_icon_infobutton_'+rowindex+' button:first').button({
			icons: {primary: "ui-icon-info"},
			text: false		
		}).bind('click',function(e){
			alert('parameters:\n\n '+
				//(custome_window.win_parameters[0]?'Show Page Title':'Hide Page Title')+ '\n '+
				//(custome_window.win_parameters[1]?'Show Content Title':'Hide Content Title')+ '\n '+
				(custome_window.win_parameters[3]?custome_window.win_parameters[3]:'')+ '\n '+
				(custome_window.win_parameters[4]?custome_window.win_parameters[4]:'')+'\n '+
				(custome_window.win_parameters[4]?custome_window.win_parameters[5]:'')+'\n '+
				(custome_window.win_parameters[4]?custome_window.win_parameters[6]:'')+'\n '+
				(custome_window.win_parameters[5]?custome_window.win_parameters[7]:''))
		})
			
//	$('.page_icon_button_'+rowindex+' button:first').button({
//			icons: {primary: "ui-icon-triangle-1-n"},
//			text: false		
//		}).bind('click',function(e){
//			alert('Move Up this Page?')
//		}).next().button({

	//Modify Buttons 模組視窗的參數修正按鈕設定	
	$('.page_icon_button_'+rowindex+' button:first').button({
					
			icons: {primary: "ui-icon-gear"},
			text: false		
		}).bind('click',function(e){
			//布林變數確認為舊資料，需導入網址
			new_window=false;
			//進行視窗參數資料修正工作
			//alert('Modify this Page?')
			//press_modify_button($(this).prop('name'))
			//將原所屬資料預先載入相關欄位中	
			page_title.val(custome_window.win_title);
			page_icon.val(custome_window.win_icon);
			page_type.val(custome_window.win_type);
			page_published.val(custome_window.win_published);
			//page_type.change();
			
			content_title.val(custome_window.win_parameters[2]);
			
			if (custome_window.win_type=='TYPE_WEBVIDEO'){
				page_link.val(custome_window.win_parameters[3])
			} else {
				page_link.val(custome_window.win_parameters[3])
			}
	
			if (custome_window.win_type=='TYPE_CUSTOMPAGE'){
				//global_webpage_content = page_link.val()
				webpage_content.val(page_link.val())
			}
			page_show_title.text(custome_window.win_parameters[0]);
			content_show_title.val(custome_window.win_parameters[1]);
			page_parameter_1.val(custome_window.win_parameters[4]);
			page_parameter_2.val(custome_window.win_parameters[5]);
			page_parameter_3.val(custome_window.win_parameters[6]);
			page_parameter_4.val(custome_window.win_parameters[7]);
			
			//page_show_title.hide();
			//content_show_title.hide();
			//$("label[for*='chk_']").hide();

			$('#dialog-form').dialog({
				buttons: {
					"Modify Page": function() {
						var bValid = true;
						//var allFields = $([])
						allFields.removeClass( "ui-state-error" );			
						bValid = bValid && checkLength( page_title, "Page Title", 3, 16 );
						bValid = bValid && checkLength( content_title, "Content title", 3, 16 );

						if (page_type.val() == 'TYPE_CUSTOMPAGE'){
								page_link.val($('#webpage_content').val().replace(/[\r\n\t]/g,"").replace(/"([^"]*)"/g, "'$1'"));					
							}		

						if ( bValid ) {
							var data ='{"win_title":"'+page_title.val()+'",'+
									  '"win_icon":"'+page_icon.val()+'",'+
									  '"win_type":"'+page_type.val()+'",'+
										'"win_published":'+(page_published.attr('checked')?'true':'false')+','+
									  '"win_parameters":['+
										(page_show_title.attr('checked')?'true':'false')+','+
										(content_show_title.attr('checked')?'true':'false')+',"'+
										content_title.val()+'","'+
										page_link.val()+'","'+
										page_parameter_1.val()+'","'+
										page_parameter_2.val()+'","'+
										page_parameter_3.val()+'","'+
										page_parameter_4.val()+'"]}'							
							sdk_item_update(custome_window.id,data,$( '#current_pages tbody tr[name="'+custome_window.id+'"]' ),rowindex);
							$( this ).dialog( "close" );
						}
					},
					Cancel: function() {
						$( this ).dialog( "close" );
					}
				},
				close: function() {
					$("#webpage_content_container").empty();
					new_window=false;
					allFields.val( "" ).removeClass( "ui-state-error" );
				}					
			}).bind('dialogopen',function(){
				//顯示對話框時，依據Win_type調整顯示的欄位名稱及標題
				//page_type.change();
		
				if (custome_window.win_type=='TYPE_CUSTOMPAGE'){
					//global_webpage_content = page_link.val()
					$('#webpage_content').val(custome_window.win_parameters[3])
				}		
			}).dialog("open")	
	
		}).next().button({
			//Delete Button
			icons: {primary: "ui-icon-circle-minus"},
			text: false
		}).bind('click',function(e){
			//alert('Delete this Page?'+$(this).prop('name'))
			//alert('Delete this Page?')
			//alert(custome_window.user['id'])
			sdk_item_delete($(this).prop('name'),$( '#current_pages tbody tr[name="'+custome_window.id+'"]' ),custome_window.user['id'],custome_window.win_id)
		})
		
		//If new Client Table then create new 
		/*
		if (tableview_root_id) {
			sdk_item_list(user_id,tableview_root_id)		
		}
		*/
		$('table thead tr').addClass('row_base')
}

</script>
<!-- InstanceEndEditable -->
</head>

<body class="oneColLiqCtr">

<div id="container">
  <div id="mcmsHeader">
    <?php include("../../includes/header.html"); ?> 
  </div>
  
  <div id="mainContent">

    <div id="blockSpacing"></div>	
  	
    <!-- 首頁的SLide Bar -->
		<!-- InstanceBeginEditable name="slideBar" -->
		<!-- InstanceEndEditable -->
    
    <div id="blockSpacing"></div>
    
    <!-- 功能特色區塊 -->
		<!-- InstanceBeginEditable name="beforeDocContent" -->
    <!-- InstanceEndEditable -->
    
    <!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
    <!-- InstanceBeginEditable name="docContent" -->
<!--jQuery UI Tabs configurations -->
<div id="tabs">
	<!--Tab Titles -->
	<ul>
		<li><a href="#tabs-1">User info</a></li>
		<li><a href="#tabs-2">Pages</a></li>
        <li><a href="#tabs-3">Photos</a></li>
	</ul>
    <!--Tab Contents created by div  -->
	<div id="tabs-1" class="ui-corner-all">
		<p>
    	<!--
	    <p><label for="edt_username">Username:</label>
		  <input type="text" name="edt_username" id="edt_username" /></p>
          <p><label for="edt_useremail">User eMail:</label>
		  <input name="edt_useremail" type="text" id="edt_useremail" readonly="readonly" /></p>
      -->
		  <p><label for="edt_firstname">First Name:</label>
		  <input type="text" name="edt_firstname" id="edt_firstname" /></p>
		  <p><label for="edt_lastname">Last Name:</label>
		  <input type="text" name="edt_lastname" id="edt_lastname" /></p>
		  <p><label for="edt_newpass">New Password:</label>
		  <input type="password" name="edt_newpass" id="edt_newpass" /></p>
		  <p><label for="edt_newpass_confirm" >reType:</label>
		  <input type="password" name="edt_newpass_confirm" id="edt_newpass_confirm" /></p>
		  <p>------------- Contact Info -----------</p>
          <p><input type="text" name="edt_contactinfo" id="edt_contactinfo" hidden=true/></p>
          <p><img id="contactavatar" src="http://www.lcsd.gov.hk/CE/Museum/Space/Image/space.gif" height="100"/></p>
		  <p><label for="edt_contactavatar">Head Logo:</label><input type="file" name = "edt_contactavatar" id="edt_contactavatar" /></p>          
		  <p><label for="edt_contactname">Contact Name:</label>
		  <input type="text" name="edt_contactname" id="edt_contactname" /></p>
          <p><label for="edt_contactemail">Contact eMail:</label>
		  <input name="edt_contactemail" type="text" id="edt_contactemail" /></p>
		  <p><label for="edt_contactphone">Phone Number:</label>
		  <input type="text" name="edt_contactphone" id="edt_contactphone" /></p>
		  <p><label for="edt_contactaddress">Address:</label>
		  <input type="text" name="edt_contactaddress" id="edt_contactaddress" /></p>          
	    <center>
	    <input name="btn_update_userinfo" id="btn_update_userinfo" type="button" class="content" value="Update My Info" /></center>
	    </p>
	</div>
    
	<div id="tabs-2">
		<p> 
        <div id="users-contain" class="ui-widget">
          <h1>Current Pages:</h1>
          <p>          
<!--          <table width="95%" align="center" class="ui-widget ui-widget-content win_base" id="current_pages">-->
          <table width="95%" align="center" class="win_base" id="current_pages">
                <thead>
                    <tr class="ui-widget-header ">
                        <th>Page Title</th>
                        <th>Page Type</th>
                        <th>Content Title</th>
                        <!--
                        <th >Content Link</th>
                        <th >Show Page Title</th>
                        <th >Show Content Title</th>
                        -->
                        <th width=20>Parameters</th>
                        <th>Controls</th>
                    </tr>
            </thead>
                <tbody>
<!--                    <tr>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td id="current_pages">johndoe1</td>
                        <td>
                            <div class="page_icon_button">
                                <button>Move Up</button>&nbsp;
                                <button>Mofify</button>&nbsp;
                                <button>Move Down</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button>Delete</button>
                            </div>                        
						</td>
                    </tr> -->
                </tbody>
          </table></p>
          <p>
          <button id="update_page_order">Update Page Order</button></p>            
          <p>
          <button id="create_new_page">Create New Page</button></p>            
        </div>
        <!--div for new page dialog -->
        <div id="pageinfo">
            <div id="dialog-form" title="Page Property">
                <p class="validateTips">Please input all required fields.</p>
                <fieldset>
                  <table width="95%" border="0" cellpadding="5" cellspacing="5">
                      <tr>
                        <td align="right"><label for="name">Page Title</label></td>
                        <td width=70% align="left"><input type="text" name="pagetitle" id="page_title" class="text ui-widget-content ui-corner-all" /></td>
                      </tr>
                      <tr>
                        <td align="right"><label for="name">Page Icon</label></td>
                        <td align="left"><input name="pageicon" type="text" class="text ui-widget-content ui-corner-all" id="page_icon" size="15" />
                        	<input type="button" name="show_icon" id="show_icon" value="Choose..."/>
                            </td>
                      </tr>
                      <tr>
                        <td align="right"><label for="page_type">Page Type</label></td>
                        <td align="left"><select name="select" id="page_type">
                                            <option value="none">--Select Page Type</option>
                                            <option value="TYPE_WEB">Web Page</option>
                                            <option value="TYPE_WEBVIDEO">Web Video</option>
                                            <option value="TYPE_CUSTOMPAGE">HTML Page</option>
                                            <option value="TYPE_COVERFLOW">Photos (Coverflow)</option>
                                            <option value="TYPE_CONTACT">Contact info.</option>
                                            <option value="TYPE_ACCOUNT">User Account</option>
                                            <option value="TYPE_TABLE">Table List</option>
                                            <option value="TYPE_RSS">RSS Type I</option>
                                            <option value="TYPE_RSS2">RSS Type II</option>
                                          </select>
                        	</td>
                      </tr>
                      <tr id="tr_showpagetitle">
                        <td align="right"><label for="chk_showpagetitle">Show Page Title</label></td>
                        <td align="left"><input name="chk_showpagetitle" id="chk_showpagetitle" type="checkbox" value="" checked="checked" /></td>
                      </tr>
                      <tr id="tr_showcontenttitle">
                        <td align="right"><label for="chk_showcontenttitle">Show Content Title</label></td>
                        <td align="left"><input name="chk_showcontenttitle" id="chk_showcontenttitle" type="checkbox" value="" checked="checked" /></td>
                      </tr> 
                      <tr>
                        <td align="right"><label for="name">Content Title</label></td>
                        <td align="left"><input type="text" name="contenttitle" id="content_title" class="text ui-widget-content ui-corner-all" /></td>
                      </tr>
                      <tr id="tr_pagepublished">
                        <td align="right"><label for="chk_pagepublished">Publish This Page</label></td>
                        <td align="left"><input name="chk_pagepublished" id="chk_pagepublished" type="checkbox" value="" checked="checked" /></td>
                      </tr>                      
                      <tr>
                        <td align="right"><label for="pagelink">Page Link URL</label></td>
                        <td align="left"><input type="text" name="pagelink" id="page_link" class="text ui-widget-content ui-corner-all" size=85 />
                          <select name="webvideo_type" id="webvideo_type">
                          <option value="Youtube">Youtube</option>
                          <option value="Vimeo">Vimeo</option>
                        </select><div id="webpage_content_container"></div>
                        <!-- 
                        <textarea name="webpage_content" id="webpage_content" cols="40" rows="10"></textarea>
                        -->
                        <label for="pagelinkcomment">comment</label>
                        </td>
                      </tr>                                            

                      <tr id="tr_pagelinkparameters1">
                        <td align="right"><label for="pagelinkparameters1">Link Parameters 1</label></td>
                        <td align="left">
                        		<input type="text" name="pagelinkparameters1" id="page_link_parameters_1" class="text ui-widget-content ui-corner-all" /><br />
                            <label for="pagelinkparameters1comment">comment</label>
                        </td>
                      </tr>
                      <tr id="tr_pagelinkparameters2">
                        <td align="right"><label for="pagelinkparameters2">Link Parameters 2</label></td>
                        <td align="left"><input type="text" name="pagelinkparameters2" id="page_link_parameters_2" class="text ui-widget-content ui-corner-all" /></td>
                      </tr>
                      <tr id="tr_pagelinkparameters3">
                        <td align="right"><label for="pagelinkparameters_3">Link Parameters 3</label></td>
                        <td align="left"><input type="text" name="pagelinkparameters_3" id="page_link_parameters_3" class="text ui-widget-content ui-corner-all" /></td>
                      </tr>
                      <tr id="tr_pagelinkparameters4">
                        <td align="right"><label for="pagelinkparameters_4">Link Parameters 4</label></td>
                        <td align="left"><input type="text" name="pagelinkparameters_4" id="page_link_parameters_4" class="text ui-widget-content ui-corner-all" /></td>
                      </tr>                      
                  </table>
                </fieldset>
            </div>
        <!-- modal window showing win icons -->
        <div id="win_icon" >
            <img src="../../images/icons/about.png" alt="about" />
            <img src="../../images/icons/access.png" alt="access" />
            <img src="../../images/icons/activity.png" alt="activity" />
            <img src="../../images/icons/add.png" alt="add" />
            <img src="../../images/icons/address-book.png" alt="address-book" />
            <img src="../../images/icons/airport.png" alt="airport" />
            <img src="../../images/icons/alarm.png" alt="alarm" />
            <img src="../../images/icons/alert.png" alt="alert" />
            <img src="../../images/icons/alt.png" alt="alt" />
            <img src="../../images/icons/anchor.png" alt="anchor" />
            <img src="../../images/icons/announce.png" alt="announce" />
            <img src="../../images/icons/antivirus.png" alt="antivirus" />
            <img src="../../images/icons/asterisk.png" alt="asterisk" />
            <img src="../../images/icons/attachment.png" alt="attachment" />
            <img src="../../images/icons/axis-x-y.png" alt="axis-x-y" />
            <img src="../../images/icons/badge.png" alt="badge" />
            <img src="../../images/icons/bag.png" alt="bag" />
            <img src="../../images/icons/baggage.png" alt="baggage" />
            <img src="../../images/icons/balance.png" alt="balance" />
            <img src="../../images/icons/bank.png" alt="bank" />
            <img src="../../images/icons/barcode.png" alt="barcode" />
            <img src="../../images/icons/basket.png" alt="basket" />
            <img src="../../images/icons/battery-empty.png" alt="battery-empty" />
            <img src="../../images/icons/battery-full.png" alt="battery-full" />
            <img src="../../images/icons/bicycle.png" alt="bicycle" />
            <img src="../../images/icons/blog.png" alt="blog" />
            <img src="../../images/icons/bluetooth.png" alt="bluetooth" />
            <img src="../../images/icons/book.png" alt="book" />
            <img src="../../images/icons/book-alt.png" alt="book-alt" />
            <img src="../../images/icons/bookmark.png" alt="bookmark" />
            <img src="../../images/icons/books.png" alt="books" />
            <img src="../../images/icons/box.png" alt="box" />
            <img src="../../images/icons/box-alt.png" alt="box-alt" />
            <img src="../../images/icons/briefcase.png" alt="briefcase" />
            <img src="../../images/icons/brush.png" alt="brush" />
            <img src="../../images/icons/bug.png" alt="bug" />
            <img src="../../images/icons/bussiness-card.png" alt="bussiness-card" />
            <img src="../../images/icons/cake.png" alt="cake" />
            <img src="../../images/icons/calculator.png" alt="calculator" />
            <img src="../../images/icons/calendar.png" alt="calendar" />
            <img src="../../images/icons/cancel.png" alt="cancel" />
            <img src="../../images/icons/cart.png" alt="cart" />
            <img src="../../images/icons/chair.png" alt="chair" />
            <img src="../../images/icons/chat.png" alt="chat" />
            <img src="../../images/icons/chat-active.png" alt="chat-active" />
            <img src="../../images/icons/check.png" alt="check" />
            <img src="../../images/icons/checkbox.png" alt="checkbox" />
            <img src="../../images/icons/checkbox-empty.png" alt="checkbox-empty" />
            <img src="../../images/icons/city.png" alt="city" />
            <img src="../../images/icons/code.png" alt="code" />
            <img src="../../images/icons/color-picker.png" alt="color-picker" />
            <img src="../../images/icons/color-swatch.png" alt="color-swatch" />
            <img src="../../images/icons/comment.png" alt="comment" />
            <img src="../../images/icons/compass.png" alt="compass" />
            <img src="../../images/icons/compress.png" alt="compress" />
            <img src="../../images/icons/computer.png" alt="computer" />
            <img src="../../images/icons/computer-laptop.png" alt="computer-laptop" />
            <img src="../../images/icons/computer-retro.png" alt="computer-retro" />
            <img src="../../images/icons/connect.png" alt="connect" />
            <img src="../../images/icons/connection-error.png" alt="connection-error" />
            <img src="../../images/icons/construction.png" alt="construction" />
            <img src="../../images/icons/content.png" alt="content" />
            <img src="../../images/icons/controls.png" alt="controls" />
            <img src="../../images/icons/copy.png" alt="copy" />
            <img src="../../images/icons/counter.png" alt="counter" />
            <img src="../../images/icons/cup.png" alt="cup" />
            <img src="../../images/icons/cut.png" alt="cut" />
            <img src="../../images/icons/database.png" alt="database" />
            <img src="../../images/icons/database-add.png" alt="database-add" />
            <img src="../../images/icons/database-download.png" alt="database-download" />
            <img src="../../images/icons/database-reload.png" alt="database-reload" />
            <img src="../../images/icons/database-remove.png" alt="database-remove" />
            <img src="../../images/icons/database-upload.png" alt="database-upload" />
            <img src="../../images/icons/delete.png" alt="delete" />
            <img src="../../images/icons/directions.png" alt="directions" />
            <img src="../../images/icons/display.png" alt="display" />
            <img src="../../images/icons/display-mac.png" alt="display-mac" />
            <img src="../../images/icons/document.png" alt="document" />
            <img src="../../images/icons/document-empty.png" alt="document-empty" />
            <img src="../../images/icons/document-new.png" alt="document-new" />
            <img src="../../images/icons/documents.png" alt="documents" />
            <img src="../../images/icons/door.png" alt="door" />
            <img src="../../images/icons/door-closed.png" alt="door-closed" />
            <img src="../../images/icons/download.png" alt="download" />
            <img src="../../images/icons/drawer.png" alt="drawer" />
            <img src="../../images/icons/drawers.png" alt="drawers" />
            <img src="../../images/icons/drill.png" alt="drill" />
            <img src="../../images/icons/drive-network.png" alt="drive-network" />
            <img src="../../images/icons/edit.png" alt="edit" />
            <img src="../../images/icons/edit-document.png" alt="edit-document" />
            <img src="../../images/icons/elevator.png" alt="elevator" />
            <img src="../../images/icons/enter.png" alt="enter" />
            <img src="../../images/icons/eraser.png" alt="eraser" />
            <img src="../../images/icons/ethernet.png" alt="ethernet" />
            <img src="../../images/icons/export.png" alt="export" />
            <img src="../../images/icons/facebook.png" alt="facebook" />
            <img src="../../images/icons/favourite.png" alt="favourite" />
            <img src="../../images/icons/favourite-add.png" alt="favourite-add" />
            <img src="../../images/icons/file.png" alt="file" />
            <img src="../../images/icons/file-add.png" alt="file-add" />
            <img src="../../images/icons/file-download.png" alt="file-download" />
            <img src="../../images/icons/file-edit.png" alt="file-edit" />
            <img src="../../images/icons/file-remove.png" alt="file-remove" />
            <img src="../../images/icons/files.png" alt="files" />
            <img src="../../images/icons/file-upload.png" alt="file-upload" />
            <img src="../../images/icons/filter.png" alt="filter" />
            <img src="../../images/icons/fire.png" alt="fire" />
            <img src="../../images/icons/firewall.png" alt="firewall" />
            <img src="../../images/icons/firewire.png" alt="firewire" />
            <img src="../../images/icons/first-aid.png" alt="first-aid" />
            <img src="../../images/icons/flag.png" alt="flag" />
            <img src="../../images/icons/folder.png" alt="folder" />
            <img src="../../images/icons/folder-open.png" alt="folder-open" />
            <img src="../../images/icons/font.png" alt="font" />
            <img src="../../images/icons/food.png" alt="food" />
            <img src="../../images/icons/ftp.png" alt="ftp" />
            <img src="../../images/icons/full-screen.png" alt="full-screen" />
            <img src="../../images/icons/full-screen-exit.png" alt="full-screen-exit" />
            <img src="../../images/icons/gameboy.png" alt="gameboy" />
            <img src="../../images/icons/games.png" alt="games" />
            <img src="../../images/icons/gift.png" alt="gift" />
            <img src="../../images/icons/grid.png" alt="grid" />
            <img src="../../images/icons/grid-dot.png" alt="grid-dot" />
            <img src="../../images/icons/hammer.png" alt="hammer" />
            <img src="../../images/icons/hardware-chip.png" alt="hardware-chip" />
            <img src="../../images/icons/hardware-processor.png" alt="hardware-processor" />
            <img src="../../images/icons/hedge.png" alt="hedge" />
            <img src="../../images/icons/help.png" alt="help" />
            <img src="../../images/icons/help-alt.png" alt="help-alt" />
            <img src="../../images/icons/hierarchy.png" alt="hierarchy" />
            <img src="../../images/icons/high-definition.png" alt="high-definition" />
            <img src="../../images/icons/home.png" alt="home" />
            <img src="../../images/icons/icecream.png" alt="icecream" />
            <img src="../../images/icons/idea.png" alt="idea" />
            <img src="../../images/icons/info.png" alt="info" />
            <img src="../../images/icons/i-phone.png" alt="i-phone" />
            <img src="../../images/icons/i-pod.png" alt="i-pod" />
            <img src="../../images/icons/key.png" alt="key" />
            <img src="../../images/icons/lamp.png" alt="lamp" />
            <img src="../../images/icons/layers.png" alt="layers" />
            <img src="../../images/icons/layout.png" alt="layout" />
            <img src="../../images/icons/layout-content.png" alt="layout-content" />
            <img src="../../images/icons/layout-header.png" alt="layout-header" />
            <img src="../../images/icons/layout-sidebar.png" alt="layout-sidebar" />
            <img src="../../images/icons/license-key.png" alt="license-key" />
            <img src="../../images/icons/link.png" alt="link" />
            <img src="../../images/icons/link-broken.png" alt="link-broken" />
            <img src="../../images/icons/list.png" alt="list" />
            <img src="../../images/icons/list-numbered.png" alt="list-numbered" />
            <img src="../../images/icons/list-ordered.png" alt="list-ordered" />
            <img src="../../images/icons/location.png" alt="location" />
            <img src="../../images/icons/login.png" alt="login" />
            <img src="../../images/icons/logout.png" alt="logout" />
            <img src="../../images/icons/mail.png" alt="mail" />
            <img src="../../images/icons/mail-inbox.png" alt="mail-inbox" />
            <img src="../../images/icons/mail-sent.png" alt="mail-sent" />
            <img src="../../images/icons/man.png" alt="man" />
            <img src="../../images/icons/map.png" alt="map" />
            <img src="../../images/icons/map-marker-pin.png" alt="map-marker-pin" />
            <img src="../../images/icons/MD-audio.png" alt="MD-audio" />
            <img src="../../images/icons/MD-camera-photo.png" alt="MD-camera-photo" />
            <img src="../../images/icons/MD-camera-video.png" alt="MD-camera-video" />
            <img src="../../images/icons/MD-headphones.png" alt="MD-headphones" />
            <img src="../../images/icons/MD-headphones-mic.png" alt="MD-headphones-mic" />
            <img src="../../images/icons/MD-microphone.png" alt="MD-microphone" />
            <img src="../../images/icons/MD-photo.png" alt="MD-photo" />
            <img src="../../images/icons/MD-photos.png" alt="MD-photos" />
            <img src="../../images/icons/MD-reload.png" alt="MD-reload" />
            <img src="../../images/icons/MD-repeat.png" alt="MD-repeat" />
            <img src="../../images/icons/MD-tv.png" alt="MD-tv" />
            <img src="../../images/icons/MD-video.png" alt="MD-video" />
            <img src="../../images/icons/MD-volume-1.png" alt="MD-volume-1" />
            <img src="../../images/icons/MD-volume-2.png" alt="MD-volume-2" />
            <img src="../../images/icons/MD-volume-3.png" alt="MD-volume-3" />
            <img src="../../images/icons/MD-volume-down.png" alt="MD-volume-down" />
            <img src="../../images/icons/MD-volume-up.png" alt="MD-volume-up" />
            <img src="../../images/icons/medal.png" alt="medal" />
            <img src="../../images/icons/mobile.png" alt="mobile" />
            <img src="../../images/icons/module.png" alt="module" />
            <img src="../../images/icons/moleskine.png" alt="moleskine" />
            <img src="../../images/icons/navigation.png" alt="navigation" />
            <img src="../../images/icons/network.png" alt="network" />
            <img src="../../images/icons/no.png" alt="no" />
            <img src="../../images/icons/node.png" alt="node" />
            <img src="../../images/icons/notepad.png" alt="notepad" />
            <img src="../../images/icons/open-in-new-window.png" alt="open-in-new-window" />
            <img src="../../images/icons/padlock-closed.png" alt="padlock-closed" />
            <img src="../../images/icons/padlock-open.png" alt="padlock-open" />
            <img src="../../images/icons/paintroller.png" alt="paintroller" />
            <img src="../../images/icons/park-bench.png" alt="park-bench" />
            <img src="../../images/icons/paste.png" alt="paste" />
            <img src="../../images/icons/pattern.png" alt="pattern" />
            <img src="../../images/icons/pen.png" alt="pen" />
            <img src="../../images/icons/pill.png" alt="pill" />
            <img src="../../images/icons/plugin.png" alt="plugin" />
            <img src="../../images/icons/plugin-disabled.png" alt="plugin-disabled" />
            <img src="../../images/icons/podcast.png" alt="podcast" />
            <img src="../../images/icons/pollution.png" alt="pollution" />
            <img src="../../images/icons/power-off.png" alt="power-off" />
            <img src="../../images/icons/power-on.png" alt="power-on" />
            <img src="../../images/icons/power-on-off.png" alt="power-on-off" />
            <img src="../../images/icons/power-standby.png" alt="power-standby" />
            <img src="../../images/icons/preferences.png" alt="preferences" />
            <img src="../../images/icons/presentation.png" alt="presentation" />
            <img src="../../images/icons/print.png" alt="print" />
            <img src="../../images/icons/printer-preview.png" alt="printer-preview" />
            <img src="../../images/icons/projector.png" alt="projector" />
            <img src="../../images/icons/read-only.png" alt="read-only" />
            <img src="../../images/icons/refreshment.png" alt="refreshment" />
            <img src="../../images/icons/register.png" alt="register" />
            <img src="../../images/icons/remote-control.png" alt="remote-control" />
            <img src="../../images/icons/report.png" alt="report" />
            <img src="../../images/icons/resize.png" alt="resize" />
            <img src="../../images/icons/road-sign.png" alt="road-sign" />
            <img src="../../images/icons/rss.png" alt="rss" />
            <img src="../../images/icons/ruby.png" alt="ruby" />
            <img src="../../images/icons/ruler.png" alt="ruler" />
            <img src="../../images/icons/safety-box.png" alt="safety-box" />
            <img src="../../images/icons/save.png" alt="save" />
            <img src="../../images/icons/science.png" alt="science" />
            <img src="../../images/icons/screenshot.png" alt="screenshot" />
            <img src="../../images/icons/script.png" alt="script" />
            <img src="../../images/icons/search.png" alt="search" />
            <img src="../../images/icons/server.png" alt="server" />
            <img src="../../images/icons/servers.png" alt="servers" />
            <img src="../../images/icons/settings.png" alt="settings" />
            <img src="../../images/icons/shape-circle.png" alt="shape-circle" />
            <img src="../../images/icons/shape-ellipse.png" alt="shape-ellipse" />
            <img src="../../images/icons/shape-hexagon.png" alt="shape-hexagon" />
            <img src="../../images/icons/shape-kite.png" alt="shape-kite" />
            <img src="../../images/icons/shape-parallelogram-orthogonal.png" alt="shape-parallelogram-orthogonal" />
            <img src="../../images/icons/shape-pentagon.png" alt="shape-pentagon" />
            <img src="../../images/icons/shape-rhombus.png" alt="shape-rhombus" />
            <img src="../../images/icons/shapes-align-hori-center.png" alt="shapes-align-hori-center" />
            <img src="../../images/icons/shapes-align-hori-left.png" alt="shapes-align-hori-left" />
            <img src="../../images/icons/shapes-align-hori-right.png" alt="shapes-align-hori-right" />
            <img src="../../images/icons/shapes-align-verti-bottom.png" alt="shapes-align-verti-bottom" />
            <img src="../../images/icons/shapes-align-verti-middle.png" alt="shapes-align-verti-middle" />
            <img src="../../images/icons/shapes-align-verti-top.png" alt="shapes-align-verti-top" />
            <img src="../../images/icons/shapes-flip-horizontal.png" alt="shapes-flip-horizontal" />
            <img src="../../images/icons/shapes-flip-vertical.png" alt="shapes-flip-vertical" />
            <img src="../../images/icons/shapes-move-back.png" alt="shapes-move-back" />
            <img src="../../images/icons/shapes-move-backward.png" alt="shapes-move-backward" />
            <img src="../../images/icons/shapes-move-forward.png" alt="shapes-move-forward" />
            <img src="../../images/icons/shapes-move-front.png" alt="shapes-move-front" />
            <img src="../../images/icons/shape-square.png" alt="shape-square" />
            <img src="../../images/icons/shapes-rotate-anticlockwise.png" alt="shapes-rotate-anticlockwise" />
            <img src="../../images/icons/shapes-rotate-clockwise.png" alt="shapes-rotate-clockwise" />
            <img src="../../images/icons/shape-trapezoid.png" alt="shape-trapezoid" />
            <img src="../../images/icons/shape-triangle-equilateral.png" alt="shape-triangle-equilateral" />
            <img src="../../images/icons/shape-triangle-isosceles.png" alt="shape-triangle-isosceles" />
            <img src="../../images/icons/shape-triangle-rectangular.png" alt="shape-triangle-rectangular" />
            <img src="../../images/icons/shape-triangle-scalene.png" alt="shape-triangle-scalene" />
            <img src="../../images/icons/sitemap.png" alt="sitemap" />
            <img src="../../images/icons/stamp.png" alt="stamp" />
            <img src="../../images/icons/star.png" alt="star" />
            <img src="../../images/icons/statistics-chart.png" alt="statistics-chart" />
            <img src="../../images/icons/statistics-pie-chart.png" alt="statistics-pie-chart" />
            <img src="../../images/icons/sticky-note.png" alt="sticky-note" />
            <img src="../../images/icons/stop.png" alt="stop" />
            <img src="../../images/icons/stop-alt.png" alt="stop-alt" />
            <img src="../../images/icons/stopwatch.png" alt="stopwatch" />
            <img src="../../images/icons/store.png" alt="store" />
            <img src="../../images/icons/tab.png" alt="tab" />
            <img src="../../images/icons/tag.png" alt="tag" />
            <img src="../../images/icons/tags.png" alt="tags" />
            <img src="../../images/icons/target.png" alt="target" />
            <img src="../../images/icons/telephone.png" alt="telephone" />
            <img src="../../images/icons/thumbnails.png" alt="thumbnails" />
            <img src="../../images/icons/time.png" alt="time" />
            <img src="../../images/icons/toolbox.png" alt="toolbox" />
            <img src="../../images/icons/trafficlight.png" alt="trafficlight" />
            <img src="../../images/icons/trash-empty.png" alt="trash-empty" />
            <img src="../../images/icons/trash-full.png" alt="trash-full" />
            <img src="../../images/icons/trophy.png" alt="trophy" />
            <img src="../../images/icons/truck.png" alt="truck" />
            <img src="../../images/icons/twitter.png" alt="twitter" />
            <img src="../../images/icons/typewritter.png" alt="typewritter" />
            <img src="../../images/icons/unfold-from-bottom.png" alt="unfold-from-bottom" />
            <img src="../../images/icons/unfold-from-left.png" alt="unfold-from-left" />
            <img src="../../images/icons/unfold-from-right.png" alt="unfold-from-right" />
            <img src="../../images/icons/unfold-from-top.png" alt="unfold-from-top" />
            <img src="../../images/icons/unfold-multiple.png" alt="unfold-multiple" />
            <img src="../../images/icons/user.png" alt="user" />
            <img src="../../images/icons/user-alt-3.png" alt="user-alt-3" />
            <img src="../../images/icons/user-art.png" alt="user-art" />
            <img src="../../images/icons/user-chat.png" alt="user-chat" />
            <img src="../../images/icons/user-female.png" alt="user-female" />
            <img src="../../images/icons/user-male.png" alt="user-male" />
            <img src="../../images/icons/user-offline.png" alt="user-offline" />
            <img src="../../images/icons/users.png" alt="users" />
            <img src="../../images/icons/view.png" alt="view" />
            <img src="../../images/icons/wall.png" alt="wall" />
            <img src="../../images/icons/wallet.png" alt="wallet" />
            <img src="../../images/icons/water.png" alt="water" />
            <img src="../../images/icons/weather-cloud.png" alt="weather-cloud" />
            <img src="../../images/icons/weather-clouds.png" alt="weather-clouds" />
            <img src="../../images/icons/weather-cloud-sun.png" alt="weather-cloud-sun" />
            <img src="../../images/icons/weather-rain.png" alt="weather-rain" />
            <img src="../../images/icons/weather-snow.png" alt="weather-snow" />
            <img src="../../images/icons/weather-sun.png" alt="weather-sun" />
            <img src="../../images/icons/weather-thunder.png" alt="weather-thunder" />
            <img src="../../images/icons/web.png" alt="web" />
            <img src="../../images/icons/weight.png" alt="weight" />
            <img src="../../images/icons/wi-fi.png" alt="wi-fi" />
            <img src="../../images/icons/window.png" alt="window" />
            <img src="../../images/icons/wireless-router.png" alt="wireless-router" />
            <img src="../../images/icons/wizard.png" alt="wizard" />
            <img src="../../images/icons/zoom.png" alt="zoom" />
            <img src="../../images/icons/zoom-in.png" alt="zoom-in" />
            <img src="../../images/icons/zoom-out.png" alt="zoom-out" />           
        </div><!-- ends icon window-->            
        </div><!-- end sof dialog-form -->

        </p>
	</div>
    
	<div id="tabs-3" class="ui-corner-all">

            <div class="ui-corner-all filequeue" id="uploaderqueue">
                <p>Simple Photo Manager for CoverFlow(Photo) Pages</p>
                <p>Photo Window :<select name="" id="cb_photowin">
<!--                  <option value="a01">Photo1</option>
                  <option value="a02">Photo Win</option>-->
              </select></p>
              <table width="95%" border="0" cellspacing="0" cellpadding="0">
<!--                  <tr id="filequeuefile">
                    <td>&nbsp;312313</td>
                  </tr>
-->                  
				<tbody>
                <tr>
                  <td style="text-align: right;" id = "addfilefield">Add an Image Field..<img src="../../images/easyicon_plus_64.png" width="26" height="24" /></td></tr>
                <tr><td>
                <table width="100%" height="50" border="0" cellspacing="0" cellpadding="0" id="filequeue">
                <tbody></tbody>
                <!-- <tr><td>hello<br></td></tr> -->
                
                </table>
                </td></tr>
					
                <tr id="filequeuebuttons">
                  	<td style="height: 80px;" >
<!--                    <input type="button" id="filebrowsetrigger" value="Add Files" />
                    <input type="file" id="filebrowse" multiple="multiple" />-->
                  <input name="" type="button" id="sendfile" value="Upload Files"/></td>
                </tr>

                
                </tbody>
<!--                  <tr>
                    <div class="myfileupload-buttonbar ">
                        <label class="myui-button">
                            <span >Add Files</span>
                            <input id="file" type="file" name="files[]" multiple="multiple" />
                        </label>
                    </div>
                  
                  </tr>-->
                 
                </table>
            </div>

            <div id="ts2" class="jThumbnailScroller">
                <div class="jTscrollerContainer">
                    <div id="jTscroller" class="jTscroller">
<!--                        <a href="#"><img src="js/jquery_thunbmail_scroller/thumbs/img1.jpg" /></a>
                        <a href="#"><img src="js/jquery_thunbmail_scroller/thumbs/img2.jpg" /></a>
                        <a href="#"><img src="js/jquery_thunbmail_scroller/thumbs/img3.jpg" /></a>
                        <a href="#"><img src="js/jquery_thunbmail_scroller/thumbs/img4.jpg" /></a>
                        <a href="#"><img src="js/jquery_thunbmail_scroller/thumbs/img5.jpg" /></a>-->
                    </div>
                </div>
                <a href="#" class="jTscrollerPrevButton"></a>
                <a href="#" class="jTscrollerNextButton"></a>
            </div>
            
            <div id="dlg_photo_modify">
	            <br />
              <label for="description">description:</label>
                <input name="desc" type="text" class="text ui-widget-content ui-corner-all" id="edt_photo_desc" size="40"  />
                <br />
            </div>
                    
    </div>
</div>    
		<!-- InstanceEndEditable -->
    </div>
    
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>

<!-- end #mainContent -->
  </div>
  <!-- 頁面底部連結區塊 -->
  <div id="siteLinks">
    <div id="blockSpacing"></div>
		<?php include("../../includes/sitelinks.html"); ?>
    <div id="blockSpacing"></div>
    <div id="blockSpacing"></div>	
  </div>
<!-- end #container -->
</div>

<div id="blockSpacing"></div>
<div id="blockSpacing"></div>
<!-- Footer 區塊 -->
<div id="mcmsFooter">
  <?php include("../../includes/footer.html"); ?>
</div>  

<!-- Javascript Area -->
<!-- InstanceBeginEditable name="jsBodySection" -->
<script type="text/javascript">
//建立分頁標籤  --- 暫時移到body裡面
$('#tabs').tabs({
	show : function(event,ui){
				if (ui.index==2){
					$('#cb_photowin').trigger('change')
				}
			}
});
$("#mainContent").css('height',1000);
</script>
<!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
