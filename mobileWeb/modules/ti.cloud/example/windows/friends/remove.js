windowFunctions["Remove Friends"]=function(){function g(b){Cloud.Users.showMe(function(a){a.success?b(a.users[0].id):(d.setData([{title:a.error&&a.message||a}]),error(a))})}function h(b){Cloud.Friends.search({user_id:b},function(a){if(a.success)if(0==a.users.length)d.setData([{title:"No friends"}]);else{var b=[];b.push({title:"Remove Friend(s)!"});for(var c=0,e=a.users.length;c<e;c++){var f=a.users[c],f=Ti.UI.createTableViewRow({title:f.first_name+" "+f.last_name,id:f.id});b.push(f)}d.setData(b)}else d.setData([{title:a.error&&
a.message||a}]),error(a)})}var e=createWindow(),i=addBackButton(e),c=[],d=Ti.UI.createTableView({backgroundColor:"#fff",top:i+u,bottom:0,data:[{title:"Loading, please wait..."}]});d.addEventListener("click",function(b){b.row.id?(b.row.hasCheck=!b.row.hasCheck,b.row.hasCheck?c.push(b.row.id):c.splice(c.indexOf(b.row.id),1)):0==c.length?alert("No friends selected"):Cloud.Friends.remove({user_ids:c.join(",")},function(a){a.success?alert("Friend(s) removed"):error(a)})});e.add(d);e.addEventListener("open",
function(){g(h)});e.open()};