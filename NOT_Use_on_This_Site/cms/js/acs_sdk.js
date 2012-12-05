// insert JavaScript source code here
var sdk = new Cocoafish('LGw5sY0z72d1Qlced8dN2N8K3zKAcwo9')  //Develop
//var sdk = new Cocoafish('n7MsybAWCWZApQv1MKLVKTwAK6X65aPs')  //Product
var useremail;
var currentuser;
var currentpassword;
var currentuserid;
var currentusercontactinfo='';
var itemcount=0;
function sdk_user_logout(msg){
  sdk.sendRequest('users/logout.json', 'GET', null, function(responseData){
    if(responseData && responseData.meta && responseData.meta.code == 200) {
      //$("#Frame_menu").hide();
      if (msg){alert('user logged out!');}
    } else {
      if (msg){alert(responseData.meta.message);}
    }
  })
};

function sdk_user_check(msg){
  sdk.sendRequest('users/show/me.json', 'GET', null, function(responseData) {
    if (responseData && responseData.meta && responseData.meta.code == 200) {
      var message = '';
      var user = responseData.response.users[0];
      message += 'Get user profile successful!\n';
      message += 'username:' + user.username + '\n';
	  message += 'id:' + user.id + '\n';
      message += 'first name:' + user.first_name + '\n';
      message += 'last name:' + user.last_name + '\n';
      message += 'email:' + user.email + '\n';
      if (msg){alert(message);}
      sdk_user_logout(false);
    } else {
      if (msg){alert(responseData.meta.message);}
    }
  })
};

function sdk_user_info(msg){
  sdk.sendRequest('users/show/me.json', 'GET', null, function(responseData) {
    if (responseData && responseData.meta && responseData.meta.code == 200) {
      var message = '';
      currentuser = responseData.response.users[0];
		$('#edt_username').val(currentuser.username);
		$('#edt_useremail').val(currentuser.email);
		$('#edt_firstname').val(currentuser.first_name);
		$('#edt_lastname').val(currentuser.last_name);
		$('#edt_contactinfo').val(currentuser.custom_fields['contactinfo']);
		$('#edt_contactavatar').val('')
		$('#btn_update_userinfo').show();
	  
	  //Get Contact Info
	  currentusercontactinfo = currentuser.custom_fields['contactinfo']
	  if (currentusercontactinfo !=''){
		  var data = {
			photo_id:currentuser.custom_fields['contactinfo']
		  };
		  sdk.sendRequest('photos/show.json', 'GET', data, function (responseData) {
			if (responseData && responseData.meta && responseData.meta.code == 200) {
				//alert('Successfully Created')
				var custome_photo=responseData.response.photos[0];
				$('#edt_contactname').val(custome_photo.custom_fields['name']);
				$('#edt_contactemail').val(custome_photo.custom_fields['mail']);
				$('#edt_contactphone').val(custome_photo.custom_fields['phone']);
				$('#edt_contactaddress').val(custome_photo.custom_fields['address']);
				
				var span = document.createElement('span');
					  span.innerHTML = ['<img class="filequeuethumb" src="', custome_photo.urls['thumb_100'],
										'" />'].join('');
					  //document.getElementById('contactavatar').insertBefore(span, null);
								
				$('#contactavatar').attr('src',custome_photo.urls['thumb_100'])
				//itemcount++;
			} else {
				alert(responseData.meta.message);
			}
		  });	  
	}
	  
	  
      var message = '';
      var user = responseData.response.users[0];
      message += 'Get user profile successful!\n';
      message += 'id:' + user.id + '\n';
      message += 'first name:' + user.first_name + '\n';
      message += 'last name:' + user.last_name + '\n';
      message += 'email:' + user.email + '\n';
      useremail = user.email
	  currentuser= user.username
      currentuserid = user.id
	  //alert(currentuserid)
	  if (msg){alert(message);}
	  sdk_item_list(user.id,'0')
	  $('#apDiv_loginstatus',top.frames['Frame_header'].document).html('Welcome, '+useremail+' &nbsp;;&nbsp;&nbsp; <a href="login.htm" target="Frame_content">Log Out</a>');
      return true;
    } else {
      if (msg){alert(responseData.meta.message);}
	  return false;
    }
  })
};

function sdk_user_login(user_account,user_password){
  currentpassword = user_password
  sdk.sendRequest('users/login.json', 'POST', {login:user_account, password:user_password}, function(responseData) {
    if (responseData && responseData.meta && responseData.meta.code == 200) {
      var user = responseData.response.users[0];
      useremail = user.email
      window.location='main.htm';
    } else {
      alert(responseData.meta.message);
    }
  });
};

