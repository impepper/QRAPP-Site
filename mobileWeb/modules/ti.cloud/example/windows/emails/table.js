windowFunctions.Emails=function(){function g(){for(var a=0;a<b.length;a++){if(!b[a].value.length){b[a].focus();return}b[a].blur()}c.hide();Cloud.Emails.send({template:d.value,recipients:f.value},function(a){a.success?alert("Sent!"):error(a);c.show()})}var e=createWindow(),a=addBackButton(e),a=Ti.UI.createScrollView({top:a+u,contentHeight:"auto",layout:"vertical"});e.add(a);var d=Ti.UI.createTextField({hintText:"Template Name",top:10+u,left:10+u,right:10+u,height:40+u,borderStyle:Ti.UI.INPUT_BORDERSTYLE_ROUNDED,
autocapitalization:Ti.UI.TEXT_AUTOCAPITALIZATION_NONE,autocorrect:!1});a.add(d);var f=Ti.UI.createTextField({hintText:"Recipients (csv)",top:10+u,left:10+u,right:10+u,height:40+u,borderStyle:Ti.UI.INPUT_BORDERSTYLE_ROUNDED,autocapitalization:Ti.UI.TEXT_AUTOCAPITALIZATION_NONE,autocorrect:!1});a.add(f);var c=Ti.UI.createButton({title:"Send Email",top:10+u,left:10+u,right:10+u,bottom:10+u,height:40+u});a.add(c);var b=[d,f];c.addEventListener("click",g);for(a=0;a<b.length;a++)b[a].addEventListener("return",
g);e.addEventListener("open",function(){d.focus()});e.open()};