Ti.include("create.js","query.js","remove.js","update.js");windowFunctions["Custom Objects"]=function(){var b=createWindow(),a=addBackButton(b),a=Ti.UI.createTableView({backgroundColor:"#fff",top:a+u,data:createRows(["Create Object","Query Objects"])});a.addEventListener("click",handleOpenWindow);b.add(a);b.open()};