function sdk_user_create(user_email,user_firstname,user_lastname,user_password,user_password_confirmation,msg){
  var data = {
    email: user_email,
    first_name: user_firstname,
    last_name: user_lastname,
    password: user_password,
    password_confirmation: user_password_confirmation,
	custom_fields:'{"contactinfo":""}'
  };
  sdk_user_logout(false);
  sdk.sendRequest('users/create.json', 'POST', data, function(responseData) {
    if(responseData && responseData.meta && responseData.meta.code == 200) {
      var message = '';
      var user = responseData.response.users[0];
      message += 'Create user successful!\n';
      message += 'id:' + user.id + '\n';
      message += 'first name:' + user.first_name + '\n';
      message += 'last name:' + user.last_name + '\n';
      message += 'email:' + user.email + '\n';
      if (msg){alert(message);}
      window.location = 'main.htm'
    } else {
      alert(responseData.meta.message)
    }
  })
};

function sdk_user_update(user_name,user_email,user_firstname,user_lastname,user_password,user_password_confirmation,user_contact_info){
  var data = {
    username: user_name,
    email: user_email,
    first_name: user_firstname,
    last_name: user_lastname,
    password: user_password,
    password_confirmation: user_password_confirmation,
	custom_fields:'{"contactinfo":"'+user_contact_info+'"}'
  };
  sdk.sendRequest('users/update.json', 'PUT', data, function(responseData) {
    if(responseData && responseData.meta && responseData.meta.code == 200) {
      var message = '';
      var user = responseData.response.users[0];
      message += 'Update User Info successfully!\n';
	  message += 'username:' + user.username + '\n';
      message += 'id:' + user.id + '\n';
      message += 'first name:' + user.first_name + '\n';
      message += 'last name:' + user.last_name + '\n';
      message += 'email:' + user.email + '\n';
      //alert(message);
    } else {
      alert(responseData.meta.message);
    }
  })
};

function sdk_item_list(userid,win_id_reg){
	var data = {
	  per_page:20,
	  order: '-win_id',
	  where: '{"user_id":"'+userid+'","win_id":{"$ne":0}, "win_root_id":'+win_id_reg+'}',
	  //","win_id":{"$ne":0}
	};
	sdk.sendRequest('objects/windows/query.json', 'GET', data, function (responseData) {
	  if (responseData && responseData.meta && responseData.meta.code == 200) {
		//alert('got datas!')
		itemcount = responseData.response.windows.length-1
		for (var i=itemcount; i>=0;i--){
			var custome_window=responseData.response.windows[i];
			if (custome_window.win_type == "TYPE_TABLE"){
				//add_pages_row(i,custome_window)
				add_pages_row(custome_window.win_id,custome_window)
				sdk_item_list(userid,custome_window.win_id)
			} else {
				//add_pages_row(i,custome_window)
				add_pages_row(custome_window.win_id,custome_window)
			}
			
		  };			  				 	
	  } else {
		alert(responseData.meta.message);
	  }
	});
}

function sdk_item_create(data_fields){
	/*
	var data = {
		fields: '{"win_id": 99, "win_root_id": 0,"win_title":"ConTACT","win_icon":"about","win_type": "TYPE_CONTACT", "win_parameters": [true, true, "Contact", "Pepper", "impepper@gmail.com", "+886-933095673", "Taipei"]}'
	};
	*/
	
	var data = {
		fields: data_fields
	}
	
	sdk.sendRequest('objects/windows/create.json', 'POST', data, function (responseData) {
		if (responseData && responseData.meta && responseData.meta.code == 200) {
			//alert('Successfully Created')
			var custome_window=responseData.response.windows[0];
			add_pages_row(custome_window.win_id,custome_window)
			itemcount++;
	  	} else {
			alert(responseData.meta.message);
		}
	});
}

function sdk_item_update(data_id,data_fields,deleteitem_selector,delete_rowindex){
	/*
	var data = {
		id:id
		fields: '{"win_id": 99, "win_root_id": 0,"win_title":"ConTACT","win_icon":"about","win_type": "TYPE_CONTACT", "win_parameters": [true, true, "Contact", "Pepper", "impepper@gmail.com", "+886-933095673", "Taipei"]}'
	};
	*/
	
	var data = {
		id:data_id,
		fields: data_fields
	}	
	sdk.sendRequest('objects/windows/update.json', 'PUT', data, function (responseData) {
		if (responseData && responseData.meta && responseData.meta.code == 200) {
			//alert('Successfully Updated')
			var custome_window=responseData.response.windows[0];
			deleteitem_selector.remove()
			add_pages_row(delete_rowindex,custome_window)
			//itemcount++;
	  	} else {
			alert(responseData.meta.message);
		}
	});
}

