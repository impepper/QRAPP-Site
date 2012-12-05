// JavaScript Document
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
		page_parameter_1 = $('#page_link_parameters_1'),
		page_parameter_2 = $('#page_link_parameters_2'),
		page_parameter_3 = $('#page_link_parameters_3'),
		page_parameter_4 = $('#page_link_parameters_4'),
		page_type = $('#page_type'),
		webvideo_type = $('#webvideo_type'),
		webpage_content = $('#webpage_content'),
		allFields = $( [] ).add( page_title ).add( content_title ).add( page_link ).add(page_icon).add(page_show_title).add(content_show_title).add(page_parameter_1).add(page_parameter_2).add(page_parameter_3).add(page_parameter_4).add(page_type).add(webvideo_type).add(webpage_content)
		
	var new_avatar=false;
	//Cloud User Login Status
	sdk_user_info(false)
	
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
	$('#apDiv_loginstatus',window.parent.frames['Frame_header'].document).html('Already a registered user? &nbsp;&nbsp; <a href="login.htm" target="Frame_content">Log Out</a>');	
	
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
		width: 650,
		modal: true
	}).bind('dialogopen',function(){
		//顯示對話框時，依據Win_type調整顯示的欄位名稱及標題
		page_type.change();			
	});
	
	//處理物件新增的相關功能函數
	var max_win_id=$(0)
	$( "#create_new_page" ).button()
		.click(function() {
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
						bValid = bValid && checkLength( page_title, "Page Title", 3, 16 );
						bValid = bValid && checkLength( content_title, "Content title", 3, 16 );			
						if (page_type.val() == 'TYPE_CUSTOMPAGE'){
								page_link.val($('#webpage_content').getCode().replace(/[\r\n\t]/g,"").replace(/"([^"]*)"/g, "'$1'"));					
							}
												
						if ( bValid ) {
							var data ='{"win_id": '+(parseInt($( "#create_new_page").data("max_win_id"))+1)+','+
							//var data ='("win_id":'+itemcount+','+
									  '"win_root_id": 0,'+
									  '"win_title":"'+page_title.val()+'",'+
									  '"win_icon":"'+page_icon.val()+'",'+
									  '"win_type":"'+page_type.val()+'",'+
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
		switch(page_type.val()){
			case "TYPE_WEBVIDEO":
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
				page_link.hide().val('Youtube')
				webvideo_type.hide().unbind('change')
				//webpage_content.show().redactor()
				$("#webpage_content_container").append('<textarea name="webpage_content" id="webpage_content" cols="40" rows="10"></textarea>')
				//$('#webpage_content').val(global_webpage_content)
				$('#webpage_content').redactor()
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
			default:
				//alert('hide')
				page_link.show().val('')
				webpage_content.hide()
				webvideo_type.hide().bind('change',function(e){
						page_link.val('')
					})
				$('Label[for="pagelink"]').text('Page Link URL')
				$('Label[for="pagelinkparameters1"]').text('Link Parameters 1')
				//$("#webpage_content_container").val('')
				$("#webpage_content_container").empty();
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
function add_pages_row(rowindex,custome_window){
	//建立變數
	var tips = $( ".validateTips" ),
		page_title = $( "#page_title" ),
		content_title = $( "#content_title" ),
		page_link = $( "#page_link" ),
		page_icon = $('#page_icon'),
		page_show_title = $('#chk_showpagetitle'),
		content_show_title = $('#chk_showcontenttitle'),
		page_parameter_1 = $('#page_link_parameters_1'),
		page_parameter_2 = $('#page_link_parameters_2'),
		page_parameter_3 = $('#page_link_parameters_3'),
		page_parameter_4 = $('#page_link_parameters_4'),
		page_type = $('#page_type'),
		webvideo_type = $('#webvideo_type'),
		webpage_content = $('#webpage_content'),	//	webpage_content is ready to be deleted
		allFields = $( [] ).add( page_title ).add( content_title ).add( page_link ).add(page_icon).add(page_show_title).add(content_show_title).add(page_parameter_1).add(page_parameter_2).add(page_parameter_3).add(page_parameter_4).add(page_type).add(webvideo_type).add(webpage_content)
		
	//win_id='+custome_window.win_id+'
	//新建列資料			
	var rowdata;
	if (custome_window.win_root_id!=0){
		//建立列表式子視窗物件資料
		rowdata= '<tr height="25" name="'+custome_window.id+'" win_id='+custome_window.win_id+' win_root_id='+custome_window.win_root_id+' win_type="'+custome_window.win_type+'" class="row_client">'
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
	$( "#current_pages tbody,#client_pages tbody" ).sortable({
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
				$( "#client_pages tbody tr" ).removeClass('row_base');
				$( "#client_pages tbody tr" ).addClass('row_client');	
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
				(custome_window.win_parameters[0]?'Show Page Title':'Hide Page Title')+ '\n '+
				(custome_window.win_parameters[1]?'Show Content Title':'Hide Content Title')+ '\n '+
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
			//進行視窗參數資料修正工作
			//alert('Modify this Page?')
			//press_modify_button($(this).prop('name'))
			//將原所屬資料預先載入相關欄位中	
			page_title.val(custome_window.win_title);
			page_icon.val(custome_window.win_icon);
			page_type.val(custome_window.win_type);
			
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
								page_link.val($('#webpage_content').getCode().replace(/[\r\n\t]/g,"").replace(/"([^"]*)"/g, "'$1'"));					
							}		

						if ( bValid ) {
							var data ='{"win_title":"'+page_title.val()+'",'+
									  '"win_icon":"'+page_icon.val()+'",'+
									  '"win_type":"'+page_type.val()+'",'+
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
}