windowFunctions["Show Checkin"]=function(c){var a=createWindow(),f=addBackButton(a),b=Ti.UI.createScrollView({top:f+u,contentHeight:"auto",layout:"vertical"});a.add(b);var d=Ti.UI.createLabel({text:"Loading, please wait...",textAlign:"left",height:30+u,left:20+u,right:20+u});b.add(d);Cloud.Checkins.show({checkin_id:c.id},function(a){b.remove(d);var e=Ti.UI.createButton({title:"Remove Checkin",top:10+u,left:10+u,right:10+u,bottom:10+u,height:40+u});e.addEventListener("click",function(){handleOpenWindow({target:"Remove Checkin",
id:c.id})});b.add(e);a.success?enumerateProperties(b,a.checkins[0],20):error(a)});a.open()};