windowFunctions["Query Status"]=function(){var a=createWindow(),c=addBackButton(a),d=Ti.UI.createTableView({backgroundColor:"#fff",top:c+u,bottom:0,data:[{title:"Loading, please wait..."}]});a.add(d);a.addEventListener("open",function(){Cloud.Statuses.query(function(b){if(b.success)if(0==b.statuses.length)d.setData([{title:"No Results!"}]);else{for(var a=[],e=0,c=b.statuses.length;e<c;e++)a.push(Ti.UI.createTableViewRow({title:b.statuses[e].message}));d.setData(a)}else error(b)})});a.open()};