function sdk_item_delete(item_id,deleteitem_selector,user_id,item_win_id){
	//alert(item_id)
	var data = {
		id: item_id
	};
	sdk.sendRequest('objects/windows/delete.json', 'DELETE', data, function (responseData) {
		if (responseData && responseData.meta && responseData.meta.code == 200) {
			//alert('Page Successfully Deleted')
			//if (item_win_root_id!=0){
				sdk_reset_win_root_id(user_id,item_win_id)
			//}
			deleteitem_selector.remove()
	  	} else {
			alert(responseData.meta.message);
		}
	});
	
}

function sdk_reset_win_root_id(user_id,win_id){
	var data = {
	  per_page:20,
	  order: '-win_id',
	  where: '{"user_id":"'+user_id+'","win_id":{"$ne":0}, "win_root_id":'+win_id+'}',
	  //","win_id":{"$ne":0}
	};
	sdk.sendRequest('objects/windows/query.json', 'GET', data, function (responseData) {
	  if (responseData && responseData.meta && responseData.meta.code == 200) {
		//alert('got datas!')
		itemcount = responseData.response.windows.length-1
		for (var i=itemcount; i>=0;i--){
			var custome_window=responseData.response.windows[i];
			var data = {
				id:custome_window.id,
				fields: '{"win_root_id": 0}'
			}	
			sdk.sendRequest('objects/windows/update.json', 'PUT', data, function (responseData) {
				if (responseData && responseData.meta && responseData.meta.code == 200) {
					//alert('Successfully Updated')
				} else {
					alert(responseData.meta.message);
				}
			});
			
		  };			  				 	
	  } else {
		alert(responseData.meta.message);
	  }
	});
	//window.location = 'main.htm'
}

function sdk_change_contactinfo_id(user_id,contactinfo_id){
	var data = {
	  per_page:20,
	  order: '-win_id',
	  where: '{"user_id":"'+user_id+'","win_type":"TYPE_CONTACT"}',
	  //","win_id":{"$ne":0}
	};
	sdk.sendRequest('objects/windows/query.json', 'GET', data, function (responseData) {
	  if (responseData && responseData.meta && responseData.meta.code == 200) {
		//alert('got datas!')
		itemcount = responseData.response.windows.length-1
		for (var i=itemcount; i>=0;i--){
			var custome_window=responseData.response.windows[i];
			var data = {
				id:custome_window.id,
				fields: '{"win_parameters": ['+custome_window.win_parameters[0]+', '+custome_window.win_parameters[1]+', "'+custome_window.win_parameters[2]+'", "'+contactinfo_id+'"]}'
			}	
			sdk.sendRequest('objects/windows/update.json', 'PUT', data, function (responseData) {
				if (responseData && responseData.meta && responseData.meta.code == 200) {
					//alert('Successfully Updated')
				} else {
					alert(responseData.meta.message);
				}
			});
			
		  };			  				 	
	  } else {
		alert(responseData.meta.message);
	  }
	});
	//window.location = 'main.htm'
}


function sdk_item_update_order(data_id,data_fields){
	/*
	var data = {
		id:id
		fields: '{"win_id": 99}'
	};
	*/
	
	var data = {
		id:data_id,
		fields: data_fields
	}
	
	sdk.sendRequest('objects/windows/update.json', 'PUT', data, function (responseData) {
		if (responseData && responseData.meta && responseData.meta.code == 200) {
			//alert('Successfully Updated')
			//var custome_window=responseData.response.windows[0];
			//deleteitem_selector.remove()
			//add_pages_row(itemcount,custome_window)
	  	} else {
			alert(responseData.meta.message);
		}
	});
}

function sdk_photo_create(photo_data,photo_fields){
	/*
	var data = {
		photo: "<id for photo field>"
		custom_fields: '{"win_id": <windows id>, "description": "Taipei"}'
	};
	*/
	
	var data = {
		photo: photo_data,
		photo_size:"thumb_100",
		photo_sync_sizes:"thumb_100",
		custom_fields:photo_fields
	}
	
	sdk.sendRequest('photos/create.json', 'POST', data, function (responseData) {
		if (responseData && responseData.meta && responseData.meta.code == 200) {
			//alert('Successfully Created')
			var custome_photo=responseData.response.photos[0];
			add_photo_thumb(photo_data)
			//sdk_photo_info(custome_photo.id)
	  	} else {
			alert(responseData.meta.message);
		}
	});
}

function sdk_photo_info(photoitem_id){
	/*
	var data = {
		photo: "<id for photo field>"
		custom_fields: '{"win_id": <windows id>, "description": "Taipei"}'
	};
	*/
	
	var data = {
	  photo_id: photoitem_id
	};
	sdk.sendRequest('photos/show.json', 'GET', data, function (responseData) {
		if (responseData && responseData.meta && responseData.meta.code == 200) {
			//alert('Successfully Created')
			var custome_photo=responseData.response.photos[0];
			add_photo_thumb(custome_photo)
			//itemcount++;
	  	} else {
			alert(responseData.meta.message);
		}
	});
}

