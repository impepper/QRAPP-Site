windowFunctions["Update Object"]=function(d){function h(){for(var b={classname:d.classname,id:d.id,fields:{}},a=0;a<e.length;a++)b.fields[e[a].hintText]=e[a].value,e[a].blur();f.hide();Cloud.Objects.update(b,function(a){a.success?alert("Updated!"):error(a);f.show()})}var c=createWindow(),i=addBackButton(c),g=Ti.UI.createScrollView({top:i+u,contentHeight:"auto",layout:"vertical"});c.add(g);var j=Ti.UI.createButton({title:"Remove",top:10+u,left:10+u,right:10+u,bottom:10+u,height:40+u});j.addEventListener("click",
function(){handleOpenWindow({target:"Remove Object",id:d.id,classname:d.classname})});g.add(j);var f=Ti.UI.createButton({title:"Update",top:10+u,left:10+u,right:10+u,bottom:10+u,height:40+u}),e=[];f.addEventListener("click",h);var k=Ti.UI.createLabel({text:"Loading, please wait...",textAlign:"center",top:i+u,right:0,bottom:0,left:0,backgroundColor:"#fff",zIndex:2});c.add(k);c.addEventListener("open",function(){Cloud.Objects.show({classname:d.classname,id:d.id},function(b){k.hide();if(b.success){var b=
b[d.classname][0],a;for(a in b)if(b.hasOwnProperty(a)&&!("id"==a||"created_at"==a||"updated_at"==a||"user"==a)){var c=Ti.UI.createTextField({hintText:a,value:b[a],top:10+u,left:10+u,right:10+u,height:40+u,borderStyle:Ti.UI.INPUT_BORDERSTYLE_ROUNDED});g.add(c);c.addEventListener("return",h);e.push(c)}g.add(f);0<e.length&&e[0].focus()}else error(b)})});c.open()};