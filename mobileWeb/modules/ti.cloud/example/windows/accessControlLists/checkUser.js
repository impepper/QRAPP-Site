windowFunctions["Check Permission of ACL"]=function(){function i(){Cloud.Users.query(function(a){if(a.success)if(0==a.users.length)d.setData([{title:"No Users!"}]);else{for(var g=[],b=0,c=a.users.length;b<c;b++){var e=a.users[b],e=Ti.UI.createTableViewRow({title:e.first_name+" "+e.last_name,id:e.id});g.push(e)}d.setData(g)}else d.setData([{title:a.error&&a.message||a}]),error(a)})}var b=createWindow(),h=addBackButton(b),f=Ti.UI.createScrollView({top:h+u,contentHeight:"auto",layout:"vertical"});b.add(f);
var c=Ti.UI.createTextField({hintText:"Name",top:10+u,left:10+u,right:10+u,height:40+u,borderStyle:Ti.UI.INPUT_BORDERSTYLE_ROUNDED,autocapitalization:Ti.UI.TEXT_AUTOCAPITALIZATION_NONE,autocorrect:!1});f.add(c);var d=Ti.UI.createTableView({backgroundColor:"#fff",top:h+u,bottom:0,data:[{title:"Loading, please wait..."}]});d.addEventListener("click",function(a){0==c.value.length?c.focus():a.row.id&&Cloud.ACLs.checkUser({name:c.value,user_id:a.row.id},function(a){a.success?alert("Read Permission: "+
(a.permission["read permission"]||"no")+"\nWrite Permission: "+(a.permission["write permission"]||"no")):error(a)})});f.add(d);b.addEventListener("open",function(){i()});b.open()};