function sdk_photo_list(win_id){
	var data = {
	  per_page:50,
	  //order: '-win_id',
	  where: '{"win_id":"'+win_id+'"}',
	  //","win_id":{"$ne":0}
	};
	sdk.sendRequest('photos/query.json', 'GET', data, function (responseData) {
	  if (responseData && responseData.meta && responseData.meta.code == 200) {
		//alert('got datas!')
		itemcount = responseData.response.photos.length-1
		for (var i=itemcount; i>=0;i--){
			var photoitem=responseData.response.photos[i];
			add_photo_thumb(photoitem)
			//$(".jTscroller").append('<a href="#"><img src="'+photoitem.urls['thumb_100']+'" /></a>')
		
		  };			  				 	
	  } else {
		alert(responseData.meta.message);
	  }
	});
}

function sdk_photo_update(data_id,data_fields){

	var data = {
		photo_id:data_id,
		custom_fields: data_fields
	}
	
	sdk.sendRequest('photos/update.json', 'PUT', data, function (responseData) {
		if (responseData && responseData.meta && responseData.meta.code == 200) {
			alert('Successfully Updated')
	  	} else {
			alert(responseData.meta.message);
		}
	});
}

function sdk_photo_delete(data_id,data_fields){

	var data = {
		photo_id:data_id
	}
	
	sdk.sendRequest('photos/delete.json', 'DELETE', data, function (responseData) {
		if (responseData && responseData.meta && responseData.meta.code == 200) {
			//alert('Successfully Deleted')
			remove_photo_thumb(data_id)
	  	} else {
			alert(responseData.meta.message);
		}
	});
}

function sdk_contact_create(new_avatar,avatar,name,email,phone,address){
	var datafields='{"name":"'+$("#edt_contactname").val()+'","mail":"'+$("#edt_contactemail").val()+'","phone":"'+$("#edt_contactphone").val()+'","address":"'+$("#edt_contactaddress").val()+'"}'
	if ($('#edt_contactinfo').val()==''){	
			var data = {
				photo: 'edt_contactavatar',
				photo_size:"thumb_100",
				photo_sync_sizes:"thumb_100",
				custom_fields:datafields	
			}
	} else {
//		if (new_avatar){
//			var data = {
//				photo_id: $('#edt_contactinfo').val(),
//				photo_size:"thumb_100",
//				photo_sync_sizes:"thumb_100",
//				custom_fields:datafields	
//			}
//		} else {
			var data = {
				photo_id: $('#edt_contactinfo').val(),
				photo: 'edt_contactavatar',
				photo_size:"thumb_100",
				photo_sync_sizes:"thumb_100",
				custom_fields:datafields	
			}

//		}
	
	}
	if ($('#edt_contactinfo').val()==''){
		if (new_avatar && $('#edt_contactavatar').val()==''){
			alert('please Choose a Image to Uploaad')
		} else {
			sdk.sendRequest('photos/create.json', 'POST', data, function (responseData) {
				if (responseData && responseData.meta && responseData.meta.code == 200) {
					var custome_photo=responseData.response.photos[0];
					$('#edt_contactinfo').val(custome_photo.id)
					sdk_user_update($('#edt_username').val(),$('#edt_useremail').val(),$('#edt_firstname').val(),$('#edt_lastname').val(),$('#edt_newpass').val(),$('#edt_newpass_confirm').val(),custome_photo.id)
					sdk_change_contactinfo_id(currentuserid,custome_photo.id)
				} else {
					alert(responseData.meta.message);
					sdk_user_update($('#edt_username').val(),$('#edt_useremail').val(),$('#edt_firstname').val(),$('#edt_lastname').val(),$('#edt_newpass').val(),$('#edt_newpass_confirm').val(),$('#edt_contactinfo').val())
				}
			});	
		}
	} else {
		
			sdk.sendRequest('photos/update.json', 'PUT', data, function (responseData) {
			if (responseData && responseData.meta && responseData.meta.code == 200) {
				var custome_photo=responseData.response.photos[0];
				$('#edt_contactinfo').val(custome_photo.id)
				sdk_user_update($('#edt_username').val(),$('#edt_useremail').val(),$('#edt_firstname').val(),$('#edt_lastname').val(),$('#edt_newpass').val(),$('#edt_newpass_confirm').val(),custome_photo.id)
				sdk_change_contactinfo_id(currentuserid,custome_photo.id)
			} else {
				alert(responseData.meta.message);
				sdk_user_update($('#edt_username').val(),$('#edt_useremail').val(),$('#edt_firstname').val(),$('#edt_lastname').val(),$('#edt_newpass').val(),$('#edt_newpass_confirm').val(),$('#edt_contactinfo').val())
			}
		});		
	}
}

function sdk_get_contatinfo(id_contactinfo){
	id_contactinfo.val(currentusercontactinfo);
}